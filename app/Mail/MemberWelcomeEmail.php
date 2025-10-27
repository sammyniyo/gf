<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $mainGroupLink;
    public $choirGroupLink;
    public $activeChoristersLink;

    /**
     * Create a new message instance.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;

        // Group invite links - Update these with actual group links
        $this->mainGroupLink = config('services.whatsapp.main_group_link', 'https://chat.whatsapp.com/MAIN_GROUP');
        $this->choirGroupLink = config('services.whatsapp.choir_group_link', 'https://chat.whatsapp.com/CHOIR_GROUP');
        $this->activeChoristersLink = config('services.whatsapp.active_choristers_link', 'https://chat.whatsapp.com/ACTIVE_CHORISTERS');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to God\'s Family Choir! 🎵',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.member-welcome',
            with: [
                'member' => $this->member,
                'mainGroupLink' => $this->mainGroupLink,
                'choirGroupLink' => $this->choirGroupLink,
                'activeChoristersLink' => $this->activeChoristersLink,
            ]
        );
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

