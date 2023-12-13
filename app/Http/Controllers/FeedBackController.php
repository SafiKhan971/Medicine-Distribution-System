<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        return view('frontend.patient.feedbacks.index');
    }
}
