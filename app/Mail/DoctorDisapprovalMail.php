<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DoctorDisapprovalMail extends Mailable {
    use Queueable, SerializesModels;

    public $doctor;
    public $disapproval_reason;

    /**
    * Create a new message instance.
    */

    public function __construct( $doctor, $disapproval_reason ) {
        $this->doctor = $doctor;
        $this->disapproval_reason = $disapproval_reason;
    }

    /**
    * Get the message envelope.
    */

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Doctor Disapproval Mail',
        );
    }

    /**
    * Get the message content definition.
    */

    public function content(): Content {
        return new Content(
            view: 'emails.doctor_disapproval',
        );
    }

    /**
    * Get the attachments for the message.
    *
    * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    */

    public function attachments(): array {
        return [];
    }
}
