<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function index()
    {
        $health_records = HealthRecord::where('user_id', auth()->user()->id)->get();
        return view('frontend.patient.health_record.index', compact('health_records'));
    }

    public function view()
    {
        $record = HealthRecord::where('user_id', auth()->user()->id)->first();
        return view('frontend.patient.health_record.view', compact('record'));
    }

    public function create()
    {
        $record = HealthRecord::where('user_id', auth()->user()->id)->first();
        return view('frontend.patient.health_record.create', compact('record'));
    }

    public function store(Request $request)
    {
        $record = HealthRecord::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'user_id' => auth()->user()->id,
                'doctor_id' => $request->input('doctor_id'),
                'past_medical_condition' => $request->input('past_medical_condition'),
                'present_medical_condition' => $request->input('present_medical_condition'),
                'medications' => $request->input('medications'),
                'blood_pressure' => $request->input('blood_pressure'),
                'heart_rate' => $request->input('heart_rate'),
                'respiratory_rate' => $request->input('respiratory_rate'),
                'temprature' => $request->input('temprature'),
                'weight' => $request->input('weight'),
                'lifestyle_info' => $request->input('lifestyle_info'),
                'healthcare_providers' => $request->input('healthcare_providers'),
                'comments' => $request->input('comments'),
            ]
        );

        $documentsData = $request->file('documents');

        if ($documentsData && is_array($documentsData) && count($documentsData) > 0) {
            foreach ($documentsData as $documentFile) {
                $document = new Document;

                // Generate a unique filename for each document
                $documentName = $documentFile->getClientOriginalName();
                $documentPath = $documentFile->storeAs('public/documents/', $documentName);

                // Set document attributes
                $document->path = $documentPath;
                $document->health_record_id = $record->id;

                $document->save();
            }
        }

        // if($record->wasRecentlyCreated())
        // {
        //     flash('Health Record Created Successfully!');
        // }
        // else
        // {
        // }

        return redirect()->to('profile/health-record')->with('success', 'Health Record Created Successfully!');;

    }
}
