<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use App\Services\QrCodeService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function verify(?string $code = null)
    {
        $reg = null;
        if (!empty($code)) {
            $reg = EventRegistration::where('registration_code', $code)->first();
        }
        return view('tickets.verify', ['registration' => $reg]);
    }

    public function pdf(?string $code = null): Response
    {
        if (empty($code)) {
            abort(404);
        }
        $reg = EventRegistration::with('event')->where('registration_code', $code)->firstOrFail();

        // Generate QR code for the PDF
        $qrBase64 = QrCodeService::generateTicketQr($reg->registration_code);

        // Check if DomPDF is available
        if (class_exists('\Barryvdh\DomPDF\Facade\Pdf')) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('tickets.pdf', [
                'registration' => $reg,
                'qrBase64' => $qrBase64
            ]);

            $filename = 'Ticket-'.$reg->registration_code.'.pdf';
            return $pdf->stream($filename);
        }

        // Fallback: Return HTML version with print instructions
        return response()->view('tickets.print', [
            'registration' => $reg,
            'qrBase64' => $qrBase64
        ])->header('Content-Type', 'text/html');
    }
}
