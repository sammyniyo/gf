<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Mail\EventTicketMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EventRegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        abort_if(!$event->is_public, 404);
        abort_if($event->isPast(), 422, 'This event has already started.');
        abort_if($event->isFull(), 422, 'This event is at full capacity.');

        $presets = config('events.donation_presets', []);
        $rules = [
            'name'  => ['required','string','max:255'],
            'email' => ['required','email','max:255'],
            'phone' => ['nullable','regex:/^[0-9]{10,15}$/'],
        ];

        if ($event->isConcert()) {
            $rules['amount_offered'] = [
                'required',
                'integer',
                Rule::in($presets), // exact preset; change to min if you want custom
            ];
        } else {
            $rules['amount_offered'] = ['nullable','integer','min:0'];
        }

        $data = $request->validate($rules);
        $amount = (int) ($data['amount_offered'] ?? 0);

        $registration = EventRegistration::create([
            'event_id'       => $event->id,
            'name'           => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'] ?? null,
            'amount_offered' => $amount,
            'ticket_code'    => Str::ulid()->toBase32(), // short, unique
            'status'         => 'REGISTERED',
        ]);

        // Email ticket (with PDF + calendar)
        Mail::to($registration->email)->send(new EventTicketMail($registration));

        return back()->with('success', 'You are registered! Your e-ticket has been sent to your email.');
    }
}