<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberCodeReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Member $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function build()
    {
        return $this->subject("Your God's Family registration code")
            ->view('emails.member-code-reminder')
            ->with([
                'member' => $this->member,
            ]);
    }
}


