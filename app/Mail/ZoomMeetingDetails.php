<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ZoomMeetingDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $zoomMeetingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($zoomMeetingDetails)
    {
        $this->zoomMeetingDetails = $zoomMeetingDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.zoom_meeting_details');
    }
}
