@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Premium card designs with gradients and modern styling
    $cardDesigns = [
        'fresher' => [
            'bg' => 'linear-gradient(135deg, #ffffff 0%, #f0fdf4 50%, #dcfce7 100%)',
            'accent' => 'linear-gradient(135deg, #10b981 0%, #34d399 100%)',
            'text' => '#064e3b',
            'border' => 'linear-gradient(135deg, #10b981 0%, #34d399 100%)',
            'title_bg' => 'linear-gradient(135deg, #10b981 0%, #34d399 100%)',
            'title_text' => '#ffffff',
            'id_bg' => 'linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%)',
            'id_text' => '#065f46',
            'badge_text' => '✨ NEW MEMBER',
            'glow' => '0 0 20px rgba(16, 185, 129, 0.3)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%2310b981\' fill-opacity=\'0.05\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")'
        ],
        'member' => [
            'bg' => 'linear-gradient(135deg, #ffffff 0%, #f0f9ff 50%, #e0f2fe 100%)',
            'accent' => 'linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%)',
            'text' => '#1e3a8a',
            'border' => 'linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%)',
            'title_bg' => 'linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%)',
            'title_text' => '#ffffff',
            'id_bg' => 'linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%)',
            'id_text' => '#1e40af',
            'badge_text' => '🌟 ACTIVE',
            'glow' => '0 0 20px rgba(59, 130, 246, 0.3)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%233b82f6\' fill-opacity=\'0.05\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")'
        ],
        'veteran' => [
            'bg' => 'linear-gradient(135deg, #ffffff 0%, #faf5ff 50%, #f3e8ff 100%)',
            'accent' => 'linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%)',
            'text' => '#5b21b6',
            'border' => 'linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%)',
            'title_bg' => 'linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%)',
            'title_text' => '#ffffff',
            'id_bg' => 'linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%)',
            'id_text' => '#6b21a8',
            'badge_text' => '⚡ VETERAN',
            'glow' => '0 0 20px rgba(139, 92, 246, 0.3)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%238b5cf6\' fill-opacity=\'0.05\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")'
        ],
        'elite' => [
            'bg' => 'linear-gradient(135deg, #ffffff 0%, #fffbeb 50%, #fef3c7 100%)',
            'accent' => 'linear-gradient(135deg, #f59e0b 0%, #fbbf24 30%, #fcd34d 100%)',
            'text' => '#78350f',
            'border' => 'linear-gradient(135deg, #f59e0b 0%, #fbbf24 50%, #fcd34d 100%)',
            'title_bg' => 'linear-gradient(135deg, #f59e0b 0%, #fbbf24 50%, #fcd34d 100%)',
            'title_text' => '#78350f',
            'id_bg' => 'linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #fcd34d 100%)',
            'id_text' => '#78350f',
            'badge_text' => '👑 ELITE MEMBER',
            'glow' => '0 0 25px rgba(245, 158, 11, 0.4)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23f59e0b\' fill-opacity=\'0.08\'%3E%3Cpath d=\'M30 20l4 8 9 1-7 7 2 9-8-5-8 5 2-9-7-7 9-1z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")'
        ],
    ];
    
    $design = $cardDesigns[$category] ?? $cardDesigns['member'];
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Premium Member ID Card</title>
    <style>
        @page {
            margin: 0;
        }
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            margin: 0;
            padding: 15px;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card-container {
            perspective: 1000px;
            width: 350px;
            height: 500px;
        }
        
        .card {
            width: 100%;
            height: 100%;
            position: relative;
            background: {{ $design['bg'] }};
            border-radius: 20px;
            box-shadow: {{ $design['glow'] }}, 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            transform-style: preserve-3d;
            transition: transform 0.6s ease;
        }
        
        .card:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: {{ $design['accent'] }};
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
            z-index: 1;
        }
        
        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: {{ $design['pattern'] }};
            opacity: 0.3;
            z-index: 1;
        }
        
        .card-content {
            position: relative;
            z-index: 2;
            padding: 25px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        
        .logo {
            background: rgba(255,255,255,0.95);
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }
        
        .logo h1 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            background: {{ $design['accent'] }};
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .logo p {
            margin: 4px 0 0 0;
            font-size: 11px;
            color: #6b7280;
            font-weight: 500;
        }
        
        .profile-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: {{ $design['accent'] }};
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            border: 4px solid white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .member-info {
            flex: 1;
        }
        
        .member-name {
            font-size: 18px;
            font-weight: 700;
            color: {{ $design['text'] }};
            margin: 0 0 5px 0;
        }
        
        .membership-title {
            background: {{ $design['title_bg'] }};
            color: {{ $design['title_text'] }};
            padding: 8px 15px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .member-id-section {
            background: {{ $design['id_bg'] }};
            padding: 15px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 25px;
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        
        .member-id-section::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: {{ $design['accent'] }};
            border-radius: 16px;
            z-index: -1;
        }
        
        .member-id {
            font-size: 20px;
            font-weight: 700;
            color: {{ $design['id_text'] }};
            margin: 0 0 8px 0;
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: {{ $design['accent'] }};
            color: {{ $design['title_text'] }};
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }
        
        .detail-item {
            background: rgba(255,255,255,0.8);
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.5);
        }
        
        .detail-label {
            font-size: 9px;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        
        .detail-value {
            font-size: 11px;
            font-weight: 600;
            color: {{ $design['text'] }};
        }
        
        .footer {
            margin-top: auto;
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }
        
        .footer-text {
            font-size: 9px;
            color: #6b7280;
            font-weight: 500;
        }
        
        .qr-code {
            width: 60px;
            height: 60px;
            background: #f8f9fa;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 8px;
            color: #6b7280;
            font-weight: 600;
            border: 1px solid #e5e7eb;
        }
        
        .years-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: {{ $design['accent'] }};
            color: {{ $design['title_text'] }};
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            z-index: 3;
        }
        
        .shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                to right,
                transparent 0%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 100%
            );
            transform: skewX(-25deg);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { left: -100%; }
            100% { left: 150%; }
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <div class="shine"></div>
            <div class="card-content">
                @if($years > 0)
                <div class="years-badge">
                    {{ $years }}<br><span style="font-size: 8px;">YRS</span>
                </div>
                @endif
                
                <div class="header">
                    <div class="logo">
                        <h1>GOD'S FAMILY CHOIR</h1>
                        <p>ASA UR Nyarugenge SDA Church</p>
                    </div>
                </div>
                
                <div class="profile-section">
                    <div class="avatar">
                        {{ strtoupper(substr($member->first_name, 0, 1)) }}{{ strtoupper(substr($member->last_name, 0, 1)) }}
                    </div>
                    <div class="member-info">
                        <h2 class="member-name">{{ $member->first_name }} {{ $member->last_name }}</h2>
                        <div class="membership-title">
                            {{ $title }}
                        </div>
                    </div>
                </div>
                
                <div class="member-id-section">
                    <div class="member-id">{{ $member->member_id }}</div>
                    <div class="badge">
                        {{ $design['badge_text'] }}
                    </div>
                </div>
                
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">Member Type</div>
                        <div class="detail-value">{{ ucfirst($member->member_type) }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Voice Part</div>
                        <div class="detail-value">{{ $member->voice ? ucfirst($member->voice) : 'All Voices' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Joined</div>
                        <div class="detail-value">{{ $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('M Y') : 'Present') }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value" style="color: {{ $design['id_text'] }}; font-weight: 700;">Active</div>
                    </div>
                </div>
                
                <div class="footer">
                    <div class="qr-code">
                        SCAN ME
                    </div>
                    <div class="footer-text">
                        Official Member ID | Keep this card secure<br>
                        www.GodsFamilyChoir.org | © {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>