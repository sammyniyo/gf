@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Simple, clean designs matching the sample
    $cardDesigns = [
        'fresher' => [
            'bg' => '#fef9e7',
            'accent' => '#10b981',
            'text' => '#064e3b',
        ],
        'member' => [
            'bg' => '#fef9e7',
            'accent' => '#3b82f6',
            'text' => '#1e3a8a',
        ],
        'veteran' => [
            'bg' => '#fef9e7',
            'accent' => '#8b5cf6',
            'text' => '#5b21b6',
        ],
        'elite' => [
            'bg' => '#fef9e7',
            'accent' => '#f59e0b',
            'text' => '#78350f',
        ],
    ];
    
    $design = $cardDesigns[$category] ?? $cardDesigns['member'];
    $initials = strtoupper(substr($member->first_name, 0, 1) . substr($member->last_name, 0, 1));
    $joiningYear = $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('Y') : date('Y'));
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Member ID Card</title>
    <style>
        @page {
            margin: 0;
            size: 3.375in 2.125in;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 10px;
            font-family: 'Arial', sans-serif;
            background: #e5e7eb;
        }
        .card {
            width: 3.375in;
            height: 2.125in;
            background: {{ $design['bg'] }};
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            border: 2px solid {{ $design['accent'] }};
        }
        /* Top Header Bar */
        .header-bar {
            height: 28px;
            background: {{ $design['accent'] }};
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .header-text {
            color: white;
            text-align: center;
        }
        .header-text h1 {
            font-size: 11px;
            font-weight: bold;
            margin: 0;
            line-height: 1.1;
        }
        .header-text p {
            font-size: 6.5px;
            margin: 0;
            opacity: 0.95;
        }
        /* Age Badge */
        .age-badge {
            position: absolute;
            left: 6px;
            top: 6px;
            width: 24px;
            height: 24px;
            background: white;
            border: 2px solid {{ $design['accent'] }};
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .age-badge .number {
            font-size: 10px;
            font-weight: bold;
            color: black;
            line-height: 1;
        }
        .age-badge .label {
            font-size: 4.5px;
            color: black;
            font-weight: bold;
        }
        /* Main Content Area */
        .content-area {
            padding: 6px 8px 20px 8px;
            display: flex;
            gap: 8px;
            height: calc(100% - 28px);
        }
        /* Left Side - Photo and ID */
        .left-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
        }
        .photo-placeholder {
            width: 45px;
            height: 45px;
            background: {{ $design['accent'] }};
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
        .id-bar {
            background: {{ $design['accent'] }}33;
            color: black;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 6.5px;
            font-weight: bold;
            text-align: center;
            max-width: 65px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        /* Right Side - Name and Details */
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 3px;
            min-width: 0;
        }
        .member-name {
            font-size: 12px;
            font-weight: bold;
            color: {{ $design['text'] }};
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .membership-level {
            font-size: 8px;
            color: {{ $design['text'] }};
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 2px;
        }
        /* Bottom Details Section */
        .details-section {
            padding-left: 6px;
            border-left: 3px solid {{ $design['accent'] }};
            display: flex;
            flex-direction: column;
            gap: 1.5px;
            flex: 1;
        }
        .detail-row {
            display: flex;
            align-items: baseline;
            gap: 5px;
            font-size: 6.5px;
            line-height: 1.2;
        }
        .detail-label {
            color: {{ $design['accent'] }};
            font-weight: bold;
            text-transform: uppercase;
            min-width: 35px;
            flex-shrink: 0;
        }
        .detail-value {
            color: {{ $design['text'] }};
            font-weight: 600;
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .status-active {
            color: {{ $design['accent'] }};
        }
        /* Footer */
        .footer {
            position: absolute;
            bottom: 3px;
            left: 8px;
            right: 8px;
            text-align: center;
            font-size: 5.5px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 1px;
        }
        /* Corner Accent */
        .corner-accent {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border-bottom: 35px solid {{ $design['accent'] }}22;
            border-left: 35px solid transparent;
        }
    </style>
</head>
<body>
    <div class="card">
        <!-- Top Header Bar -->
        <div class="header-bar">
            @if($years > 0)
            <div class="age-badge">
                <span class="number">{{ $years }}</span>
                <span class="label">YRS</span>
            </div>
            @endif
            <div class="header-text">
                <h1>GOD'S FAMILY CHOIR</h1>
                <p>ASA UR Nyarugenge SDA</p>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="content-area">
            <!-- Left: Photo and ID -->
            <div class="left-section">
                <div class="photo-placeholder">
                    {{ $initials }}
                </div>
                <div class="id-bar">
                    {{ $member->member_id }}
                </div>
            </div>
            
            <!-- Right: Name and Details -->
            <div class="right-section">
                <div class="member-name">
                    {{ $member->first_name }} {{ $member->last_name }}
                </div>
                <div class="membership-level">
                    {{ $title }}
                </div>
                
                <!-- Details Section -->
                <div class="details-section">
                    <div class="detail-row">
                        <span class="detail-label">Type</span>
                        <span class="detail-value">{{ ucfirst($member->member_type) }}</span>
                    </div>
                    @if($member->voice)
                    <div class="detail-row">
                        <span class="detail-label">Voice</span>
                        <span class="detail-value">{{ ucfirst($member->voice) }}</span>
                    </div>
                    @endif
                    <div class="detail-row">
                        <span class="detail-label">Joined</span>
                        <span class="detail-value">{{ $joiningYear }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status</span>
                        <span class="detail-value status-active">Active</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Corner Accent -->
        <div class="corner-accent"></div>
        
        <!-- Footer -->
        <div class="footer">
            Official Member ID • Valid through {{ date('Y') + 1 }} • www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>

