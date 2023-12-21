<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\ZoomMeetingDetails;
use Illuminate\Support\Facades\Mail;

class ZoomController extends Controller {

    public function authorizeZoom( Request $request ) {
        $user_email = $request->patient_email;
        $user_id = $request->patient_id;
        session()->put( 'user_email', $user_email );
        session()->put( 'user_id', $user_id );

        $zoomAuthorizeUrl = 'https://zoom.us/oauth/authorize?' . http_build_query( [
            'response_type' => 'code',
            'client_id' => '7xi6_VY6RayS3AkHWshCQQ',
            'redirect_uri' => 'http://localhost:8000/redirect',
        ] );

        return redirect()->away( $zoomAuthorizeUrl );
    }

    public function redirect( Request $request ) {
        $authorizationCode = $request->input( 'code' );

        // Obtain user access token
        $userAccessToken = $this->getUserAccessToken( $authorizationCode );

        // Create and send Zoom meeting details
        $zoomMeetingDetails = $this->createZoomMeeting( $userAccessToken );

        $notification = Notification::where( 'type', 'video_call_request' )
        ->where( 'user_id', session()->get( 'user_id' ) )
        ->first();

        $notification = Notification::where( 'type', 'video_call_request' )
        ->where( 'user_id', session()->get( 'user_id' ) )
        ->first();

        // Check if a notification was found
        if ( $notification ) {
            // Update the status
            $notification->status = 1;
            $notification->save();
        }

        // Get user email from the session
        $userEmail = session()->get( 'user_email' );
        $doctorEmail = session()->get( 'doctor_email' );

        // Send email with Zoom meeting details
        Mail::to( $userEmail )->send( new ZoomMeetingDetails( $zoomMeetingDetails ) );
        Mail::to( $doctorEmail )->send( new ZoomMeetingDetails( $zoomMeetingDetails ) );

        // return response()->json( [ 'message' => 'Zoom meeting created and details sent successfully' ] );
        return redirect()->to( 'doctor/video-consultation-requests' )->with( 'success', 'Zoom meeting created and details of that meeting has been sent to you & user successfully!' );
    }

    private function getUserAccessToken( $authorizationCode ) {
        $client = new Client();

        $response = $client->post( 'https://zoom.us/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $authorizationCode,
                'redirect_uri' => 'http://localhost:8000/redirect',
                'client_id' => '7xi6_VY6RayS3AkHWshCQQ',
                'client_secret' => 'W32RtQExKOzoNKGcl4S8sweL6oyep30V',
            ],
        ] );

        if ( $response->getStatusCode() !== 200 ) {
            // Handle the error
            abort( 500, 'Zoom Token Request Failed' );
        }

        $accessToken = json_decode( $response->getBody(), true )[ 'access_token' ];

        return $accessToken;
    }

    private function createZoomMeeting( $userAccessToken ) {
        $client = new Client();

        $response = $client->post( 'https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $userAccessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'topic' => 'Video Consultation',
                'type' => 2,
                'start_time' => now()->addHour()->toIso8601String(),
                'duration' => 60,
            ],
        ] );

        return json_decode( $response->getBody(), true );
    }
}
