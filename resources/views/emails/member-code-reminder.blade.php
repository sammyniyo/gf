<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Registration Code</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif; color: #111827; }
        .container { max-width: 560px; margin: 0 auto; padding: 24px; }
        .card { border: 1px solid #e5e7eb; border-radius: 8px; padding: 24px; }
        .code { font-size: 20px; font-weight: 700; letter-spacing: 1px; background: #f3f4f6; padding: 8px 12px; border-radius: 6px; display: inline-block; }
        .muted { color: #6b7280; }
        .btn { display: inline-block; margin-top: 16px; background: #16a34a; color: #fff; text-decoration: none; padding: 10px 14px; border-radius: 6px; }
    </style>
    </head>
<body>
    <div class="container">
        <h2>Hello {{ $member->first_name }},</h2>
        <div class="card">
            <p>Here is your God's Family registration code:</p>
            <p class="code">{{ $member->member_id }}</p>
            <p class="muted">Keep this code safe. You may need it for confirmations and downloads.</p>
            <p class="muted">If you didn't request this email, you can ignore it.</p>
        </div>
    </div>
</body>
</html>


