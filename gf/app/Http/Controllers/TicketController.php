<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    public function verify(string $code)
    {
        $reg = EventRegistration::where('ticket_code', $code)->first();
        return view('tickets.verify', ['registration' => $reg]);
    }

    public function pdf(string $code): Response
    {
        $reg = EventRegistration::with('event')->where('ticket_code', $code)->firstOrFail();
        $pdf = Pdf::loadView('tickets.pdf', ['registration' => $reg]);
        $filename = 'Ticket-'.$reg->ticket_code.'.pdf';
        return $pdf->stream($filename);
    }
}
