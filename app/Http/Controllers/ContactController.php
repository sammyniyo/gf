<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Store contact to database
        Contact::create($validated);

        // You can also send email notification here if needed
        // Mail::to(config('mail.from.address'))->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for reaching out. We\'ll get back to you shortly!');
    }
}
