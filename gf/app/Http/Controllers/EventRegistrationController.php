<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Mail\EventTicketMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Services\NotificationService;

class EventRegistrationController extends Controller
{
    public function create(Event $event)
    {
        abort_if(!$event->is_public, 404);
        abort_if($event->isPast(), 422, 'This event has already started.');
        abort_if($event->isFull(), 422, 'This event is at full capacity.');

        $presets = config('events.donation_presets', []);

        return view('events.register', compact('event', 'presets'));
    }

    public function store(Request $request, Event $event)
    {
        abort_if(!$event->is_public, 404);
        abort_if($event->isPast(), 422, 'This event has already started.');
        abort_if($event->isFull(), 422, 'This event is at full capacity.');

        $presets = config('events.donation_presets', []);
        $rules = [
            'name'  => ['required','string','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('event_registrations')->where(function ($query) use ($event) {
                    return $query->where('event_id', $event->id);
                })
            ],
            'phone' => ['nullable','regex:/^[0-9]{10,15}$/'],
            'member_id' => ['nullable','exists:members,id'],
        ];

        // Allow custom amounts for concerts
        if ($event->isConcert()) {
            $rules['amount_offered'] = ['required','integer','min:0'];
        } else {
            $rules['amount_offered'] = ['nullable','integer','min:0'];
        }

        $data = $request->validate($rules, [
            'email.unique' => 'This email is already registered for this event.',
        ]);
        $amount = (int) ($data['amount_offered'] ?? 0);

        // Check if this is a custom amount (not in presets)
        $customAmount = $event->isConcert() && !in_array($amount, $presets) && $amount > 0;

        // Calculate member visits count if member_id is provided
        $memberVisitsCount = 0;
        if (!empty($data['member_id'])) {
            $memberVisitsCount = EventRegistration::where('member_id', $data['member_id'])->count() + 1;
        }

        $registration = EventRegistration::create([
            'event_id'         => $event->id,
            'member_id'        => $data['member_id'] ?? null,
            'name'             => $data['name'],
            'email'            => $data['email'],
            'phone'            => $data['phone'] ?? null,
            'amount_offered'   => $amount,
            'custom_amount'    => $customAmount,
            'member_visits_count' => $memberVisitsCount,
            'ticket_code'      => Str::ulid()->toBase32(), // short, unique
            'status'           => 'REGISTERED',
        ]);

        // Load event relationship for notification
        $registration->load('event');

        // Create notification for admins
        NotificationService::newEventRegistration($registration);

        // Email ticket (with PDF + calendar)
        Mail::to($registration->email)->send(new EventTicketMail($registration));

        return back()->with('success', 'You are registered! Your e-ticket has been sent to your email.');
    }
}
