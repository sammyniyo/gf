<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0;
            font-size: 16px;
            opacity: 0.95;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .event-details {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .event-details h2 {
            margin: 0 0 15px 0;
            font-size: 22px;
            color: #667eea;
        }
        .detail-row {
            display: flex;
            margin: 10px 0;
            font-size: 15px;
        }
        .detail-label {
            font-weight: 600;
            color: #666;
            min-width: 100px;
        }
        .detail-value {
            color: #333;
            font-weight: 500;
        }
        .qr-section {
            text-align: center;
            padding: 30px;
            background: #ffffff;
            border: 2px dashed #667eea;
            border-radius: 12px;
            margin: 30px 0;
        }
        .qr-section h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
            color: #667eea;
        }
        .qr-section img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
            border: 3px solid #667eea;
            border-radius: 8px;
            padding: 10px;
            background: white;
        }
        .qr-fallback {
            padding: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            text-align: center;
            color: #666;
        }
        .button {
            display: inline-block;
            background: #667eea;
            color: #ffffff !important;
            text-decoration: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            transition: background 0.3s;
        }
        .button:hover {
            background: #764ba2;
        }
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 6px;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #1976D2;
        }
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
            border-top: 1px solid #e0e0e0;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎵 Event Ticket</h1>
            <p>God's Family Choir</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Hi <strong>{{ $registration->name }}</strong>,</p>

            <p>Thank you for registering! We're excited to have you join us for this special event.</p>

            <!-- Event Details -->
            <div class="event-details">
                <h2>{{ $registration->event->title }}</h2>

                <div class="detail-row">
                    <span class="detail-label">📅 Date:</span>
                    <span class="detail-value">{{ $registration->event->start_at->format('l, F j, Y') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">🕐 Time:</span>
                    <span class="detail-value">{{ $registration->event->start_at->format('g:i A') }}</span>
                </div>

    @if ($registration->event->location)
                <div class="detail-row">
                    <span class="detail-label">📍 Location:</span>
                    <span class="detail-value">{{ $registration->event->location }}</span>
                </div>
    @endif

                @if ($registration->event->isConcert() && $registration->total_amount > 0)
                <div class="detail-row">
                    <span class="detail-label">💰 Support:</span>
                    <span class="detail-value">{{ number_format($registration->total_amount, 0) }} RWF</span>
                </div>
    @endif

                <div class="detail-row">
                    <span class="detail-label">🎟️ Ticket Code:</span>
                    <span class="detail-value"><strong>{{ $registration->registration_code }}</strong></span>
                </div>
            </div>

            <!-- QR Code -->
            <div class="qr-section">
                <h3>📱 Your Entry QR Code</h3>
                <p style="color: #666; font-size: 14px; margin-bottom: 15px;">Scan this at the entrance for quick check-in</p>

                @if(isset($qrUrl))
                    <img src="{{ $qrUrl }}" alt="Entry QR Code">
                @else
                    <div class="qr-fallback">
                        <p>⚠️ QR Code could not be generated</p>
                        <p>Please use your ticket code: <strong>{{ $registration->registration_code }}</strong></p>
                    </div>
                @endif
            </div>

            <!-- Action Button -->
            <div style="text-align: center;">
                <a href="{{ $verifyUrl }}" class="button">
                    View Full Ticket Details
                </a>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <p><strong>ℹ️ What to Bring:</strong></p>
                <p>✓ This email (printed or on your phone)</p>
                <p>✓ Valid ID for verification</p>
                <p>✓ Your enthusiasm and love for music! 🎶</p>
            </div>

            <p style="margin-top: 30px; color: #666; font-size: 14px;">
                A calendar invitation has been attached to help you remember the event.
                We've also included your ticket details for your convenience.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>God's Family Choir</strong></p>
            <p>ASA UR Nyarugenge SDA | Kigali, Rwanda</p>
            <p>
                📧 <a href="mailto:asa.godsfamilychoir2017@gmail.com">asa.godsfamilychoir2017@gmail.com</a><br>
                📱 <a href="tel:+250783871782">+250 783 871 782</a><br>
                🌐 <a href="https://godsfamilychoir.org">godsfamilychoir.org</a>
            </p>
            <p style="margin-top: 15px; color: #999; font-size: 12px;">
                Can't attend? <a href="{{ $verifyUrl }}">Contact us</a> to let us know.
            </p>
        </div>
    </div>
</body>
</html>
