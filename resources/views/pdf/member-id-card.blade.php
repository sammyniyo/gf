@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    
    // Color schemes based on membership category
    $colors = [
        'fresh' => [
            'bg' => '#10b981', // Green - Fresh
            'accent' => '#34d399',
            'text' => '#ffffff',
            'border' => '#059669',
        ],
        'member' => [
            'bg' => '#3b82f6', // Blue - Member
            'accent' => '#60a5fa',
            'text' => '#ffffff',
            'border' => '#2563eb',
        ],
        'veteran' => [
            'bg' => '#8b5cf6', // Purple - Veteran
            'accent' => '#a78bfa',
            'text' => '#ffffff',
            'border' => '#7c3aed',
        ],
        'elite' => [
            'bg' => '#f59e0b', // Amber/Gold - Elite
            'accent' => '#fbbf24',
            'text' => '#ffffff',
            'border' => '#d97706',
        ],
    ];
    
    $scheme = $colors[$category] ?? $colors['member'];
@endphp
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
            background: {{ $scheme['bg'] }};
            color: {{ $scheme['text'] }};
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
            color: {{ $scheme['accent'] }};
        }
        .membership-title {
            background: {{ $scheme['accent'] }};
            color: {{ $scheme['bg'] }};
            text-align: center;
            padding: 3px 8px;
            margin: 5px 0 8px 0;
            font-weight: bold;
            font-size: 11px;
            border-radius: 3px;
            display: inline-block;
            width: 100%;
        }
        .member-id {
            background: {{ $scheme['accent'] }};
            color: {{ $scheme['bg'] }};
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
            color: {{ $scheme['accent'] }};
        }
        .footer {
            position: absolute;
            bottom: 5px;
            left: 10px;
            right: 10px;
            text-align: center;
            font-size: 7px;
            color: {{ $scheme['accent'] }};
            border-top: 1px solid {{ $scheme['border'] }};
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

        <div class="membership-title">
            {{ $title }} MEMBER
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
            <strong>Joined:</strong> {{ $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('Y') : date('Y')) }}
        </div>
        @if($member->membership_years > 0)
        <div class="info">
            <strong>Years:</strong> {{ $member->membership_years }} {{ $member->membership_years == 1 ? 'year' : 'years' }}
        </div>
        @endif

        <div class="footer">
            Valid Member | Keep this card safe | www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>

