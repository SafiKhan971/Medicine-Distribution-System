<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
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
        $appointment = new Appointment;
        $appointment->user_id = auth()->user()->id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->app_date_time = $request->app_date_time;
        $appointment->save(); 
    }
}
