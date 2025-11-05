<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Committee;
use App\Mail\BulkEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BulkEmailController extends Controller
{
    /**
     * Show the bulk email form
     */
    public function index()
    {
        $memberCount = Member::whereNotNull('email')->count();
        $committeeCount = Committee::where('is_active', true)->whereNotNull('email')->count();
        
        return view('admin.bulk-email.index', compact('memberCount', 'committeeCount'));
    }

    /**
     * Send bulk emails
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'recipient_type' => 'required|in:all_members,committee,custom',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'custom_recipients' => 'required_if:recipient_type,custom|nullable|array',
            'custom_recipients.*' => 'exists:members,id',
        ]);

        $recipients = [];
        $recipientType = $validated['recipient_type'];

        // Get recipients based on type
        if ($recipientType === 'all_members') {
            $recipients = Member::whereNotNull('email')
                ->where('email', '!=', '')
                ->get();
        } elseif ($recipientType === 'committee') {
            $committees = Committee::where('is_active', true)
                ->whereNotNull('email')
                ->where('email', '!=', '')
                ->get();
            
            // Convert committees to a format that works with our mail class
            foreach ($committees as $committee) {
                $recipients[] = (object)[
                    'email' => $committee->email,
                    'name' => $committee->name,
                    'first_name' => explode(' ', $committee->name)[0] ?? $committee->name,
                    'last_name' => implode(' ', array_slice(explode(' ', $committee->name), 1)) ?? '',
                ];
            }
            $recipients = collect($recipients);
        } elseif ($recipientType === 'custom') {
            $recipients = Member::whereIn('id', $validated['custom_recipients'])
                ->whereNotNull('email')
                ->where('email', '!=', '')
                ->get();
        }

        if ($recipients->isEmpty()) {
            return back()->with('error', 'No recipients found with valid email addresses.');
        }

        $successCount = 0;
        $failCount = 0;

        // Send emails
        foreach ($recipients as $recipient) {
            try {
                Mail::to($recipient->email)->send(
                    new BulkEmail(
                        $validated['subject'],
                        $validated['message'],
                        $recipient
                    )
                );
                $successCount++;
            } catch (\Exception $e) {
                Log::error("Failed to send bulk email to {$recipient->email}: " . $e->getMessage());
                $failCount++;
            }
        }

        $message = "Bulk email sent successfully! ✅ Sent to {$successCount} recipient(s)";
        if ($failCount > 0) {
            $message .= " ❌ Failed: {$failCount} recipient(s)";
        }

        return back()->with('success', $message);
    }
}

