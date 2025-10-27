<?php

namespace App\Mail;

use App\Models\Meeting;
use App\Models\MeetingAttendee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public $attendee;

    public function __construct(Meeting $meeting, MeetingAttendee $attendee)
    {
        $this->meeting = $meeting;
        $this->attendee = $attendee;
    }

    public function build()
    {
        return $this->subject('Meeting Invitation: ' . $this->meeting->title)
            ->view('mail.meeting-invitation');
    }
}


