<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Announcemets;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $email;

    public $announcement;
    /**
     * Create a new message instance.
     */
    public function __construct($token, $email, Announcemets $announcement)
    {
        $this->token = $token;
        $this->email = $email;
        $this->announcement = $announcement;
    }
    // public function __construct(){}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Password',
        );
    }

    
    public function build()
    {
        return $this->markdown('emails.resetPassword')->with([
            'token' => $this->token,
            'email' => $this->email
        ]);
    }

    public function buildNewAnnouncement()
    {
        return $this->subject('New Announcement')->view('emails.new-announcement');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
