<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FriendshipWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $mainGroupLink;

    /**
     * Create a new message instance.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;

        // Main group invite link - Update with actual group link
        $this->mainGroupLink = config('services.whatsapp.main_group_link', 'https://chat.whatsapp.com/MAIN_GROUP');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to God\'s Family! 🙏',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.friendship-welcome',
            with: [
                'member' => $this->member,
                'mainGroupLink' => $this->mainGroupLink,
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

