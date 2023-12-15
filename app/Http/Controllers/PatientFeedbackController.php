<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class PatientFeedbackController extends Controller {
    public function index() {
        $feedbacks = Feedback::where( 'user_id', auth()->user()->id )->get();
        return view( 'frontend.patient.feedbacks.index', compact('feedbacks') );
    }

    public function create() {
        return view( 'frontend.patient.feedbacks.create' );
    }

    public function store( Request $request ) {
        $feedback = new Feedback;

        // Validate the request data
        $request->validate( [
            'comments' => 'required|string|max:191',
        ] );

        // Create a new feedback using the create method
        Feedback::create( [
            'comments' => $request->input( 'comments' ),
            'user_id' => auth()->user()->id,
        ] );

        return redirect()->to( '/profile/feedbacks' )->with( 'success', 'Feedback created successfully!' );
    }

    public function update() {
        return view( 'frontend.patient.feedbacks.update' );
    }
}
