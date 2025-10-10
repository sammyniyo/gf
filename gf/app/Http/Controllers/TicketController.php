<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
// use Barryvdh\DomPDF\Facade\Pdf; // Temporarily disabled - package not installed
use Illuminate\Http\Response;

class TicketController extends Controller
{
    public function verify(string $code)
    {
        $reg = EventRegistration::where('registration_code', $code)->first();
        return view('tickets.verify', ['registration' => $reg]);
    }

    public function pdf(string $code): Response
    {
        // Temporarily disabled PDF generation - package not installed
        // $reg = EventRegistration::with('event')->where('registration_code', $code)->firstOrFail();
        // $pdf = Pdf::loadView('tickets.pdf', ['registration' => $reg]);
        // $filename = 'Ticket-'.$reg->registration_code.'.pdf';
        // return $pdf->stream($filename);

        // Return a simple text response for now
        return response('PDF generation temporarily disabled - DomPDF package not installed', 503);
    }
}
