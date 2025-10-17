<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to God's Family Choir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .member-id-box {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px 0;
        }
        .member-id-box h2 {
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: normal;
            opacity: 0.9;
        }
        .member-id {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .group-links {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .group-link {
            display: block;
            background: #10b981;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 8px;
            margin: 10px 0;
            text-align: center;
            font-weight: bold;
        }
        .group-link:hover {
            background: #059669;
        }
        .group-link.secondary {
            background: #f59e0b;
        }
        .group-link.secondary:hover {
            background: #d97706;
        }
        .info-section {
            background: #ecfdf5;
            border-left: 4px solid #10b981;
            padding: 15px;
            margin: 20px 0;
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            border: 1px solid #e5e7eb;
            border-top: none;
        }
        .footer p {
            margin: 5px 0;
            font-size: 14px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎵 Welcome to God's Family Choir!</h1>
        <p>We're thrilled to have you join our ministry</p>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>,</p>

        <p>Welcome to God's Family Choir! We are delighted that you have chosen to join our ministry and become part of our musical family. Your registration has been successfully received.</p>

        <div class="member-id-box">
            <h2>Your Unique Member ID</h2>
            <div class="member-id">{{ $member->member_id }}</div>
            <p style="margin: 10px 0 0 0; font-size: 14px;">Keep this ID for all future correspondence</p>
        </div>

        <div class="info-section">
            <h3 style="margin-top: 0; color: #059669;">📋 What's Next?</h3>
            <ul style="margin: 10px 0;">
                <li>Our team will review your registration</li>
                <li>You'll receive a confirmation within 48 hours</li>
                <li>Join our WhatsApp groups to stay connected</li>
                <li>Attend rehearsals (schedule will be shared in the group)</li>
            </ul>
        </div>

        <div class="group-links">
            <h3 style="margin-top: 0; text-align: center; color: #1f2937;">Join Our WhatsApp Groups</h3>
            <p style="text-align: center; color: #6b7280; margin-bottom: 15px;">Stay connected and never miss an update!</p>

            <a href="{{ $mainGroupLink }}" class="group-link">
                📱 Join God's Family Main Group
            </a>

            <a href="{{ $choirGroupLink }}" class="group-link secondary">
                🎶 Join God's Family Choir Group
            </a>

            <a href="{{ $activeChoristersLink }}" class="group-link">
                🎤 Join Active Choristers Group
            </a>
        </div>

        <div class="info-section">
            <h3 style="margin-top: 0; color: #059669;">🎼 Your Registration Details</h3>
            <ul style="margin: 10px 0; list-style: none; padding: 0;">
                <li><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</li>
                <li><strong>Email:</strong> {{ $member->email }}</li>
                <li><strong>Phone:</strong> {{ $member->phone }}</li>
                @if($member->voice)
                <li><strong>Voice Type:</strong> {{ ucfirst($member->voice) }}</li>
                @endif
                <li><strong>Registration Date:</strong> {{ $member->created_at->format('F d, Y') }}</li>
            </ul>
        </div>

        <p>If you have any questions or need assistance, please don't hesitate to reach out to us. We're here to help you settle in and make the most of your time with God's Family Choir.</p>

        <p><strong>God bless you, and we look forward to making beautiful music together!</strong></p>

        <p style="margin-top: 30px;">
            Warm regards,<br>
            <strong>God's Family Choir Leadership Team</strong>
        </p>
    </div>

    <div class="footer">
        <p><strong>God's Family Choir</strong></p>
        <p>ASA UR Nyarugenge | Kigali, Rwanda</p>
        <p>📧 Email: info@godsfamilychoir.org | 📱 Phone: +250 XXX XXX XXX</p>
        <p style="margin-top: 15px; font-size: 12px;">
            This is an automated message. Please do not reply to this email.
        </p>
    </div>
</body>
</html>

