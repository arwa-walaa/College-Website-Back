<?php
namespace App\Events;

use App\Models\Announcemets;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAnnouncementNotification;
use Illuminate\Mail\Events\MessageSending;

class NewAnnouncement implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $announcement;

    public function __construct(Announcemets $announcement)
    {
        $this->announcement = $announcement;
    }

    public function handle()
    {
        $user = User::find(3);

        Mail::to($user->email)->send(new NewAnnouncementNotification($this->announcement));
    }

    public function failed(\Exception $exception)
    {
        \Log::error('Failed to send email: ' . $exception->getMessage());
    }

    public function shouldHandle(MessageSending $event)
    {
        return $event->message->getTo() != null;
    }
}