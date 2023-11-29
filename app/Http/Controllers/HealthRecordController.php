<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function create()
    {
        return view('frontend.patient.health_record.create');
    }

    public function store(Request $request)
    {
        $record = new HealthRecord;
        $record->user_id = auth()->user()->id;
        $record->doctor_id = $request->doctor_id;
        $record->past_medical_condition = $request->past_medical_condition;
        $record->present_medical_condition = $request->present_medical_condition;
        $record->medications = $request->medications;
        $record->blood_pressure = $request->blood_pressure;
        $record->heart_rate = $request->heart_rate;
        $record->respiratory_rate = $request->respiratory_rate;
        $record->temprature = $request->temprature;
        $record->weight = $request->weight;
        $record->lifestyle_info = $request->lifestyle_info;
        $record->healthcare_providers = $request->healthcare_providers;
        $record->documents = $request->documents;
        $record->comments = $request->comments;
        $record->save();



    }
}
