@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Custom card designs for each membership category
    $cardDesigns = [
        'fresher' => [
            'bg' => '#10b981', // Fresh Green
            'accent' => '#34d399',
            'text' => '#ffffff',
            'border' => '#059669',
            'title_bg' => '#ffffff',
            'title_text' => '#10b981',
            'badge_text' => 'NEW',
        ],
        'member' => [
            'bg' => '#3b82f6', // Professional Blue
            'accent' => '#60a5fa',
            'text' => '#ffffff',
            'border' => '#2563eb',
            'title_bg' => '#ffffff',
            'title_text' => '#3b82f6',
            'badge_text' => 'ACTIVE',
        ],
        'veteran' => [
            'bg' => '#8b5cf6', // Distinguished Purple
            'accent' => '#a78bfa',
            'text' => '#ffffff',
            'border' => '#7c3aed',
            'title_bg' => '#ffffff',
            'title_text' => '#8b5cf6',
            'badge_text' => 'VETERAN',
        ],
        'elite' => [
            'bg' => '#d97706', // Gold/Amber
            'accent' => '#fbbf24',
            'text' => '#ffffff',
            'border' => '#b45309',
            'title_bg' => '#fbbf24',
            'title_text' => '#78350f',
            'badge_text' => '⭐ ELITE',
        ],
    ];
    
    $design = $cardDesigns[$category] ?? $cardDesigns['member'];
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
            background: {{ $design['bg'] }};
            color: {{ $design['text'] }};
        }
        .card {
            width: 100%;
            height: 100%;
            position: relative;
            border: 2px solid {{ $design['border'] }};
            border-radius: 4px;
            @if($category === 'elite')
            background: linear-gradient(135deg, {{ $design['bg'] }} 0%, {{ $design['accent'] }} 100%);
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            @endif
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
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .logo p {
            margin: 0;
            font-size: 8px;
            color: {{ $design['accent'] }};
        }
        .membership-title {
            background: {{ $design['title_bg'] }};
            color: {{ $design['title_text'] }};
            text-align: center;
            padding: 5px 8px;
            margin: 5px 0 8px 0;
            font-weight: bold;
            font-size: @if($category === 'elite') 13px @else 12px @endif;
            border-radius: 3px;
            display: inline-block;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            @if($category === 'elite')
            border: 1px solid {{ $design['accent'] }};
            @endif
        }
        .member-id {
            @if($category === 'elite')
            background: linear-gradient(135deg, {{ $design['accent'] }} 0%, #fbbf24 100%);
            color: #78350f;
            @else
            background: {{ $design['accent'] }};
            color: {{ $design['bg'] }};
            @endif
            text-align: center;
            padding: 6px;
            margin: 10px 0;
            font-weight: bold;
            font-size: 15px;
            border-radius: 3px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .info {
            margin: 5px 0;
            font-size: 10px;
        }
        .info strong {
            color: {{ $design['accent'] }};
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            background: {{ $design['title_bg'] }};
            color: {{ $design['title_text'] }};
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
            margin-left: 5px;
        }
        .footer {
            position: absolute;
            bottom: 5px;
            left: 10px;
            right: 10px;
            text-align: center;
            font-size: 7px;
            color: {{ $design['accent'] }};
            border-top: 1px solid {{ $design['border'] }};
            padding-top: 3px;
        }
        @if($category === 'elite')
        .elite-star {
            display: inline;
            font-size: 12px;
            margin-left: 3px;
        }
        @endif
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <h1>GOD'S FAMILY CHOIR</h1>
            <p>ASA UR Nyarugenge SDA</p>
        </div>

        <div class="membership-title">
            {{ $title }}
            @if($category === 'elite')
                <span class="elite-star">⭐</span>
            @endif
        </div>

        <div class="member-id">
            {{ $member->member_id }}
            @if($years > 0)
                <span class="badge">{{ $years }} {{ $years == 1 ? 'Yr' : 'Yrs' }}</span>
            @endif
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

