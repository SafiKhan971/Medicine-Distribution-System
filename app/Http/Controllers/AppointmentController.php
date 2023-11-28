<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->user()->id)->get();
        return view('frontend.patient.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('frontend.patient.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
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
        if(!empty($existingAppointment))
        {
            flash('Appointment Not Available!')->error();
            return redirect()->back();
        }
        else
        {   
                $appointment = new Appointment;
                $appointment->user_id =  $userId;
                $appointment->doctor_id =  $request->doctor_id;
                $appointment->app_dt_start = $appointmentStartTime;
                $appointment->app_dt_end =  $appointmentEndTime;
                $appointment->save();
                flash('Appointment created successfully!')->success();
                return redirect('/');
        }
    }

}
