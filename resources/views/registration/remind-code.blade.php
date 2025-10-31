@php($title = 'Remind My Registration Code')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body { font-family: Figtree, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; background: #f9fafb; color: #111827; }
        .container { max-width: 540px; margin: 40px auto; padding: 0 16px; }
        .card { background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; }
        h1 { font-size: 22px; margin: 0 0 12px; }
        p { color: #6b7280; margin-top: 0; }
        label { display: block; font-weight: 600; margin-bottom: 6px; }
        input[type="email"] { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 6px; }
        .success { color: #065f46; background: #ecfdf5; border: 1px solid #d1fae5; padding: 10px 12px; border-radius: 8px; margin-bottom: 12px; }
        .danger { color: #991b1b; background: #fef2f2; border: 1px solid #fee2e2; padding: 10px 12px; border-radius: 8px; margin-bottom: 12px; }
        button { background: #16a34a; color: #fff; border: 0; border-radius: 8px; padding: 10px 14px; font-weight: 600; cursor: pointer; }
        .muted { color: #6b7280; font-size: 14px; }
        .space { height: 12px; }
        a { color: #16a34a; text-decoration: none; }
    </style>
    </head>
<body>
    <div class="container">
        <div class="card">
            <h1>{{ $title }}</h1>
            <p>Enter the email you used during registration. We'll email your code.</p>

            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('registration.remind-code.send') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                <div class="space"></div>
                <button type="submit">Email me my code</button>
            </form>

            <div class="space"></div>
            <p class="muted">Remembered your code? You can go back to <a href="{{ route('registration.member') }}">Member</a> or <a href="{{ route('registration.friendship') }}">Friendship</a> registration.</p>
        </div>
    </div>
</body>
</html>


