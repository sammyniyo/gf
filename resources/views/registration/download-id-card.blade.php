@php($title = 'Download Member ID Card')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body { font-family: Figtree, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; background: linear-gradient(135deg, #065f46 0%, #047857 100%); color: #111827; min-height: 100vh; padding: 20px; }
        .container { max-width: 540px; margin: 40px auto; }
        .card { background: #ffffff; border-radius: 16px; padding: 32px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        h1 { font-size: 24px; margin: 0 0 8px; color: #065f46; font-weight: 700; }
        .subtitle { color: #6b7280; margin: 0 0 24px; font-size: 14px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; color: #374151; }
        input[type="text"] { width: 100%; padding: 12px 16px; border: 2px solid #d1d5db; border-radius: 8px; font-size: 16px; text-transform: uppercase; }
        input[type="text"]:focus { outline: none; border-color: #16a34a; box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1); }
        .error { color: #b91c1c; font-size: 14px; margin-top: 8px; background: #fef2f2; padding: 10px 12px; border-radius: 8px; border: 1px solid #fee2e2; }
        button { background: #16a34a; color: #fff; border: 0; border-radius: 8px; padding: 12px 24px; font-weight: 600; cursor: pointer; width: 100%; font-size: 16px; margin-top: 16px; }
        button:hover { background: #15803d; }
        .muted { color: #6b7280; font-size: 14px; margin-top: 16px; text-align: center; }
        a { color: #16a34a; text-decoration: none; font-weight: 500; }
        .info-box { background: #ecfdf5; border: 1px solid #d1fae5; padding: 16px; border-radius: 8px; margin-bottom: 24px; }
        .info-box p { margin: 0; color: #065f46; font-size: 14px; }
        .info-box strong { display: block; margin-bottom: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>🎵 Download Your ID Card</h1>
            <p class="subtitle">Enter your GF member code to download your membership card</p>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <div class="info-box">
                <strong>💡 Don't have your code?</strong>
                <p>You can request your member code by email using the <a href="{{ route('registration.remind-code') }}">remind code</a> feature.</p>
            </div>

            <form method="POST" action="{{ route('download.id-card.submit') }}">
                @csrf
                <label for="member_code">GF Member Code</label>
                <input type="text" 
                       id="member_code" 
                       name="member_code" 
                       value="{{ old('member_code') }}" 
                       placeholder="e.g. GF2024001"
                       required
                       autofocus>
                @error('member_code')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Download ID Card</button>
            </form>

            <p class="muted">
                Remembered your code? You can go back to <a href="{{ route('registration.member') }}">Member</a> or <a href="{{ route('registration.friendship') }}">Friendship</a> registration.
            </p>
        </div>
    </div>
</body>
</html>

