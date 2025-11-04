@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Professional card designs with white background and colored accents
    $cardDesigns = [
        'fresher' => [
            'bg' => '#ffffff',
            'accent' => '#10b981', // Green accent
            'text' => '#111827',
            'border' => '#10b981',
            'border_width' => '3px',
            'title_bg' => '#10b981',
            'title_text' => '#ffffff',
            'id_bg' => '#ecfdf5',
            'id_text' => '#065f46',
            'badge_text' => 'NEW',
        ],
        'member' => [
            'bg' => '#ffffff',
            'accent' => '#3b82f6', // Blue accent
            'text' => '#111827',
            'border' => '#3b82f6',
            'border_width' => '3px',
            'title_bg' => '#3b82f6',
            'title_text' => '#ffffff',
            'id_bg' => '#eff6ff',
            'id_text' => '#1e40af',
            'badge_text' => 'ACTIVE',
        ],
        'veteran' => [
            'bg' => '#ffffff',
            'accent' => '#8b5cf6', // Purple accent
            'text' => '#111827',
            'border' => '#8b5cf6',
            'border_width' => '3px',
            'title_bg' => '#8b5cf6',
            'title_text' => '#ffffff',
            'id_bg' => '#f5f3ff',
            'id_text' => '#6b21a8',
            'badge_text' => 'VETERAN',
        ],
        'elite' => [
            'bg' => '#ffffff',
            'accent' => '#f59e0b', // Gold accent
            'text' => '#111827',
            'border' => '#f59e0b',
            'border_width' => '4px',
            'title_bg' => 'linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%)',
            'title_text' => '#78350f',
            'id_bg' => 'linear-gradient(135deg, #fef3c7 0%, #fde68a 100%)',
            'id_text' => '#78350f',
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
            background: #f3f4f6;
            color: {{ $design['text'] }};
        }
        .card {
            width: 100%;
            height: 100%;
            position: relative;
            background: {{ $design['bg'] }};
            border: {{ $design['border_width'] }} solid {{ $design['border'] }};
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .top-accent {
            height: 8px;
            background: {{ $design['accent'] }};
            width: 100%;
            border-radius: 6px 6px 0 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 5px;
            padding-top: 5px;
        }
        .logo h1 {
            margin: 0;
            font-size: 16px;
            color: {{ $design['accent'] }};
            font-weight: bold;
        }
        .logo p {
            margin: 0;
            font-size: 8px;
            color: #6b7280;
        }
        .membership-title {
            background: {{ $design['title_bg'] }};
            color: {{ $design['title_text'] }};
            text-align: center;
            padding: 6px 8px;
            margin: 5px 0 8px 0;
            font-weight: bold;
            font-size: @if($category === 'elite') 13px @else 11px @endif;
            border-radius: 4px;
            display: inline-block;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .member-id {
            background: {{ $design['id_bg'] }};
            color: {{ $design['id_text'] }};
            text-align: center;
            padding: 8px;
            margin: 10px 0;
            font-weight: bold;
            font-size: 16px;
            border-radius: 4px;
            border: 2px solid {{ $design['accent'] }};
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .info {
            margin: 5px 0;
            font-size: 10px;
            color: #374151;
        }
        .info strong {
            color: {{ $design['accent'] }};
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            background: {{ $design['accent'] }};
            color: #ffffff;
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
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 3px;
        }
        .accent-line {
            height: 2px;
            background: {{ $design['accent'] }};
            width: 60%;
            margin: 5px auto;
            border-radius: 2px;
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
        <div class="top-accent"></div>
        <div class="logo">
            <h1>GOD'S FAMILY CHOIR</h1>
            <p>ASA UR Nyarugenge SDA</p>
        </div>
        <div class="accent-line"></div>

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

