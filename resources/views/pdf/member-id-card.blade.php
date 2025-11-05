@php
    $category = $member->membership_category;
    $title = $member->membership_title;
    $years = $member->membership_years;
    
    // Simple, clean colors
    $cardDesigns = [
        'fresher' => ['accent' => '#10b981', 'text' => '#064e3b'],
        'member' => ['accent' => '#3b82f6', 'text' => '#1e3a8a'],
        'veteran' => ['accent' => '#8b5cf6', 'text' => '#5b21b6'],
        'elite' => ['accent' => '#f59e0b', 'text' => '#78350f'],
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
            background: #f5f5f5;
        }
        .card {
            width: 3.375in;
            height: 2.125in;
            background: white;
            position: relative;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }
        /* Header Bar */
        .header-bar {
            height: 25px;
            background: {{ $design['accent'] }};
            width: 100%;
        }
        /* Header Content */
        .header {
            padding: 5px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }
        .header-left h1 {
            font-size: 10px;
            font-weight: bold;
            color: {{ $design['accent'] }};
            margin: 0;
            line-height: 1.2;
        }
        .header-left p {
            font-size: 6px;
            color: #6b7280;
            margin: 0;
        }
        .header-right {
            text-align: right;
            font-size: 6px;
            color: #6b7280;
        }
        /* Main Content */
        .content {
            padding: 10px 12px;
            display: flex;
            gap: 12px;
            height: calc(100% - 60px);
        }
        /* Left Section */
        .left-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }
        .photo-placeholder {
            width: 50px;
            height: 50px;
            background: {{ $design['accent'] }};
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
        .id-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 4px 6px;
            border-radius: 3px;
            font-size: 7px;
            font-weight: bold;
            color: {{ $design['text'] }};
            text-align: center;
            max-width: 70px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        /* Right Section */
        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .member-name {
            font-size: 13px;
            font-weight: bold;
            color: #111827;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .membership-title {
            font-size: 9px;
            color: {{ $design['text'] }};
            font-weight: 600;
            text-transform: uppercase;
        }
        /* Details Section */
        .details {
            margin-top: 4px;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }
        .detail-row {
            display: flex;
            font-size: 7px;
            line-height: 1.4;
        }
        .detail-label {
            font-weight: bold;
            color: #374151;
            min-width: 45px;
            flex-shrink: 0;
        }
        .detail-value {
            color: #111827;
            font-weight: 600;
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .status-value {
            color: {{ $design['accent'] }};
            font-weight: bold;
        }
        /* Footer */
        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: #fef3c7;
            border-top: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6px;
            color: #6b7280;
            padding: 0 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <!-- Top Accent Bar -->
        <div class="header-bar"></div>
        
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>GOD'S FAMILY CHOIR</h1>
                <p>ASA UR Nyarugenge SDA</p>
            </div>
            @if($years > 0)
            <div class="header-right">
                {{ $years }} {{ $years == 1 ? 'Year' : 'Years' }} Member
            </div>
            @endif
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <!-- Left: Photo and ID -->
            <div class="left-section">
                <div class="photo-placeholder">
                    {{ $initials }}
                </div>
                <div class="id-box">
                    {{ $member->member_id }}
                </div>
            </div>
            
            <!-- Right: Name and Details -->
            <div class="right-section">
                <div class="member-name">
                    {{ $member->first_name }} {{ $member->last_name }}
                </div>
                <div class="membership-title">
                    {{ $title }}
                </div>
                
                <!-- Details -->
                <div class="details">
                    <div class="detail-row">
                        <span class="detail-label">Type:</span>
                        <span class="detail-value">{{ ucfirst($member->member_type) }}</span>
                    </div>
                    @if($member->voice)
                    <div class="detail-row">
                        <span class="detail-label">Voice:</span>
                        <span class="detail-value">{{ ucfirst($member->voice) }}</span>
                    </div>
                    @endif
                    <div class="detail-row">
                        <span class="detail-label">Joined:</span>
                        <span class="detail-value">{{ $joiningYear }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value status-value">Active</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            Official Member ID • Valid through {{ date('Y') + 1 }} • www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>
