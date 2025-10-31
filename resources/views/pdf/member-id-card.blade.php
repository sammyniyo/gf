<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Member ID Card</title>
    <style>
        @page {
            margin: 0;
        }
        body {
            margin: 0;
            padding: 10px;
            font-family: 'DejaVu Sans', sans-serif;
            background: #065f46; /* darker solid background for better print contrast */
            color: #ffffff;
        }
        .card {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .logo {
            text-align: center;
            margin-bottom: 5px;
        }
        .logo h1 {
            margin: 0;
            font-size: 16px;
            color: #ffffff;
            font-weight: bold;
        }
        .logo p {
            margin: 0;
            font-size: 8px;
            color: #c7f9e8; /* brighter mint */
        }
        .member-id {
            background: #f59e0b;
            color: #3f1d0b;
            text-align: center;
            padding: 5px;
            margin: 10px 0;
            font-weight: bold;
            font-size: 14px;
            border-radius: 3px;
        }
        .info {
            margin: 5px 0;
            font-size: 10px;
        }
        .info strong {
            color: #fff7ae; /* stronger label color */
        }
        .footer {
            position: absolute;
            bottom: 5px;
            left: 10px;
            right: 10px;
            text-align: center;
            font-size: 7px;
            color: #e6fff7;
            border-top: 1px solid #34d399;
            padding-top: 3px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <h1>GOD'S FAMILY CHOIR</h1>
            <p>ASA UR Nyarugenge SDA</p>
        </div>

        <div class="member-id">
            {{ $member->member_id }}
        </div>

        <div class="info">
            <strong>Name:</strong> {{ $member->first_name }} {{ $member->last_name }}
        </div>

        <div class="info">
            <strong>Type:</strong> {{ ucfirst($member->member_type) }}
        </div>

        @if($member->voice)
        <div class="info">
            <strong>Voice:</strong> {{ ucfirst($member->voice) }}
        </div>
        @endif

        <div class="info">
            <strong>Member Since:</strong> {{ $member->joined_at ? $member->joined_at->format('Y') : date('Y') }}
        </div>

        <div class="footer">
            Valid Member | Keep this card safe | www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>

