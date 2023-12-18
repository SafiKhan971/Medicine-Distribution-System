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
}
