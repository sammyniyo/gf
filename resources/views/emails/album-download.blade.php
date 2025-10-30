<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Album Download Link</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f3f4f6;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="min-height: 100vh; background-color: #f3f4f6;">
        <tr>
            <td style="padding: 40px 20px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="margin: 0 auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 30px; text-align: center; background: linear-gradient(135deg, #047857 0%, #0d9488 100%); border-radius: 12px 12px 0 0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: bold;">God's Family Choir</h1>
                            <p style="margin: 10px 0 0; color: #d1fae5; font-size: 14px;">Voices United in Praise</p>
                        </td>
                    </tr>

                    <!-- Album Cover -->
                    <tr>
                        <td style="padding: 30px 40px; text-center;">
                            <img src="{{ $purchase->album->cover_image_url }}" alt="{{ $purchase->album->title }}" style="width: 200px; height: 200px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); object-fit: cover;">
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <h2 style="margin: 0 0 20px; color: #1f2937; font-size: 24px; text-align: center;">Your Album is Ready!</h2>

                            <p style="margin: 0 0 15px; color: #4b5563; font-size: 16px; line-height: 1.6;">
                                Dear {{ $purchase->customer_name }},
                            </p>

                            <p style="margin: 0 0 15px; color: #4b5563; font-size: 16px; line-height: 1.6;">
                                Thank you for your interest in <strong>{{ $purchase->album->title }}</strong>. Your download link is ready!
                            </p>

                            <p style="margin: 0 0 25px; color: #4b5563; font-size: 16px; line-height: 1.6;">
                                Click the button below to download your album:
                            </p>

                            <!-- Download Button -->
                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ route('shop.download', $purchase->download_code) }}"
                                   style="display: inline-block; padding: 16px 40px; background: linear-gradient(135deg, #047857 0%, #0d9488 100%); color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 12px rgba(4, 120, 87, 0.3);">
                                    Download Album
                                </a>
                            </div>

                            <!-- Download Code Info -->
                            <div style="background-color: #f9fafb; border-left: 4px solid #047857; padding: 15px; margin: 25px 0; border-radius: 4px;">
                                <p style="margin: 0 0 8px; color: #374151; font-size: 14px; font-weight: bold;">Your Download Code:</p>
                                <p style="margin: 0; color: #047857; font-size: 18px; font-weight: bold; letter-spacing: 1px;">{{ $purchase->download_code }}</p>
                                <p style="margin: 8px 0 0; color: #6b7280; font-size: 12px;">You can download this album up to {{ $purchase->max_downloads }} times.</p>
                            </div>

                            <p style="margin: 20px 0 0; color: #6b7280; font-size: 14px; line-height: 1.6;">
                                If the button doesn't work, copy and paste this link into your browser:<br>
                                <a href="{{ route('shop.download', $purchase->download_code) }}" style="color: #047857; word-break: break-all;">{{ route('shop.download', $purchase->download_code) }}</a>
                            </p>
                        </td>
                    </tr>

                    <!-- Album Info -->
                    @if($purchase->album->description || $purchase->album->track_count)
                    <tr>
                        <td style="padding: 20px 40px 30px;">
                            <div style="background-color: #f9fafb; padding: 20px; border-radius: 8px;">
                                <h3 style="margin: 0 0 10px; color: #1f2937; font-size: 18px;">About This Album</h3>
                                @if($purchase->album->description)
                                <p style="margin: 0 0 10px; color: #4b5563; font-size: 14px; line-height: 1.5;">{{ $purchase->album->description }}</p>
                                @endif
                                @if($purchase->album->track_count)
                                <p style="margin: 0; color: #6b7280; font-size: 13px;">
                                    <strong>Tracks:</strong> {{ $purchase->album->track_count }} songs
                                </p>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endif

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 30px 40px; background-color: #f9fafb; border-radius: 0 0 12px 12px; text-align: center;">
                            <p style="margin: 0 0 10px; color: #6b7280; font-size: 14px;">
                                God's Family Choir
                            </p>
                            <p style="margin: 0 0 15px; color: #9ca3af; font-size: 13px;">
                                Voices United in Praise
                            </p>
                            <div style="margin: 15px 0;">
                                <a href="{{ url('/') }}" style="color: #047857; text-decoration: none; font-size: 13px; margin: 0 10px;">Visit Our Website</a>
                                <span style="color: #d1d5db;">|</span>
                                <a href="{{ route('contact') }}" style="color: #047857; text-decoration: none; font-size: 13px; margin: 0 10px;">Contact Us</a>
                            </div>
                            <p style="margin: 15px 0 0; color: #9ca3af; font-size: 12px;">
                                © {{ date('Y') }} God's Family Choir. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

