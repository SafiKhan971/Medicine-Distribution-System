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

        return redirect()->to( 'profile/feedbacks' )->with( 'success', 'Feedback created successfully!' );
    }

    public function edit($id) {
        $feedback = Feedback::find( $id );
        return view( 'frontend.patient.feedbacks.update', compact( 'feedback' ) );
    }

    public function update( Request $request , $id ) {
        $feedback = Feedback::find( $id );
        
        // Validate the request data
        $request->validate( [
            'comments' => 'required|string|max:191',
        ] );

        // Update a feedback
        if ($feedback) {
            $feedback->update([
                'comments' => $request->input('comments'),
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->to( 'profile/feedbacks' )->with( 'success', 'Feedback Updated successfully!' );
    }
}
