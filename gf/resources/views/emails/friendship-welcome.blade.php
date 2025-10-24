<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to God's Family</title>
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
        <h1>🙏 Welcome to God's Family!</h1>
        <p>Thank you for joining our community</p>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>,</p>

        <p>Thank you for registering as a friend of God's Family Choir! We are honored to have you as part of our extended family and community. Your support means the world to us.</p>

        <div class="member-id-box">
            <h2>Your Unique Friend ID</h2>
            <div class="member-id">{{ $member->member_id }}</div>
            <p style="margin: 10px 0 0 0; font-size: 14px;">Keep this ID for all future correspondence</p>
        </div>

        <div class="info-section">
            <h3 style="margin-top: 0; color: #059669;">🎵 What You Can Expect</h3>
            <ul style="margin: 10px 0;">
                <li>Stay updated with our latest news and events</li>
                <li>Receive invitations to our concerts and performances</li>
                <li>Connect with our community through WhatsApp</li>
                <li>Get early notifications about special programs</li>
                <li>Support our ministry through prayer and contribution</li>
            </ul>
        </div>

        <div class="group-links">
            <h3 style="margin-top: 0; text-align: center; color: #1f2937;">Join Our WhatsApp Group</h3>
            <p style="text-align: center; color: #6b7280; margin-bottom: 15px;">Stay connected and never miss an update!</p>

            <a href="{{ $mainGroupLink }}" class="group-link">
                💬 Join WhatsApp Group
            </a>

            <p style="text-align: center; color: #6b7280; font-size: 13px; margin-top: 12px;">Or click this link:</p>
            <p style="text-align: center; word-break: break-all; font-size: 12px; margin: 8px 0;">
                <a href="{{ $mainGroupLink }}" style="color: #059669;">{{ $mainGroupLink }}</a>
            </p>
        </div>

        <div class="info-section">
            <h3 style="margin-top: 0; color: #059669;">📋 Your Registration Details</h3>
            <ul style="margin: 10px 0; list-style: none; padding: 0;">
                <li><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</li>
                <li><strong>Email:</strong> {{ $member->email }}</li>
                <li><strong>Phone:</strong> {{ $member->phone }}</li>
                <li><strong>Registration Date:</strong> {{ $member->created_at->format('F d, Y') }}</li>
                <li><strong>Membership Type:</strong> Friendship</li>
            </ul>
        </div>

        <div class="info-section" style="background: #fef3c7; border-left-color: #f59e0b;">
            <h3 style="margin-top: 0; color: #d97706;">💝 Ways to Support Us</h3>
            <p>As a friend of God's Family Choir, you can support our ministry through:</p>
            <ul style="margin: 10px 0;">
                <li><strong>Prayer:</strong> Pray for our ministry and performances</li>
                <li><strong>Attendance:</strong> Come to our events and bring friends</li>
                <li><strong>Sharing:</strong> Spread the word about our concerts</li>
                <li><strong>Financial Support:</strong> Contribute to our ministry activities</li>
            </ul>
        </div>

        <p>If you have any questions or would like to get more involved, please don't hesitate to reach out. We're grateful for your friendship and support!</p>

        <p><strong>God bless you abundantly!</strong></p>

        <p style="margin-top: 30px;">
            Warm regards,<br>
            <strong>God's Family Choir Leadership Team</strong>
        </p>
    </div>

    <div class="footer">
        <p><strong>God's Family Choir</strong></p>
        <p>ASA UR Nyarugenge SDA Church | Kigali, Rwanda</p>
        <p>📧 Email: asa.godsfamilychoir2017@gmail.com</p>
        <p>📱 Phone: +250 783 871 782</p>
        <p style="margin-top: 15px; font-size: 12px;">
            This is an automated message. For inquiries, please contact us using the details above.
        </p>
    </div>
</body>
</html>

