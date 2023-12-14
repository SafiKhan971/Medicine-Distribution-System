<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchDoctors extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('frontend.patient.doctors.index', compact('doctors'));
    }
}
