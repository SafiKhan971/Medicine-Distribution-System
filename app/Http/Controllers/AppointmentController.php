<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('doctor')
            ->where('user_id', auth()->user()->id)
            ->where('app_dt_start', '>', now())
            ->get();
        return view('frontend.patient.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('frontend.patient.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => ['required'],
        ]);
        if ($validator->fails()) {
            notify()->error('Please Select a Doctor!', 'Error');
            return redirect()->back();
        } else {
            $userId = auth()->user()->id;
            $appointmentStartTime = Carbon::parse($request->app_date_time);
            $appointmentEndTime = $appointmentStartTime->copy()->addMinutes(30);
            $startDt = $request->app_date_time;

            $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
                ->where(function ($query) use ($startDt) {
                    $query->where('app_dt_start', '<=', $startDt)
                        ->where('app_dt_end', '>=', $startDt);
                })
                ->first();
            if (!empty($existingAppointment)) {
                notify()->error('Appointment Not Available!', 'Error');
                return redirect()->back();
            } else {
                $appointment = new Appointment;
                $appointment->user_id =  $userId;
                $appointment->doctor_id =  $request->doctor_id;
                $appointment->app_dt_start = $appointmentStartTime;
                $appointment->app_dt_end =  $appointmentEndTime;
                $appointment->save();

                $notification = new Notification;
                $notification->type = 'appointment';
                $notification->user_id = $appointment->user_id;
                $notification->doctor_id = $appointment->doctor_id;
                $notification->save();

                notify()->success('Appointment created successfully!', 'Success');
                return redirect('/');
            }
        }
    }

    public function edit($id)
    {
        $appointment = Appointment::with('doctor')->find($id);
        // dd($appointment);
        $doctors = Doctor::select('id', 'name')->get();
        return view('frontend.patient.appointments.edit', compact('appointment', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $appointmentStartTime = Carbon::parse($request->app_date_time);
        $appointmentEndTime = $appointmentStartTime->copy()->addMinutes(30);
        $startDt = $request->app_date_time;

        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where(function ($query) use ($startDt) {
                $query->where('app_dt_start', '<=', $startDt)
                    ->where('app_dt_end', '>=', $startDt);
            })
            ->first();
        if (!empty($existingAppointment)) {
            flash('Appointment Not Available!')->error();
            return redirect()->back();
        } else {
            $appointment = Appointment::find($id);
            $appointment->doctor_id =  $request->doctor_id;
            $appointment->app_dt_start = $appointmentStartTime;
            $appointment->app_dt_end =  $appointmentEndTime;
            $appointment->save();
            flash('Appointment updated successfully!')->success();
            return redirect('profile/appointments');
        }
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        flash('Appointment Deleted Successfully!')->success();
        return redirect()->back();
    }

    public function video_call($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        flash('Appointment Deleted Successfully!')->success();
        return redirect()->back();
    }
}
