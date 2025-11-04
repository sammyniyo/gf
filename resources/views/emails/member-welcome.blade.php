<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to God's Family Choir</title>
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
            font-size: 32px;
            font-weight: 700;
        }
        .header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.95;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 20px;
        }

        /* WhatsApp Button */
        .whatsapp-section {
            text-align: center;
            margin: 30px 0;
            padding: 30px 20px;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-radius: 12px;
        }
        .whatsapp-button {
            display: inline-block;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            text-decoration: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
        }
        .whatsapp-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.5);
        }
        .whatsapp-button::before {
            content: "💬 ";
            font-size: 20px;
        }
        .link-instruction {
            color: #6b7280;
            font-size: 14px;
            margin-top: 15px;
        }
        .whatsapp-link {
            color: #059669;
            word-break: break-all;
            font-size: 13px;
            margin-top: 10px;
            display: block;
        }

        /* Member Profile Card */
        .profile-card {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 3px solid #f59e0b;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }
        .profile-card h2 {
            margin: 0 0 20px 0;
            color: #92400e;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .profile-card h2::before {
            content: "👤";
            font-size: 24px;
        }
        .profile-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(245, 158, 11, 0.3);
        }
        .profile-row:last-child {
            border-bottom: none;
        }
        .profile-label {
            font-weight: 600;
            color: #92400e;
        }
        .profile-value {
            color: #78350f;
            font-weight: 500;
        }
        .member-id-highlight {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #b45309;
        }

        /* What to Expect Section */
        .expect-section {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 5px solid #3b82f6;
            padding: 25px;
            margin: 30px 0;
            border-radius: 8px;
        }
        .expect-section h3 {
            margin: 0 0 15px 0;
            color: #1e40af;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .expect-section h3::before {
            content: "🎵";
            font-size: 24px;
        }
        .expect-section ul {
            margin: 0;
            padding-left: 20px;
        }
        .expect-section li {
            margin: 10px 0;
            color: #1e3a8a;
            font-weight: 500;
        }
        .expect-section li strong {
            color: #1e40af;
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }
        .contact-section h3 {
            margin: 0 0 15px 0;
            color: #1e40af;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .contact-section h3::before {
            content: "📞";
            font-size: 22px;
        }
        .contact-section p {
            margin: 5px 0;
            color: #1e3a8a;
        }
        .contact-email {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .footer {
            background: #f9fafb;
            padding: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
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
            <h1>Welcome to God's Family Choir!</h1>
            <p>🎵 Registration Successful - You're Now Part of the Family</p>
        </div>

        <div class="content">
            <p class="greeting">Dear <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>,</p>

            <p style="font-size: 16px; line-height: 1.8; color: #374151;">
                Congratulations! Your registration has been successfully received. We are absolutely delighted to welcome you to God's Family Choir family. This is the beginning of an amazing journey of worship, fellowship, and spiritual growth through music.
            </p>

            <!-- WhatsApp Group Section -->
            <div class="whatsapp-section">
                <h2 style="color: #059669; margin: 0 0 10px 0; font-size: 22px;">Join Our WhatsApp Groups</h2>
                <p style="color: #6b7280; font-size: 14px; margin-bottom: 20px;">Stay connected with the choir family through our two WhatsApp communities:</p>

                <!-- Main Group -->
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #374151; font-size: 16px; margin: 0 0 5px 0;">📱 Main Group</h3>
                    <p style="color: #6b7280; font-size: 13px; margin: 0 0 10px 0;">For all God's Family members, friends, and supporters</p>
                    <a href="{{ $mainGroupLink }}" class="whatsapp-button" style="display: inline-block; margin-bottom: 8px;">Join Main Group</a>
                    <p class="link-instruction" style="margin: 8px 0 0 0;">Or use this link:</p>
                    <a href="{{ $mainGroupLink }}" class="whatsapp-link">{{ $mainGroupLink }}</a>
                </div>

                <!-- Divider -->
                <div style="height: 1px; background: linear-gradient(to right, transparent, #10b981, transparent); margin: 25px 0;"></div>

                <!-- Active Members Group -->
                <div>
                    <h3 style="color: #374151; font-size: 16px; margin: 0 0 5px 0;">🎤 Active Members Group</h3>
                    <p style="color: #6b7280; font-size: 13px; margin: 0 0 10px 0;">For registered choir members who attend rehearsals</p>
                    <a href="{{ $activeChoristersLink }}" class="whatsapp-button" style="display: inline-block; margin-bottom: 8px;">Join Active Members</a>
                    <p class="link-instruction" style="margin: 8px 0 0 0;">Or use this link:</p>
                    <a href="{{ $activeChoristersLink }}" class="whatsapp-link">{{ $activeChoristersLink }}</a>
                </div>
            </div>

            <!-- Member Profile Card -->
            <div class="profile-card">
                <h2>Your Member Profile</h2>
                <div class="profile-row">
                    <span class="profile-label">Name:</span>
                    <span class="profile-value">{{ $member->first_name }} {{ $member->last_name }}</span>
                </div>
                <div class="profile-row">
                    <span class="profile-label">Email:</span>
                    <span class="profile-value">{{ $member->email }}</span>
                </div>
                @if($member->voice)
                <div class="profile-row">
                    <span class="profile-label">Voice Type:</span>
                    <span class="profile-value">{{ ucfirst($member->voice) }}</span>
                </div>
                @endif
                <div class="profile-row">
                    <span class="profile-label">Member ID:</span>
                    <span class="member-id-highlight">#{{ $member->member_id }}</span>
                </div>
            </div>

            <!-- What to Expect -->
            <div class="expect-section">
                <h3>What to Expect</h3>
                <ul>
                    <li><strong>Rehearsals:</strong> Regular practice sessions to perfect our harmonies</li>
                    <li><strong>Performances:</strong> Church services, community events, and special concerts</li>
                    <li><strong>Fellowship:</strong> Building lasting friendships with fellow choir members</li>
                    <li><strong>Growth:</strong> Developing your musical talents and spiritual walk</li>
                </ul>
            </div>

            <!-- Rehearsal Schedule -->
            <div style="background: #fef3c7; border-left: 5px solid #f59e0b; padding: 20px; margin: 25px 0; border-radius: 8px;">
                <h3 style="margin: 0 0 12px 0; color: #92400e; font-size: 18px;">📅 Rehearsal Schedule</h3>
                <p style="margin: 5px 0; color: #78350f; font-weight: 600;">Every Monday and Thursday</p>
                <p style="margin: 5px 0; color: #78350f;">Time: 05:30 PM - 08:00 PM</p>
                <p style="margin: 5px 0; color: #78350f;">📍 Location: Nyamirambo SDA</p>
                <p style="margin: 10px 0 5px 0; color: #78350f; font-weight: 600;">Sunday</p>
                <p style="margin: 5px 0; color: #78350f;">Time: 01:00 PM - 05:00 PM</p>
                <p style="margin: 5px 0; color: #78350f;">📍 Location: Nyamirambo SDA</p>
            </div>

            <!-- Contact Section -->
            <div class="contact-section">
                <h3>Need Help?</h3>
                <p style="margin-bottom: 10px; font-weight: 600;">Contact our Choir Coordinator:</p>
                <p>📧 Email: <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="contact-email">asa.godsfamilychoir2017@gmail.com</a></p>
                <p>📱 Phone: <strong>+250 783 871 782</strong></p>
            </div>

            <p style="font-size: 16px; margin-top: 30px; color: #374151;">
                We can't wait to hear your voice joining ours in praise and worship. See you at rehearsal!
            </p>

            <p style="margin-top: 25px; font-size: 16px; font-weight: 600; color: #059669;">
                🙏 God bless you, and welcome to the family!
            </p>

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
                This is an automated message. For inquiries, please contact us using the details above.
            </p>
        </div>
    </div>
</body>
</html>

