<?php

namespace App\Mail;

use App\Models\EventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class EventTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public EventRegistration $registration) {}

    public function build()
    {
        $event = $this->registration->event;

        // QR payload (verification URL)
        $verifyUrl = route('tickets.verify', $this->registration->ticket_code);
        $qrPng = QrCode::format('png')->size(300)->margin(1)->generate($verifyUrl);
        $qrBase64 = 'data:image/png;base64,'.base64_encode($qrPng);

        // Attach PDF ticket
        $pdf = Pdf::loadView('tickets.pdf', [
            'registration' => $this->registration,
            'qrBase64'     => $qrBase64,
        ]);
        $filename = 'Ticket-'.$this->registration->ticket_code.'.pdf';
        $this->attachData($pdf->output(), $filename, ['mime' => 'application/pdf']);

        // Attach calendar invite (ICS)
        $ics = $this->buildIcs($event->title, $event->start_at, $event->end_at, $event->location, $verifyUrl);
        $this->attachData($ics, 'event.ics', ['mime' => 'text/calendar; charset=UTF-8']);

        return $this->subject('Your Ticket: '.$event->title)
            ->markdown('mail.events.ticket', [
                'registration' => $this->registration,
                'qrBase64'     => $qrBase64,
                'verifyUrl'    => $verifyUrl,
            ]);
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