<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to God's Family Choir</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #22c55e;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #22c55e;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            font-size: 16px;
        }
        .content {
            margin-bottom: 30px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2d3748;
        }
        .message {
            margin-bottom: 20px;
            text-align: justify;
        }
        .details {
            background-color: #f7fafc;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #22c55e;
        }
        .details h3 {
            color: #22c55e;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: bold;
            color: #4a5568;
        }
        .detail-value {
            color: #2d3748;
        }
        .next-steps {
            background-color: #e6fffa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #38b2ac;
        }
        .next-steps h3 {
            color: #38b2ac;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .next-steps ul {
            margin: 0;
            padding-left: 20px;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            color: #666;
            font-size: 14px;
        }
        .contact-info {
            margin: 15px 0;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #22c55e;
            text-decoration: none;
        }
        .highlight {
            background-color: #fef5e7;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #f6ad55;
            margin: 20px 0;
        }
        .cta-button {
            display: inline-block;
            background-color: #22c55e;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }
        @media (max-width: 600px) {
            .container {
                margin: 10px;
                padding: 20px;
            }
            .detail-row {
                flex-direction: column;
            }
            .detail-label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">God's Family Choir</div>
            <div class="subtitle">Sharing the love of Christ through sacred music since 1998</div>
        </div>

        <div class="content">
            <div class="greeting">Dear {{ $fullName }},</div>

            <div class="message">
                <p>Welcome to God's Family Choir! We are thrilled to receive your membership application and excited about the possibility of having you join our musical family.</p>

                <p>Your application has been successfully submitted and is currently under review. Our team will carefully review your information and get back to you within 3-5 business days.</p>
            </div>

            <div class="details">
                <h3>Application Summary</h3>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $fullName }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $member->email }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone:</span>
                    <span class="detail-value">{{ $member->phone }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Voice Type:</span>
                    <span class="detail-value">{{ ucfirst($member->voice_type) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Musical Experience:</span>
                    <span class="detail-value">{{ ucfirst($member->musical_experience) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Application Date:</span>
                    <span class="detail-value">{{ $member->created_at->format('F j, Y') }}</span>
                </div>
            </div>

            <div class="highlight">
                <strong>What happens next?</strong><br>
                Our choir director and leadership team will review your application. If your application is approved, we'll contact you to schedule an audition and discuss the next steps in joining our choir.
            </div>

            <div class="next-steps">
                <h3>Next Steps</h3>
                <ul>
                    <li><strong>Review Process:</strong> We'll review your application within 3-5 business days</li>
                    <li><strong>Audition:</strong> If approved, we'll schedule a brief audition to assess your vocal range and musical abilities</li>
                    <li><strong>Orientation:</strong> New members attend an orientation session to learn about our choir's mission and expectations</li>
                    <li><strong>First Rehearsal:</strong> Once everything is complete, you'll join us for your first rehearsal!</li>
                </ul>
            </div>

            <div class="message">
                <p>In the meantime, feel free to explore our website and learn more about our choir's mission, upcoming events, and the beautiful music we create together.</p>

                <p>Thank you for your interest in joining God's Family Choir. We look forward to the possibility of making beautiful music together and sharing God's love through our voices.</p>
            </div>

            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="cta-button">Visit Our Website</a>
            </div>
        </div>

        <div class="footer">
            <div class="contact-info">
                <h4>Get in Touch</h4>
                <p><strong>Email:</strong> asa.godsfamilychoir2017@gmail.com</p>
                <p><strong>Phone:</strong> +250 783 871 782</p>
                <p><strong>Address:</strong> ASA UR Nyarugenge SDA Kigali, Rwanda</p>
            </div>

            <div class="social-links">
                <strong>Follow our journey:</strong><br>
                <a href="#">Facebook</a> |
                <a href="#">Instagram</a> |
                <a href="#">YouTube</a> |
                <a href="#">Spotify</a> |
                <a href="#">TikTok</a>
            </div>

            <p>Blessings,<br>
            <strong>The God's Family Choir Team</strong></p>

            <p style="font-size: 12px; color: #999; margin-top: 20px;">
                This email was sent to {{ $member->email }} because you submitted a membership application to God's Family Choir.
            </p>
        </div>
    </div>
</body>
</html>
