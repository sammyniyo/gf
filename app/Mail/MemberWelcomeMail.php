<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Member $member) {}

    public function build()
    {
        // WhatsApp group link - update this with your actual link
        $whatsappGroupLink = 'https://chat.whatsapp.com/Df0ga59rC7wFDcMWqMbMCK?mode=wwt';
    
        return $this->subject('Welcome to God\'s Family Choir!')
            ->view('mail.members.welcome', [
                'member' => $this->member,
                'whatsappGroupLink' => $whatsappGroupLink,
            ]);
    }
}
