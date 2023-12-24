<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $prescriptions = Prescription::with('patient')->get();
         // dd($prescriptions);
         return view('frontend.doctor.prescriptions.index', compact('prescriptions'));
     }


    public function patient_index()
    {
        $prescriptions = Prescription::with('doctor')->get();
        // dd($prescriptions);
        return view('frontend.patient.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.doctor.prescriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       Prescription::create([
            'user_id' => $request->input('patient_id'),
            'doctor_id' => session('doctor_id'),
            'medicine_name' => $request->input('medicine_name'),
            'frequency' => $request->input('frequency'),
            'dosage' => $request->input('dosage'),
            'unit' => $request->input('unit'),
            'route_of_administration' => $request->input('route_of_administration'),
            'duration' => $request->input('duration'),
            'additional_instructions' => $request->input('additional_instructions'),
        ]);

        // notify()->success('Prescription created successfully!', 'Success');

        return redirect()->route('prescriptions.index')->with('success','Prescription created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prescriptions = Prescription::where('user_id', Auth::id())->with('doctor')->get();
        // dd($prescription->toArray());
        return view('frontend.patient.prescriptions.show', compact('prescriptions'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prescription = Prescription::find($id);
        // You can pass additional data to the view if needed
        return view('frontend.doctor.prescriptions.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        // Validate the request data
        $request->validate([
            'patient_id' => 'required|string',
            'medicine_name' => 'required|string',
            'frequency' => 'required|string',
            'dosage' => 'required|string',
            'unit' => 'required|string',
            'route_of_administration' => 'required|string',
            'duration' => 'required|string',
            'additional_instructions' => 'nullable|string',
        ]);

        // Update the prescription
        $prescription->update([
            'user_id' => $request->input('patient_id'),
            'medicine_name' => $request->input('medicine_name'),
            'frequency' => $request->input('frequency'),
            'dosage' => $request->input('dosage'),
            'unit' => $request->input('unit'),
            'route_of_administration' => $request->input('route_of_administration'),
            'duration' => $request->input('duration'),
            'additional_instructions' => $request->input('additional_instructions'),
        ]);

        // notify()->success('Prescription updated successfully!', 'Success');

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        // Delete the prescription
        $prescription->delete();
        // notify()->success('Prescription deleted successfully!', 'Success');

        // Optionally, you can return a response or redirect to another page
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully!');
    }
}
