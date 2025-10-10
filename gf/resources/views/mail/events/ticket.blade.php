@component('mail::message')
    # Your Ticket: {{ $registration->event->title }}

    Hi {{ $registration->name }},

    You're registered for **{{ $registration->event->title }}**.

    **Date:** {{ $registration->event->start_at->format('D, M j, Y g:i A') }}
    @if ($registration->event->location)
        **Location:** {{ $registration->event->location }}
    @endif

    @if ($registration->event->isConcert())
        **Your support amount:** {{ number_format($registration->total_amount) }} RWF
    @endif

    Scan this QR code at the entrance:

    @if($qrBase64)
        <img src="{{ $qrBase64 }}" alt="QR Code" style="max-width:180px; display:block; margin:16px 0;">
    @else
        <div style="width:180px; height:180px; border:2px dashed #ccc; display:flex; align-items:center; justify-content:center; margin:16px 0; background:#f9f9f9;">
            <div style="text-align:center; color:#666; font-size:12px;">
                QR Code<br>Unavailable<br><br>
                <a href="{{ $verifyUrl }}" style="color:#007bff; text-decoration:none;">View Ticket Instead</a>
            </div>
        </div>
    @endif

    @component('mail::button', ['url' => $verifyUrl])
        View / Verify Ticket
    @endcomponent

    We also attached a **PDF ticket** and a **calendar invite (ICS)**.

    Thanks,
    **God's Family Choir**
@endcomponent
