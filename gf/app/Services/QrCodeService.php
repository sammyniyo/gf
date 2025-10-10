<?php

namespace App\Services;

class QrCodeService
{
    /**
     * Generate QR code using Google Charts API
     *
     * @param string $data The data to encode in the QR code
     * @param int $size The size of the QR code (default: 300)
     * @return string Base64 encoded PNG image data
     */
    public static function generate(string $data, int $size = 300): string
    {
        $qrUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($data);

        try {
            // Try cURL first (more reliable)
            if (function_exists('curl_init')) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $qrUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $imageData = curl_exec($ch);
                curl_close($ch);

                if ($imageData !== false && !empty($imageData)) {
                    return 'data:image/png;base64,' . base64_encode($imageData);
                }
            }

            // Fallback to file_get_contents
            if (ini_get('allow_url_fopen')) {
                $imageData = file_get_contents($qrUrl);
                if ($imageData !== false && !empty($imageData)) {
                    return 'data:image/png;base64,' . base64_encode($imageData);
                }
            }

            // If all else fails, return empty string
            return '';
        } catch (\Exception $e) {
            // Fallback: return a placeholder image or empty string
            return '';
        }
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
        return "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($data);
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
