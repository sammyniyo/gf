<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Subscribe a new email address.
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'You are already subscribed!',
        ]);

        if ($validator->fails()) {
            return back()->with('subscriber_error', $validator->errors()->first('email'));
        }

        Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('subscriber_success', 'Thank you for subscribing! You\'ll receive updates on events and devotions.');
    }
}
