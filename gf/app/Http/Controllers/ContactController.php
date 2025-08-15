<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function submit(Request $request)
{
$request->validate([
'name' => 'required|string',
'email' => 'required|email',
'message' => 'required|string|max:1000',
]);

// You can send email, store to DB, or log the message here.

return back()->with('success', 'Thank you for reaching out. We’ll get back to you shortly!');
}

    /**
     * Handle the contact form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}