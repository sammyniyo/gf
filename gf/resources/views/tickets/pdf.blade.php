@php
    $e = $registration->event;
@endphp
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>God's Family Choir - Ticket {{ $registration->registration_code }}</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #052e2b;
            margin: 0;
            padding: 20px;
            background-color: #f8fafc;
        }

        .ticket-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 0 10px 0;
        }

        .header p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
        }

        .event-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f0fdf4;
            border-radius: 12px;
            border-left: 4px solid #10b981;
        }

        .event-section h3 {
            color: #059669;
            font-size: 1.5rem;
            margin: 0 0 15px 0;
            border-bottom: 2px solid #d1fae5;
            padding-bottom: 10px;
        }

        .event-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-label {
            font-weight: 600;
            color: #374151;
            min-width: 80px;
        }

        .info-value {
            color: #1f2937;
            font-weight: 500;
        }

        .registration-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #fef3c7;
            border-radius: 12px;
            border-left: 4px solid #f59e0b;
        }

        .registration-section h3 {
            color: #92400e;
            font-size: 1.5rem;
            margin: 0 0 15px 0;
            border-bottom: 2px solid #fbbf24;
            padding-bottom: 10px;
        }

        .qr-section {
            text-align: center;
            padding: 30px;
            background: #f9fafb;
            border-radius: 12px;
            border: 2px dashed #d1d5db;
            margin: 30px 0;
        }

        .qr-section h3 {
            color: #374151;
            margin: 0 0 15px 0;
            font-size: 1.2rem;
        }

        .qr-code {
            max-width: 200px;
            margin: 0 auto 20px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .qr-code img {
            width: 100%;
            height: auto;
        }

        .qr-fallback {
            padding: 20px;
            color: #6b7280;
            background: #f3f4f6;
            border-radius: 8px;
            margin: 20px 0;
        }

        .footer {
            background: #f8fafc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        .footer p {
            margin: 5px 0;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .choir-details {
            background: #eff6ff;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #3b82f6;
            margin-bottom: 30px;
        }

        .choir-details h3 {
            color: #1e40af;
            margin: 0 0 10px 0;
        }

        .contact-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .ticket-container {
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <!-- Header -->
        <div class="header">
            <h1>🎵 God's Family Choir</h1>
            <p>Official Event Ticket</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Choir Details -->
            <div class="choir-details">
                <h3>🏛️ About God's Family Choir</h3>
                <p><strong>ASA UR Nyarugenge SDA</strong> - Spreading God's message through music and worship</p>
                <div class="contact-info">
                    <div>
                        <strong>📧 Email:</strong> asa.godsfamilychoir2017@gmail.com
                    </div>
                    <div>
                        <strong>📱 Phone:</strong> +250 783 871 782
                    </div>
                    <div>
                        <strong>📍 Location:</strong> Kigali, Rwanda
                    </div>
                    <div>
                        <strong>🌐 Website:</strong> godsfamilychoir.org
                    </div>
                </div>
            </div>

            <!-- Event Information -->
            <div class="event-section">
                <h3>🎪 Event Information</h3>
                <div class="event-info">
                    <div class="info-item">
                        <span class="info-label">Event:</span>
                        <span class="info-value">{{ $e->title }} ({{ strtoupper($e->type) }})</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date:</span>
                        <span class="info-value">{{ $e->start_at->format('D, M j, Y') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Time:</span>
                        <span class="info-value">{{ $e->start_at->format('h:i A') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Location:</span>
                        <span class="info-value">{{ $e->location ?? 'TBA' }}</span>
                    </div>
                </div>
                @if ($e->description)
                    <p><strong>Description:</strong> {{ $e->description }}</p>
                @endif
            </div>

            <!-- Registration Information -->
            <div class="registration-section">
                <h3>🎫 Registration Details</h3>
                <div class="event-info">
                    <div class="info-item">
                        <span class="info-label">Name:</span>
                        <span class="info-value">{{ $registration->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ $registration->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone:</span>
                        <span class="info-value">{{ $registration->phone ?? 'Not provided' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tickets:</span>
                        <span class="info-value">{{ $registration->tickets }} {{ Str::plural('Ticket', $registration->tickets) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Code:</span>
                        <span class="info-value" style="font-family: monospace; font-weight: bold;">{{ $registration->registration_code }}</span>
                    </div>
                    @if ($e->isConcert() && $registration->total_amount > 0)
                    <div class="info-item">
                        <span class="info-label">Support:</span>
                        <span class="info-value" style="color: #059669; font-weight: bold;">{{ number_format($registration->total_amount) }} RWF</span>
                    </div>
                    @endif
                </div>
                <p><strong>Registration Date:</strong> {{ $registration->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>

            <!-- QR Code Section -->
            <div class="qr-section">
                <h3>📱 Ticket QR Code</h3>
                <p style="color: #6b7280; margin-bottom: 20px;">Scan this code at the entrance for verification</p>

                <div class="qr-code">
                    @if (!empty($qrBase64))
                        <img src="{{ $qrBase64 }}" alt="QR Code for verification" />
                    @else
                        <div class="qr-fallback">
                            <p><strong>QR Code Generation Failed</strong></p>
                            <p>Please use the verification URL below:</p>
                            <p style="font-family: monospace; word-break: break-all; margin-top: 10px;">
                                {{ route('tickets.verify', $registration->registration_code) }}
                            </p>
                        </div>
                    @endif
                </div>

                <p style="color: #6b7280; font-size: 0.9rem; margin-top: 15px;">
                    <strong>Registration verified on:</strong> {{ $registration->created_at->format('M j, Y g:i A') }}
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Thank you for supporting God's Family Choir!</strong></p>
            <p>"Sing to the Lord a new song; sing to the Lord, all the earth." - Psalm 96:1</p>
            <p style="margin-top: 15px;">
                For support, contact: asa.godsfamilychoir2017@gmail.com | +250 783 871 782
            </p>
        </div>
    </div>
</body>

</html>
