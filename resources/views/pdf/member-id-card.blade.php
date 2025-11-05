@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Simplified but still beautiful designs
    $cardDesigns = [
        'fresher' => [
            'bg' => '#ffffff',
            'accent' => '#10b981',
            'accent_light' => '#d1fae5',
            'text' => '#064e3b',
            'title_bg' => '#10b981',
            'title_text' => '#ffffff',
            'badge_text' => '✨ NEW',
        ],
        'member' => [
            'bg' => '#ffffff',
            'accent' => '#3b82f6',
            'accent_light' => '#dbeafe',
            'text' => '#1e3a8a',
            'title_bg' => '#3b82f6',
            'title_text' => '#ffffff',
            'badge_text' => '🌟 ACTIVE',
        ],
        'veteran' => [
            'bg' => '#ffffff',
            'accent' => '#8b5cf6',
            'accent_light' => '#ede9fe',
            'text' => '#5b21b6',
            'title_bg' => '#8b5cf6',
            'title_text' => '#ffffff',
            'badge_text' => '⚡ VETERAN',
        ],
        'elite' => [
            'bg' => '#fffdf6',
            'accent' => '#f59e0b',
            'accent_light' => '#fef3c7',
            'text' => '#78350f',
            'title_bg' => 'linear-gradient(45deg, #f59e0b, #fbbf24)',
            'title_text' => '#78350f',
            'badge_text' => '👑 ELITE',
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
            size: 3.375in 2.125in; /* Standard ID card size */
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            width: 3.375in;
            height: 2.125in;
            background: {{ $design['bg'] }};
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
            border: 2px solid {{ $design['accent'] }};
        }
        .card-header {
            height: 45px;
            background: {{ $design['accent'] }};
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            position: relative;
        }
        .logo {
            color: white;
        }
        .logo h1 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }
        .logo p {
            margin: 0;
            font-size: 8px;
            opacity: 0.9;
        }
        .years-badge {
            background: white;
            color: {{ $design['accent'] }};
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .years-badge .number {
            font-size: 12px;
            line-height: 1;
        }
        .card-body {
            padding: 12px 15px;
            display: flex;
            gap: 12px;
            height: calc(100% - 45px);
        }
        .avatar-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
        .avatar {
            width: 60px;
            height: 60px;
            background: {{ $design['accent'] }};
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border: 3px solid {{ $design['accent_light'] }};
        }
        .member-id {
            background: {{ $design['accent_light'] }};
            color: {{ $design['text'] }};
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 9px;
            font-weight: bold;
            text-align: center;
        }
        .info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .member-name {
            font-size: 16px;
            font-weight: bold;
            color: {{ $design['text'] }};
            margin: 0;
        }
        .membership-title {
            background: {{ $design['title_bg'] }};
            color: {{ $design['title_text'] }};
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px;
            margin-top: 4px;
        }
        .detail-item {
            display: flex;
            flex-direction: column;
        }
        .detail-label {
            font-size: 7px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
        }
        .detail-value {
            font-size: 9px;
            color: {{ $design['text'] }};
            font-weight: 600;
        }
        .status-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background: {{ $design['accent'] }};
            color: white;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
        }
        .accent-corner {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border-bottom: 40px solid {{ $design['accent_light'] }};
            border-left: 40px solid transparent;
        }
        .footer {
            position: absolute;
            bottom: 4px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 6px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="logo">
                <h1>GOD'S FAMILY CHOIR</h1>
                <p>ASA UR Nyarugenge SDA</p>
            </div>
            @if($years > 0)
            <div class="years-badge">
                <span class="number">{{ $years }}</span>
                <span>YRS</span>
            </div>
            @endif
        </div>
        
        <div class="card-body">
            <div class="avatar-section">
                <div class="avatar">
                    {{ strtoupper(substr($member->first_name, 0, 1)) }}{{ strtoupper(substr($member->last_name, 0, 1)) }}
                </div>
                <div class="member-id">
                    {{ $member->member_id }}
                </div>
            </div>
            
            <div class="info-section">
                <h2 class="member-name">{{ $member->first_name }} {{ $member->last_name }}</h2>
                
                <div class="membership-title">
                    {{ $title }}
                </div>
                
                <div class="details-grid">
                    <div class="detail-item">
                        <span class="detail-label">Type</span>
                        <span class="detail-value">{{ ucfirst($member->member_type) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Voice</span>
                        <span class="detail-value">{{ $member->voice ? ucfirst($member->voice) : 'All' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Joined</span>
                        <span class="detail-value">{{ $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('Y') : date('Y')) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Status</span>
                        <span class="detail-value" style="color: {{ $design['accent'] }}">Active</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="status-badge">
            {{ $design['badge_text'] }}
        </div>
        
        <div class="accent-corner"></div>
        
        <div class="footer">
            Official Member ID • Valid through {{ date('Y') + 1 }} • www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>