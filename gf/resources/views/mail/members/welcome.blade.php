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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            padding: 50px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }
        .header p {
            margin: 15px 0 0;
            font-size: 18px;
            opacity: 0.95;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 20px;
            color: #333;
            margin-bottom: 25px;
        }
        .welcome-box {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
        }
        .welcome-box h2 {
            margin: 0 0 10px 0;
            font-size: 28px;
            color: #065f46;
        }
        .welcome-box p {
            margin: 0;
            font-size: 16px;
            color: #047857;
        }
        .info-section {
            background: #f8f9fa;
            border-left: 4px solid #10b981;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .info-section h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
            color: #047857;
        }
        .info-section ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        .info-section li {
            margin: 8px 0;
            font-size: 15px;
        }
        .whatsapp-button {
            display: inline-block;
            background: #25D366;
            color: #ffffff !important;
            text-decoration: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 18px;
            margin: 25px 0;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }
        .whatsapp-button:hover {
            background: #20BA5A;
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            transform: translateY(-2px);
        }
        .highlight-box {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .highlight-box h3 {
            margin: 0 0 10px 0;
            color: #92400e;
            font-size: 18px;
        }
        .highlight-box p {
            margin: 5px 0;
            color: #78350f;
            font-size: 15px;
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
            color: #10b981;
            text-decoration: none;
        }
        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #10b981, transparent);
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Welcome to Our Family!</h1>
            <p>God's Family Choir</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Dear <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>,</p>

            <div class="welcome-box">
                <h2>✨ Congratulations! ✨</h2>
                <p>Your application has been approved!</p>
            </div>

            <p style="font-size: 16px; color: #555;">
                We are thrilled to officially welcome you to <strong>God's Family Choir</strong>!
                You are now part of a vibrant community dedicated to worshiping God through music
                and fellowship.
            </p>

            <div class="divider"></div>

            <!-- Next Steps -->
            <div class="info-section">
                <h3>📋 Next Steps</h3>
                <ul>
                    <li><strong>Join our WhatsApp Group</strong> - Stay connected with announcements, rehearsal schedules, and updates</li>
                    <li><strong>Attend Orientation</strong> - We'll guide you through choir expectations and procedures</li>
                    <li><strong>Get Your Choir Materials</strong> - Pick up your songbook and choir attire information</li>
                    <li><strong>Mark Your Calendar</strong> - Regular rehearsals every [Day & Time]</li>
                </ul>
            </div>

            <!-- WhatsApp Group -->
            <div style="text-align: center; margin: 35px 0;">
                <p style="font-size: 16px; color: #555; margin-bottom: 15px;">
                    <strong>Join our WhatsApp community now!</strong>
                </p>
                <a href="{{ $whatsappGroupLink }}" class="whatsapp-button">
                    💬 Join WhatsApp Group
                </a>
                <p style="font-size: 13px; color: #999; margin-top: 10px;">
                    Click the button above or use this link:<br>
                    <a href="{{ $whatsappGroupLink }}" style="color: #10b981;">{{ $whatsappGroupLink }}</a>
                </p>
            </div>

            <!-- Member Info -->
            <div class="highlight-box">
                <h3>👤 Your Member Profile</h3>
                <p><strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}</p>
                <p><strong>Email:</strong> {{ $member->email }}</p>
                <p><strong>Voice Type:</strong> {{ ucfirst($member->voice_type) }}</p>
                <p><strong>Member ID:</strong> #{{ $member->id }}</p>
            </div>

            <!-- What to Expect -->
            <div class="info-section">
                <h3>🎵 What to Expect</h3>
                <ul>
                    <li><strong>Rehearsals:</strong> Regular practice sessions to perfect our harmonies</li>
                    <li><strong>Performances:</strong> Church services, community events, and special concerts</li>
                    <li><strong>Fellowship:</strong> Building lasting friendships with fellow choir members</li>
                    <li><strong>Growth:</strong> Developing your musical talents and spiritual walk</li>
                </ul>
            </div>

            <div class="divider"></div>

            <!-- Contact Info -->
            <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; border-left: 4px solid #2196F3;">
                <p style="margin: 5px 0; font-size: 15px; color: #1976D2;">
                    <strong>📞 Need Help?</strong><br>
                    Contact our Choir Coordinator:<br>
                    📧 Email: <a href="mailto:asa.godsfamilychoir2017@gmail.com" style="color: #1976D2;">asa.godsfamilychoir2017@gmail.com</a><br>
                    📱 Phone: <a href="tel:+250783871782" style="color: #1976D2;">+250 783 871 782</a>
                </p>
            </div>

            <p style="margin-top: 30px; font-size: 16px; color: #555; text-align: center;">
                <em>"Sing to the LORD a new song; sing to the LORD, all the earth."</em><br>
                <strong>- Psalm 96:1</strong>
            </p>

            <p style="margin-top: 25px; font-size: 15px; color: #666;">
                We look forward to singing with you and making beautiful music together for the glory of God!
            </p>

            <p style="margin-top: 20px; font-size: 16px;">
                Blessings,<br>
                <strong>God's Family Choir Leadership Team</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>God's Family Choir</strong></p>
            <p>ASA UR Nyarugenge SDA | Kigali, Rwanda</p>
            <p>
                📧 <a href="mailto:asa.godsfamilychoir2017@gmail.com">asa.godsfamilychoir2017@gmail.com</a><br>
                📱 <a href="tel:+250783871782">+250 783 871 782</a>
            </p>
            <p style="margin-top: 15px; color: #999; font-size: 12px;">
                You're receiving this email because you registered to join God's Family Choir.
            </p>
        </div>
    </div>
</body>
</html>
