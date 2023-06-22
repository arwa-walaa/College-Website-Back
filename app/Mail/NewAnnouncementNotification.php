<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewAnnouncementNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $announcment;
    /**
     * Create a new message instance.
     */
    public function __construct($announcment)
    {
        //
        $this->announcment=$announcment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Announcement',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.NewAnnouncementNotification',
    //     );
    // }
    public function build()
    {
        return $this->markdown('emails.NewAnnouncementNotification')->with([
            'announcment' => $this->announcment
            
        ]);
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
