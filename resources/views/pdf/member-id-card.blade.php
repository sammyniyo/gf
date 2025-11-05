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
        }
        /* Orange Header Bar */
        .header-bar {
            height: 32px;
            background: {{ $design['accent'] }};
            padding: 6px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-left h1 {
            font-size: 11px;
            font-weight: bold;
            color: white;
            margin: 0;
            line-height: 1.2;
            text-transform: uppercase;
        }
        .header-left p {
            font-size: 7px;
            color: white;
            margin: 0;
            opacity: 0.95;
        }
        .header-right {
            font-size: 7px;
            color: white;
            font-weight: 500;
        }
        /* Separator Line */
        .separator {
            height: 1px;
            background: #e5e7eb;
            width: 100%;
        }
        /* Main Content */
        .content {
            padding: 10px 12px 24px 12px;
            height: calc(100% - 33px);
        }
        /* Avatar and ID Row */
        .avatar-id-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
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
            flex-shrink: 0;
        }
        .id-box {
            background: #fef9e7;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 7px;
            font-weight: bold;
            color: #374151;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        /* Name and Title */
        .member-name {
            font-size: 14px;
            font-weight: bold;
            color: #111827;
            margin: 0 0 3px 0;
            text-transform: uppercase;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .membership-title {
            font-size: 9px;
            color: {{ $design['text'] }};
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        /* Details Section */
        .details {
            padding-left: 8px;
            border-left: 3px solid {{ $design['accent'] }};
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
            min-width: 50px;
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
            height: 18px;
            background: #fef3c7;
            border-top: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="card">
        <!-- Orange Header Bar -->
        <div class="header-bar">
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
        
        <!-- Separator Line -->
        <div class="separator"></div>
        
        <!-- Main Content -->
        <div class="content">
            <!-- Avatar and ID Row -->
            <div class="avatar-id-row">
                <div class="photo-placeholder">
                    {{ $initials }}
                </div>
                <div class="id-box">
                    {{ $member->member_id }}
                </div>
            </div>
            
            <!-- Name and Membership Title -->
            <div class="member-name">
                {{ $member->first_name }} {{ $member->last_name }}
            </div>
            <div class="membership-title">
                {{ $title }}
            </div>
            
            <!-- Details Section -->
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
        
        <!-- Footer -->
        <div class="footer">
            Official Member ID • Valid through {{ date('Y') + 1 }} • www.godsfamilychoir.org
        </div>
    </div>
</body>
</html>
