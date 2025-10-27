<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Member;

class PdfService
{
    /**
     * Generate Member ID Card PDF
     */
    public static function generateMemberIdCard(Member $member)
    {
        $pdf = PDF::loadView('pdf.member-id-card', compact('member'));
        return $pdf->setPaper([0, 0, 242.65, 153], 'landscape'); // Credit card size
    }

    /**
     * Generate Registration Confirmation PDF
     */
    public static function generateRegistrationConfirmation(Member $member)
    {
        $pdf = PDF::loadView('pdf.registration-confirmation', compact('member'));
        return $pdf->setPaper('a4');
    }

    /**
     * Download Member ID Card
     */
    public static function downloadMemberIdCard(Member $member)
    {
        $pdf = self::generateMemberIdCard($member);
        return $pdf->download('member-id-card-' . $member->member_id . '.pdf');
    }

    /**
     * Stream Member ID Card (view in browser)
     */
    public static function streamMemberIdCard(Member $member)
    {
        $pdf = self::generateMemberIdCard($member);
        return $pdf->stream('member-id-card-' . $member->member_id . '.pdf');
    }

    /**
     * Download Registration Confirmation
     */
    public static function downloadRegistrationConfirmation(Member $member)
    {
        $pdf = self::generateRegistrationConfirmation($member);
        return $pdf->download('registration-confirmation-' . $member->member_id . '.pdf');
    }

    /**
     * Stream Registration Confirmation
     */
    public static function streamRegistrationConfirmation(Member $member)
    {
        $pdf = self::generateRegistrationConfirmation($member);
        return $pdf->stream('registration-confirmation-' . $member->member_id . '.pdf');
    }
}

