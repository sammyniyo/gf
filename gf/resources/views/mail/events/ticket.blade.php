@component('mail::message')
    # Your Ticket: {{ $registration->event->title }}

    Hi {{ $registration->name }},

    You're registered for **{{ $registration->event->title }}**.

    **Date:** {{ $registration->event->start_at->format('D, M j, Y g:i A') }}
    @if ($registration->event->location)
        **Location:** {{ $registration->event->location }}
    @endif

    @if ($registration->event->isConcert())
        **Your support amount:** {{ number_format($registration->amount_offered) }} RWF
    @endif

    Scan this QR code at the entrance:

    <img src="{{ $qrBase64 }}" alt="QR Code" style="max-width:180px; display:block; margin:16px 0;">

    @component('mail::button', ['url' => $verifyUrl])
        View / Verify Ticket
    @endcomponent

    We also attached a **PDF ticket** and a **calendar invite (ICS)**.

    Thanks,
    **God's Family Choir**
@endcomponent
