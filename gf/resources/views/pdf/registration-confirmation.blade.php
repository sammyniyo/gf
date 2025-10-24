<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 4px solid #10b981;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            padding: 30px 20px 20px 20px;
            border-radius: 8px;
        }
        .header h1 {
            color: #059669;
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            color: #6b7280;
            margin: 5px 0;
        }
        .member-id-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 3px solid #f59e0b;
            color: #78350f;
            padding: 25px;
            text-align: center;
            border-radius: 12px;
            margin: 25px 0;
        }
        .member-id-box h2 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #92400e;
            font-weight: bold;
        }
        .member-id {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 3px;
            color: #b45309;
        }
        .info-section {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .info-section h3 {
            color: #059669;
            margin-top: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .info-row {
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-label {
            font-weight: bold;
            width: 40%;
            color: #4b5563;
        }
        .info-value {
            width: 60%;
        }
        .next-steps {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 5px solid #3b82f6;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
        }
        .next-steps h3 {
            color: #1e40af;
            margin-top: 0;
            font-weight: bold;
        }
        .next-steps ol {
            margin: 10px 0;
            padding-left: 20px;
        }
        .next-steps li {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎵 Registration Confirmation</h1>
        <p>God's Family Choir - ASA UR Nyarugenge SDA</p>
        <p>{{ date('F d, Y') }}</p>
    </div>

    <div class="member-id-box">
        <h2>Your Member ID</h2>
        <div class="member-id">{{ $member->member_id }}</div>
    </div>

    <div class="info-section">
        <h3>Personal Information</h3>
        <div class="info-row">
            <div class="info-label">Full Name:</div>
            <div class="info-value">{{ $member->first_name }} {{ $member->last_name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Email:</div>
            <div class="info-value">{{ $member->email }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Phone:</div>
            <div class="info-value">{{ $member->phone }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Member Type:</div>
            <div class="info-value">{{ ucfirst($member->member_type) }}</div>
        </div>
        @if($member->voice)
        <div class="info-row">
            <div class="info-label">Voice Type:</div>
            <div class="info-value">{{ ucfirst($member->voice) }}</div>
        </div>
        @endif
        <div class="info-row">
            <div class="info-label">Registration Date:</div>
            <div class="info-value">{{ $member->created_at->format('F d, Y') }}</div>
        </div>
    </div>

    @if($member->member_type === 'member')
    <div class="next-steps">
        <h3>📋 Next Steps</h3>
        <ol>
            <li>Check your email for WhatsApp group invite links</li>
            <li>Join our two WhatsApp groups:
                <ul>
                    <li>Main Group - for all members and supporters</li>
                    <li>Active Members Group - for registered choir members</li>
                </ul>
            </li>
            <li>Wait for confirmation from our team (within 48 hours)</li>
            <li>Attend rehearsals every Monday and Thursday, 5:30-8:00 PM</li>
            <li>Location: ASA UR Nyarugenge SDA Church</li>
        </ol>
    </div>
    @else
    <div class="next-steps">
        <h3>📋 Next Steps</h3>
        <ol>
            <li>Check your email for WhatsApp group invite link</li>
            <li>Join God's Family Main Group to stay connected</li>
            <li>Receive updates about events and programs</li>
            <li>Support our ministry through prayer and contribution</li>
            <li>Attend our concerts and special events</li>
        </ol>
    </div>
    @endif

    <div class="footer">
        <p><strong>God's Family Choir</strong></p>
        <p>ASA UR Nyarugenge | Kigali, Rwanda</p>
        <p>Email: asa.godsfamilychoir2017@gmail.com | Phone: +250 783 871 782</p>
        <p style="margin-top: 10px;">
            This is an official registration confirmation. Keep this document for your records.
        </p>
    </div>
</body>
</html>

