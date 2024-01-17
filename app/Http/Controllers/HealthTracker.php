<?php

namespace App\Http\Controllers;

class HealthTracker extends Controller
{
    public function index()
    {
        return view('frontend.patient.tracker.index');
    }
}
