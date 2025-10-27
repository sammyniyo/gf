<?php

namespace App\Services;

class QrCodeService
{
    /**
     * Generate QR code using multiple APIs for better reliability
     *
     * @param string $data The data to encode in the QR code
     * @param int $size The size of the QR code (default: 300)
     * @return string Base64 encoded PNG image data
     */
    public static function generate(string $data, int $size = 300): string
    {
        // Try multiple QR code APIs for better reliability
        $apis = [
            // API 1: QR Server (more reliable)
            "https://api.qrserver.com/v1/create-qr-code/?size={$size}x{$size}&data=" . urlencode($data),
            // API 2: QR Code API
            "https://qr-code-api.com/png/{$size}/" . urlencode($data),
            // API 3: Google Charts (fallback)
            "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($data),
            // API 4: QR Code Monkey (backup)
            "https://api.qrcode-monkey.com/qr/custom?data=" . urlencode($data) . "&size={$size}&format=png"
        ];

        foreach ($apis as $index => $qrUrl) {
            try {
                \Log::info("Trying QR API " . ($index + 1), ['url' => $qrUrl]);

                // Try cURL first (more reliable)
                if (function_exists('curl_init')) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $qrUrl);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Accept: image/png,image/*,*/*',
                        'Accept-Language: en-US,en;q=0.9',
                    ]);

                    $imageData = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $error = curl_error($ch);
                    curl_close($ch);

                    if ($imageData !== false && !empty($imageData) && $httpCode === 200) {
                        // Verify it's actually an image by checking the first few bytes
                        if (substr($imageData, 0, 8) === "\x89PNG\r\n\x1a\n" ||
                            substr($imageData, 0, 2) === "\xFF\xD8" ||
                            substr($imageData, 0, 4) === "\x89PNG") {
                            \Log::info("QR Code generated successfully with API " . ($index + 1));
                            return 'data:image/png;base64,' . base64_encode($imageData);
                        }
                    }

                    \Log::warning('QR Code cURL failed for API ' . ($index + 1), [
                        'http_code' => $httpCode,
                        'error' => $error,
                        'url' => $qrUrl,
                        'data_length' => strlen($imageData ?? '')
                    ]);
                }

                // Fallback to file_get_contents
                if (ini_get('allow_url_fopen')) {
                    $context = stream_context_create([
                        'http' => [
                            'timeout' => 10,
                            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                            'header' => "Accept: image/png,image/*,*/*\r\n"
                        ]
                    ]);

                    $imageData = file_get_contents($qrUrl, false, $context);
                    if ($imageData !== false && !empty($imageData)) {
                        // Verify it's actually an image
                        if (substr($imageData, 0, 8) === "\x89PNG\r\n\x1a\n" ||
                            substr($imageData, 0, 2) === "\xFF\xD8" ||
                            substr($imageData, 0, 4) === "\x89PNG") {
                            \Log::info("QR Code generated successfully with API " . ($index + 1) . " (file_get_contents)");
                            return 'data:image/png;base64,' . base64_encode($imageData);
                        }
                    }

                    \Log::warning('QR Code file_get_contents failed for API ' . ($index + 1), [
                        'url' => $qrUrl,
                        'data_length' => strlen($imageData ?? '')
                    ]);
                }
            } catch (\Exception $e) {
                \Log::warning('QR Code API ' . ($index + 1) . ' exception', [
                    'message' => $e->getMessage(),
                    'url' => $qrUrl
                ]);
                continue; // Try next API
            }
        }

        // If all APIs fail, create a simple text-based fallback
        \Log::error('All QR Code APIs failed', [
            'data' => $data,
            'tried_apis' => count($apis)
        ]);

        return ''; // Return empty string for now
    }

    /**
     * Generate QR code URL (for direct image display)
     *
     * @param string $data The data to encode in the QR code
     * @param int $size The size of the QR code (default: 300)
     * @return string Direct URL to the QR code image
     */
    public static function generateUrl(string $data, int $size = 300): string
    {
        // Use the most reliable QR API for direct URL generation
        return "https://api.qrserver.com/v1/create-qr-code/?size={$size}x{$size}&data=" . urlencode($data);
    }

    /**
     * Generate QR code for ticket verification
     *
     * @param string $registrationCode The registration code
     * @param int $size The size of the QR code (default: 300)
     * @return string Base64 encoded PNG image data
     */
    public static function generateTicketQr(string $registrationCode, int $size = 300): string
    {
        $verifyUrl = route('tickets.verify', $registrationCode);
        return self::generate($verifyUrl, $size);
    }
}
