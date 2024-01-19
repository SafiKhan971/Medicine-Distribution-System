<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchDoctors extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $doctors = Doctor::where('name', 'like', '%' . $search . '%')
                ->orWhere('specialization', 'like', '%' . $search . '%')
                ->get();
        } else {
            $doctors = Doctor::all();
        }
        // $doctors = Doctor::all();
        return view('frontend.patient.doctors.index', compact('doctors'));
    }

    public function view($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        return view('frontend.patient.doctors.view', compact('doctor'));
    }
}
