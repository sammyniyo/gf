<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Message from God\'s Family Choir' }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 650px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.95;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 16px;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .message-content {
            font-size: 16px;
            line-height: 1.8;
            color: #374151;
            white-space: pre-wrap;
        }
        .footer {
            background: #f9fafb;
            padding: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            border-top: 1px solid #e5e7eb;
        }
        .footer strong {
            color: #059669;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>God's Family Choir</h1>
            <p>ASA UR Nyarugenge SDA</p>
        </div>

        <div class="content">
            <p class="greeting">Dear {{ $recipient->first_name ?? ($recipient->name ?? 'Member') }},</p>

            <div class="message-content">
                {!! nl2br(e($message)) !!}
            </div>

            <p style="margin-top: 30px; color: #6b7280;">
                Warm regards,<br>
                <strong style="color: #059669;">God's Family Choir Leadership Team</strong>
            </p>
        </div>

        <div class="footer">
            <p><strong>God's Family Choir</strong></p>
            <p>ASA UR Nyarugenge SDA Church | Kigali, Rwanda</p>
            <p style="margin-top: 15px;">
                📧 asa.godsfamilychoir2017@gmail.com | 📱 +250 783 871 782
            </p>
            <p style="margin-top: 15px; font-size: 12px; color: #9ca3af;">
                You're receiving this because you're part of God's Family Choir community.
            </p>
        </div>
    </div>
</body>
</html>

