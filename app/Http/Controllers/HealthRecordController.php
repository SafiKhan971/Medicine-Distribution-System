<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function create()
    {
        $record = HealthRecord::where('user_id', auth()->user()->id)->first();
        // dd($record->toArray());
        return view('frontend.patient.health_record.create', compact('record'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
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

        if ($documentsData && is_array($documentsData)) {
            foreach ($documentsData as $documentFile) {
                $document = new Document;

                // Generate a unique filename for each document
                $documentName = $documentFile->getClientOriginalName();
                $documentPath = $documentFile->storeAs('public/', $documentName);

                // Set document attributes
                $document->path = $documentPath;
                $document->health_record_id = $record->id;

                // Save the document
                $document->save();
            }
        }


        // $document = new Document;
        // if ($request->hasFile('documents')) {
        //     $documents = $request->file('documents')->getClientOriginalName();
        //     $request->file('documents')->storeAs('public/', $documents);
        //     $document->path = $documents;
        // }
        // $document->health_record_id = $record->id;
        // $document->save();

        // Assuming 'documents' is the relationship method in the HealthRecord model
        // $documentsData = $request->input('documents');

        // if ($documentsData) {
        //     $documents = [];

        //     foreach ($documentsData as $documentData) {
        //         // Assuming you have a Document model with the appropriate fields in $fillable
        //         $document = new Document($documentData);
        //         $documents[] = $document;
        //     }
        //     // Save the documents using saveMany method
        //     $record->documents()->saveMany($documents);
        // }
        // dd($request->all());
        // $existing_record = HealthRecord::where('user_id', auth()->user()->id)->first();
        // if(empty($existing_record))
        // {
        //     $record = new HealthRecord;
        //     $record->user_id = auth()->user()->id;
        //     $record->doctor_id = $request->doctor_id;
        //     $record->past_medical_condition = $request->past_medical_condition;
        //     $record->present_medical_condition = $request->present_medical_condition;
        //     $record->medications = $request->medications;
        //     $record->blood_pressure = $request->blood_pressure;
        //     $record->heart_rate = $request->heart_rate;
        //     $record->respiratory_rate = $request->respiratory_rate;
        //     $record->temprature = $request->temprature;
        //     $record->weight = $request->weight;
        //     $record->lifestyle_info = $request->lifestyle_info;
        //     $record->healthcare_providers = $request->healthcare_providers;
        //     $record->comments = $request->comments;
        //     $record->save();

        //     $document = new Document;
        //     if ($request->hasFile('documents')) {
        //         $documents = $request->file('documents')->getClientOriginalName();
        //         $request->file('documents')->storeAs('public/', $documents);
        //         $document->path = $documents;
        //     }
        //     $document->health_record_id = $record->id;
        //     $document->save();

        //     flash('Health Record Added Successfully!')->success();
        //     return redirect('/profile');
        // }
        // else
        // {
        //     flash('Health Record Already Exists!')->error();
        //     return redirect('/profile');
        // }
    }
}
