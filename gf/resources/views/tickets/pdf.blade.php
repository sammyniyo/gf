@php
    $e = $registration->event;
@endphp
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ticket {{ $registration->ticket_code }}</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #052e2b;
        }

        .card {
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            padding: 20px;
        }

        .muted {
            color: #374151;
        }

        .qr {
            margin-top: 16px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>God's Family Choir — Ticket</h2>
        <p><strong>Event:</strong> {{ $e->title }} ({{ strtoupper($e->type) }})</p>
        <p><strong>Date:</strong> {{ $e->start_at->format('D, M j, Y g:i A') }}</p>
        @if ($e->location)
            <p><strong>Location:</strong> {{ $e->location }}</p>
        @endif
        <p><strong>Name:</strong> {{ $registration->name }}</p>
        <p><strong>Ticket Code:</strong> {{ $registration->ticket_code }}</p>
        @if ($e->isConcert())
            <p><strong>Support:</strong> {{ number_format($registration->amount_offered) }} RWF</p>
        @endif
        <div class="qr">
            @if (!empty($qrBase64))
                <img src="{{ $qrBase64 }}" alt="QR" width="160">
            @else
                <small class="muted">QR unavailable</small>
            @endif
        </div>
        <p class="muted" style="margin-top:10px;">
            Verify: {{ route('tickets.verify', $registration->ticket_code) }}
        </p>
    </div>
</body>

</html>
