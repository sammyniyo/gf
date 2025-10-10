<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #4f46e5 0%, #0ea5e9 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f8fafc; padding: 30px; border-radius: 0 0 10px 10px; }
        .button { display: inline-block; background: #4f46e5; color: white; padding: 12px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; }
        .details { background: white; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #4f46e5; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0;">🎵 God's Family Choir</h1>
            <p style="margin: 10px 0 0;">Meeting Invitation</p>
        </div>
        <div class="content">
            <p>Dear {{ $attendee->name }},</p>
            <p>You are invited to attend the following meeting:</p>

            <div class="details">
                <h2 style="margin-top: 0; color: #4f46e5;">{{ $meeting->title }}</h2>
                @if($meeting->description)
                    <p>{{ $meeting->description }}</p>
                @endif
                <p><strong>📅 Date & Time:</strong> {{ $meeting->meeting_date->format('F d, Y \a\t h:i A') }}</p>
                @if($meeting->location)
                    <p><strong>📍 Location:</strong> {{ $meeting->location }}</p>
                @endif
                @if($meeting->meeting_link)
                    <p><strong>🔗 Virtual Link:</strong> <a href="{{ $meeting->meeting_link }}">Join Meeting</a></p>
                @endif
            </div>

            @if($meeting->meeting_link)
                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ $meeting->meeting_link }}" class="button">Join Virtual Meeting</a>
                </p>
            @endif

            <p>We look forward to your participation!</p>
            <p style="margin-top: 30px; font-size: 12px; color: #64748b;">
                This is an automated message from God's Family Choir.<br>
                ASA UR Nyarugenge SDA | Kigali, Rwanda
            </p>
        </div>
    </div>
</body>
</html>


