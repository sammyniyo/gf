@php($title = 'Edit My Profile')
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
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #065f46 0%, #047857 100%); color: white; padding: 24px; border-radius: 12px; margin-bottom: 24px; }
        .header h1 { font-size: 24px; margin-bottom: 8px; }
        .card { background: white; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 24px; }
        .card h2 { font-size: 18px; font-weight: 600; margin-bottom: 16px; color: #111827; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #16a34a; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1); }
        .form-group .help { font-size: 12px; color: #6b7280; margin-top: 4px; }
        .error { color: #b91c1c; font-size: 12px; margin-top: 4px; }
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.2s; border: none; cursor: pointer; font-size: 14px; }
        .btn-primary { background: #16a34a; color: white; }
        .btn-primary:hover { background: #15803d; }
        .btn-secondary { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
        .btn-secondary:hover { background: #e5e7eb; }
        .btn-group { display: flex; gap: 12px; margin-top: 24px; }
        .success { background: #d1fae5; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .photo-preview { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>✏️ Edit My Profile</h1>
            <p style="opacity: 0.9; font-size: 14px;">Update your information</p>
        </div>

        @if(session('error'))
            <div class="error" style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('member.portal.update', $member) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Profile Photo -->
            <div class="card">
                <h2>Profile Photo</h2>
                @if($member->profile_photo_url)
                    <img src="{{ $member->profile_photo_url }}" alt="Current photo" class="photo-preview" id="photoPreview">
                @else
                    <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #065f46 0%, #047857 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold; margin-bottom: 12px;">
                        {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="profile_photo">Upload New Photo</label>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" onchange="previewPhoto(this)">
                    <div class="help">Max size: 2MB. Formats: JPG, PNG, GIF</div>
                    @error('profile_photo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card">
                <h2>Contact Information</h2>
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" required>
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" rows="3">{{ old('address', $member->address) }}</textarea>
                    @error('address')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Professional Information -->
            <div class="card">
                <h2>Professional Information</h2>
                <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" name="occupation" id="occupation" value="{{ old('occupation', $member->occupation) }}">
                    @error('occupation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="workplace">Workplace</label>
                    <input type="text" name="workplace" id="workplace" value="{{ old('workplace', $member->workplace) }}">
                    @error('workplace')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="church">Church</label>
                    <input type="text" name="church" id="church" value="{{ old('church', $member->church) }}">
                    @error('church')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Membership Information -->
            <div class="card">
                <h2>Membership Information</h2>
                <div class="form-group">
                    <label for="joining_year">Joining Year</label>
                    <input type="number" name="joining_year" id="joining_year" 
                           value="{{ old('joining_year', $member->joining_year ?? ($member->joined_at ? $member->joined_at->format('Y') : '')) }}" 
                           min="1998" max="{{ date('Y') }}">
                    <div class="help">Enter the year you joined God's Family Choir</div>
                    @error('joining_year')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Changes
                </button>
                <a href="{{ route('member.portal.view', $member) }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('member.portal.view', $member) }}" style="color: #065f46; text-decoration: none; font-size: 14px;">← Back to Profile</a>
        </div>
    </div>

    <script>
        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('photoPreview');
                    if (!preview) {
                        preview = document.createElement('img');
                        preview.id = 'photoPreview';
                        preview.className = 'photo-preview';
                        input.parentElement.insertBefore(preview, input);
                    }
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>

