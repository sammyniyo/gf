@php($title = 'My Profile - ' . $member->full_name)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Figtree, system-ui, -apple-system, sans-serif; background: #f9fafb; color: #111827; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #065f46 0%, #047857 100%); color: white; padding: 24px; border-radius: 12px; margin-bottom: 24px; }
        .header h1 { font-size: 24px; margin-bottom: 8px; }
        .card { background: white; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 24px; }
        .card h2 { font-size: 18px; font-weight: 600; margin-bottom: 16px; color: #111827; }
        .grid { display: grid; gap: 16px; }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }
        .label { font-size: 12px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .value { font-size: 14px; color: #111827; }
        .badge { display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 9999px; font-size: 12px; font-weight: 600; }
        .badge-active { background: #d1fae5; color: #065f46; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-inactive { background: #f3f4f6; color: #374151; }
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
        .btn-primary { background: #16a34a; color: white; }
        .btn-primary:hover { background: #15803d; }
        .btn-secondary { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
        .btn-secondary:hover { background: #e5e7eb; }
        .btn-group { display: flex; gap: 12px; flex-wrap: wrap; }
        .photo { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; }
        .success { background: #d1fae5; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🎵 My Member Profile</h1>
            <p style="opacity: 0.9; font-size: 14px;">God's Family Choir - Member Portal</p>
        </div>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <!-- Quick Actions -->
        <div class="card">
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
                @if($member->profile_photo_url)
                    <img src="{{ $member->profile_photo_url }}" alt="{{ $member->full_name }}" class="photo">
                @else
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #065f46 0%, #047857 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">
                        {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                    </div>
                @endif
                <div style="flex: 1;">
                    <h2 style="margin: 0 0 4px 0;">{{ $member->full_name }}</h2>
                    <p style="color: #6b7280; font-size: 14px; margin: 0;">{{ $member->member_id }}</p>
                    <div style="margin-top: 8px;">
                        <span class="badge {{ $member->status === 'active' ? 'badge-active' : ($member->status === 'pending' ? 'badge-pending' : 'badge-inactive') }}">
                            {{ ucfirst($member->status) }}
                        </span>
                        @if($member->member_type === 'member' && $member->is_active_chorister)
                            <span class="badge" style="background: #dbeafe; color: #1e40af; margin-left: 8px;">
                                Active Chorister
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <a href="{{ route('member.id-card.download', $member) }}" class="btn btn-primary">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download ID Card
                </a>
                <a href="{{ route('member.id-card.view', $member) }}" class="btn btn-secondary" target="_blank">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View ID Card
                </a>
                <a href="{{ route('member.portal.edit', $member) }}" class="btn btn-secondary">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="card">
            <h2>Personal Information</h2>
            <div class="grid grid-2">
                <div>
                    <div class="label">Full Name</div>
                    <div class="value">{{ $member->full_name }}</div>
                </div>
                <div>
                    <div class="label">Member ID</div>
                    <div class="value" style="font-weight: 600; color: #065f46;">{{ $member->member_id }}</div>
                </div>
                <div>
                    <div class="label">Email</div>
                    <div class="value">{{ $member->email }}</div>
                </div>
                <div>
                    <div class="label">Phone</div>
                    <div class="value">{{ $member->phone }}</div>
                </div>
                <div>
                    <div class="label">Date of Birth</div>
                    <div class="value">{{ $member->date_of_birth?->format('F j, Y') ?? 'Not provided' }}</div>
                </div>
                <div>
                    <div class="label">Gender</div>
                    <div class="value">{{ ucfirst($member->gender ?? 'Not provided') }}</div>
                </div>
                <div>
                    <div class="label">Address</div>
                    <div class="value">{{ $member->address ?? 'Not provided' }}</div>
                </div>
                <div>
                    <div class="label">Joining Year</div>
                    <div class="value">{{ $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('Y') : 'N/A') }}</div>
                </div>
            </div>
        </div>

        @if($member->member_type === 'member')
        <!-- Choir Information -->
        <div class="card">
            <h2>Choir Information</h2>
            <div class="grid grid-2">
                @if($member->voice_type)
                <div>
                    <div class="label">Voice Type</div>
                    <div class="value">{{ ucfirst($member->voice_type) }}</div>
                </div>
                @endif
                @if($member->musical_experience)
                <div>
                    <div class="label">Musical Experience</div>
                    <div class="value">{{ ucfirst($member->musical_experience) }}</div>
                </div>
                @endif
                @if($member->instruments)
                <div>
                    <div class="label">Instruments</div>
                    <div class="value">{{ $member->instruments }}</div>
                </div>
                @endif
                @if($member->membership_years > 0)
                <div>
                    <div class="label">Membership Duration</div>
                    <div class="value">{{ $member->membership_years }} {{ $member->membership_years == 1 ? 'year' : 'years' }}</div>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Professional Information -->
        @if($member->occupation || $member->workplace || $member->church)
        <div class="card">
            <h2>Professional Information</h2>
            <div class="grid grid-2">
                @if($member->occupation)
                <div>
                    <div class="label">Occupation</div>
                    <div class="value">{{ $member->occupation }}</div>
                </div>
                @endif
                @if($member->workplace)
                <div>
                    <div class="label">Workplace</div>
                    <div class="value">{{ $member->workplace }}</div>
                </div>
                @endif
                @if($member->church)
                <div>
                    <div class="label">Church</div>
                    <div class="value">{{ $member->church }}</div>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Emergency Contact -->
        @if($member->emergency_contact_name)
        <div class="card">
            <h2>Emergency Contact</h2>
            <div class="grid grid-2">
                <div>
                    <div class="label">Name</div>
                    <div class="value">{{ $member->emergency_contact_name }}</div>
                </div>
                @if($member->emergency_contact_phone)
                <div>
                    <div class="label">Phone</div>
                    <div class="value">{{ $member->emergency_contact_phone }}</div>
                </div>
                @endif
            </div>
        </div>
        @endif

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('member.portal') }}" style="color: #065f46; text-decoration: none; font-size: 14px;">← Back to Member Portal</a>
        </div>
    </div>
</body>
</html>

