<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function futureAppointments()
    {
        $future_appointments = Appointment::with('doctor')
            ->where('user_id', auth()->user()->id)
            ->where('app_dt_start', '>=', now())
            ->get();
        return view('frontend.patient.appointments.index', compact('future_appointments'));
    }

    public function pastAppointments()
    {
        $past_appointments = Appointment::with('doctor')
            ->where('user_id', auth()->user()->id)
            ->where('app_dt_start', '<', now())
            ->get();
        return view('frontend.patient.appointments.past', compact('past_appointments'));
    }

    public function create()
    {
        $pageTitle = 'Digital Clinic | Book An Appointment';
        $doctors = Doctor::select('id', 'name', 'specialization')->get();
        return view('frontend.patient.appointments.create', compact('doctors', 'pageTitle'));
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
                try {
                    DB::beginTransaction();

                    // Your existing appointment creation code
                    $appointment = new Appointment;
                    $appointment->user_id =  $userId;
                    $appointment->doctor_id =  $request->doctor_id;
                    $appointment->app_dt_start = $appointmentStartTime;
                    $appointment->app_dt_end =  $appointmentEndTime;
                    $appointment->save();

                    // Your existing notification creation code
                    $notification = new Notification;
                    $notification->type = 'appointment';
                    $notification->user_id = $appointment->user_id;
                    $notification->doctor_id = $appointment->doctor_id;
                    $notification->status = 0;
                    $notification->save();

                    // If everything is successful, commit the transaction
                    DB::commit();

                    notify()->success('Appointment created successfully!', 'Success');
                    return redirect('/');
                } catch (\Exception $e) {
                    // If an exception occurs, rollback the transaction
                    DB::rollback();
                }
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
            // notify()->success('Appointment updated successfully!', 'Success');
            return redirect('profile/appointments')->with('success', 'Appointment updated successfully!');
        }
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        // notify()->success('Appointment deleted successfully!', 'Success');
        return redirect()->back()->with('success', 'Appointment deleted successfully!');
    }

    public function video_call(Request $request)
    {
        $notification = new Notification;
        $notification->type = 'video_call_request';
        $notification->user_id = Auth::id();
        $notification->doctor_id = $request->doctor_id;
        $notification->status = 0;
        $notification->save();
        // notify()->success('Request has been sent successfully!', 'Success');
        return redirect()->back()->with('success', 'Request has been sent successfully. If doctor approved it then you will be notified via email containing the video consultaion deatils.');
    }

    public function doctorNotification($doctor_id)
    {
        $doctor_notification = Notification::where('doctor_id', $doctor_id)->get();
    }
}
