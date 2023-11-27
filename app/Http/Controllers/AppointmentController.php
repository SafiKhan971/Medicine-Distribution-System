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
        return view('frontend.appointments.index');
    }

    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        return view('frontend.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $userId = auth()->user()->id;
        $appointmentStartTime = Carbon::parse($request->app_date_time);
        $appointmentEndTime = $appointmentStartTime->copy()->addMinutes(30);

        $data = Appointment::where('doctor_id', $request->doctor_id)
        ->whereBetween('app_dt_start', [$appointmentStartTime, $appointmentEndTime])
        ->first();
        dd($data);
        // dd($query->toSql());

        if(!empty($appointment))
        {
            flash('Appointment Not Available!')->error();
            return redirect('/');
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
