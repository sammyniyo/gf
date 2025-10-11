<!DOCTYPE html>
<html>
<head>
    <title>QR Code Test</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .qr-container { text-align: center; margin: 20px 0; }
        .qr-code { max-width: 300px; margin: 20px auto; }
        .debug { background: #f0f0f0; padding: 15px; margin: 20px 0; border-radius: 5px; }
        .error { background: #ffebee; color: #c62828; padding: 15px; margin: 20px 0; border-radius: 5px; }
        .success { background: #e8f5e8; color: #2e7d32; padding: 15px; margin: 20px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>QR Code Generation Test</h1>

    <div class="debug">
        <h3>Debug Information:</h3>
        <p><strong>Registration Code:</strong> {{ $registration->registration_code }}</p>
        <p><strong>QR Code Length:</strong> {{ strlen($qrCode) }}</p>
        <p><strong>QR Code Preview:</strong> {{ substr($qrCode, 0, 100) }}...</p>
        <p><strong>Is Empty:</strong> {{ empty($qrCode) ? 'YES' : 'NO' }}</p>
    </div>

    @if(!empty($qrCode))
        <div class="success">
            <h3>✅ QR Code Generated Successfully!</h3>
            <p>QR Code data length: {{ strlen($qrCode) }} characters</p>
        </div>

        <div class="qr-container">
            <h3>Generated QR Code:</h3>
            <div class="qr-code">
                <img src="{{ $qrCode }}" alt="QR Code" style="max-width: 100%; height: auto; border: 1px solid #ccc;">
            </div>
            <p><strong>Verification URL:</strong> {{ route('tickets.verify', $registration->registration_code) }}</p>
        </div>
    @else
        <div class="error">
            <h3>❌ QR Code Generation Failed!</h3>
            <p>QR Code is empty. Check the logs for more details.</p>
        </div>

        <div class="debug">
            <h3>Fallback URL:</h3>
            <p>{{ route('tickets.verify', $registration->registration_code) }}</p>
        </div>
    @endif

    <div class="debug">
        <h3>Alternative QR Code URLs:</h3>
        <p><strong>Direct URL:</strong> <a href="{{ \App\Services\QrCodeService::generateUrl(route('tickets.verify', $registration->registration_code)) }}" target="_blank">Open QR Code Image</a></p>
        <p><strong>Google Charts URL:</strong> https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ urlencode(route('tickets.verify', $registration->registration_code)) }}</p>
    </div>

    <div style="margin-top: 30px;">
        <a href="/admin/registrations" style="background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Back to Admin</a>
    </div>
</body>
</html>
