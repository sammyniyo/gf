<?php

namespace App\Mail;

use App\Models\EventRegistration;
use App\Services\QrCodeService;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class EventTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public EventRegistration $registration) {}

    public function build()
    {
        $event = $this->registration->event;

        // Ensure we have a registration code
        $code = $this->registration->registration_code;
        if (empty($code)) {
            $code = $this->generateAndPersistRegistrationCode();
        }

        // QR payload (verification URL)
        $verifyUrl = route('tickets.verify', $code);

        // Generate QR code as base64 for PDF (PDFs support base64)
        $qrBase64 = QrCodeService::generateTicketQr($code);

        // Generate QR code as direct URL for email (email clients prefer direct URLs)
        $qrUrl = QrCodeService::generateUrl($verifyUrl, 300);

        // Attach PDF ticket if DomPDF is available
        if (class_exists('\Barryvdh\DomPDF\Facade\Pdf')) {
            $pdf = PDF::loadView('tickets.pdf', [
                'registration' => $this->registration,
                'qrBase64'     => $qrBase64,
            ]);
            $filename = 'Ticket-'.$this->registration->registration_code.'.pdf';
            $this->attachData($pdf->output(), $filename, ['mime' => 'application/pdf']);
        }

        // Attach calendar invite (ICS)
        $ics = $this->buildIcs($event->title, $event->start_at, $event->end_at, $event->location, $verifyUrl);
        $this->attachData($ics, 'event.ics', ['mime' => 'text/calendar; charset=UTF-8']);

        return $this->subject('Your Ticket: '.$event->title)
            ->markdown('mail.events.ticket', [
                'registration' => $this->registration,
                'qrBase64'     => $qrBase64,
                'qrUrl'        => $qrUrl, // Direct URL for email display
                'verifyUrl'    => $verifyUrl,
            ]);
    }

    protected function generateAndPersistRegistrationCode(): string
    {
        // Generate a simple unique code; if collisions are a concern, loop/check
        $newCode = strtoupper(\Illuminate\Support\Str::random(10));
        // Persist to make sure all subsequent uses have it
        $this->registration->registration_code = $newCode;
        $this->registration->save();
        return $newCode;
    }

    protected function buildIcs($title, $start, $end, $location, $url): string
    {
        $uid = (string) Str::uuid();
        $dtStart = $start->clone()->utc()->format('Ymd\THis\Z');
        $dtEnd   = ($end ?? $start->clone()->addHours(2))->clone()->utc()->format('Ymd\THis\Z');

        return "BEGIN:VCALENDAR\r\n".
               "VERSION:2.0\r\n".
               "PRODID:-//GF Choir//Events//EN\r\n".
               "BEGIN:VEVENT\r\n".
               "UID:$uid\r\n".
               "DTSTAMP:".now()->utc()->format('Ymd\THis\Z')."\r\n".
               "DTSTART:$dtStart\r\n".
               "DTEND:$dtEnd\r\n".
               "SUMMARY:".addslashes($title)."\r\n".
               "LOCATION:".addslashes((string)$location)."\r\n".
               "DESCRIPTION:Ticket & details: $url\r\n".
               "URL:$url\r\n".
               "END:VEVENT\r\n".
               "END:VCALENDAR\r\n";
    }
}
