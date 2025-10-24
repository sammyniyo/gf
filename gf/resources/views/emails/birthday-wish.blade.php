<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday!</title>
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
            background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 50%, #3b82f6 100%);
            color: white;
            padding: 50px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: "🎉🎂🎈";
            position: absolute;
            font-size: 60px;
            opacity: 0.1;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 36px;
            font-weight: 700;
            animation: bounce 2s ease infinite;
        }
        .header p {
            margin: 0;
            font-size: 18px;
            opacity: 0.95;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 20px;
            color: #1f2937;
            margin-bottom: 20px;
            text-align: center;
        }
        .birthday-card {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 3px solid #f59e0b;
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
            text-align: center;
        }
        .birthday-card h2 {
            color: #92400e;
            margin: 0 0 15px 0;
            font-size: 32px;
        }
        .cake-icon {
            font-size: 80px;
            margin: 20px 0;
            animation: pulse 1.5s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .message-box {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 5px solid #3b82f6;
            padding: 25px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .message-box p {
            margin: 10px 0;
            color: #1e3a8a;
            line-height: 1.8;
        }
        .blessing-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 2px dashed #10b981;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        .blessing-box h3 {
            color: #059669;
            margin: 0 0 15px 0;
        }
        .blessing-box p {
            color: #065f46;
            font-style: italic;
            font-size: 16px;
            line-height: 1.8;
        }
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%);
            color: white;
            text-decoration: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
        }
        .footer {
            background: #f9fafb;
            padding: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
        }
        .footer strong {
            color: #ec4899;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🎉 Happy Birthday! 🎉</h1>
            <p>Today is YOUR special day!</p>
        </div>

        <div class="content">
            <p class="greeting">Dear <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>,</p>

            <div class="birthday-card">
                <div class="cake-icon">🎂</div>
                <h2>Happy Birthday!</h2>
                <p style="color: #78350f; font-size: 18px; margin: 0;">May this special day bring you joy, blessings, and beautiful memories!</p>
            </div>

            <div class="message-box">
                <p>
                    On this wonderful day, the entire God's Family Choir family wants to celebrate YOU!
                    We are so blessed to have you as part of our ministry, and we thank God for your life,
                    your talents, and the joy you bring to our choir.
                </p>
                <p>
                    May this new year of your life be filled with:
                </p>
                <ul style="text-align: left; color: #1e3a8a; margin: 15px 0;">
                    <li>🎵 Beautiful melodies and harmonious moments</li>
                    <li>🙏 God's abundant blessings and favor</li>
                    <li>💖 Love, peace, and joy in every season</li>
                    <li>✨ New opportunities and spiritual growth</li>
                    <li>🌟 Success in all your endeavors</li>
                </ul>
            </div>

            <div class="blessing-box">
                <h3>Our Birthday Prayer for You</h3>
                <p>
                    "May the Lord bless you and keep you; may the Lord make His face shine on you and be gracious to you;
                    may the Lord turn His face toward you and give you peace." - Numbers 6:24-26
                </p>
            </div>

            <div class="cta-section">
                <p style="color: #374151; font-size: 16px; margin-bottom: 15px;">
                    We'd love to celebrate with you at our next rehearsal!
                </p>
                <a href="{{ config('app.url') }}" class="cta-button">Visit Our Website</a>
            </div>

            <p style="font-size: 16px; margin-top: 30px; color: #374151; text-align: center;">
                Once again, <strong style="color: #ec4899;">HAPPY BIRTHDAY!</strong> 🎉🎈🎂
            </p>

            <p style="margin-top: 30px; color: #6b7280; text-align: center;">
                With love and blessings,<br>
                <strong style="color: #ec4899;">God's Family Choir Family</strong>
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

