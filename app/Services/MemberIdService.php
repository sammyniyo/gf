<?php

namespace App\Services;

use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberIdService
{
    /**
     * Generate a member ID in the format: GF{YEAR}{RANDOM_HEX}
     * Example: GF2025A3F9C1D2 (YEAR + 8 hex chars)
     * Using cryptographically secure randomness to avoid guessability.
     */
    public static function generate(): string
    {
        $year = date('Y');
        $prefix = 'GF' . $year;
        // 8 hex characters from secure random bytes
        $randomHex = strtoupper(bin2hex(random_bytes(4))); // 8 chars
        return $prefix . $randomHex;
    }

    /**
     * Generate a unique member ID and ensure it doesn't exist.
     * Retry if there's a collision.
     *
     * @param int $maxRetries
     * @return string
     * @throws \Exception
     */
    public static function generateUnique(int $maxRetries = 10): string
    {
        $attempts = 0;

        while ($attempts < $maxRetries) {
            $memberId = self::generate();

            // Check if this ID already exists
            if (!Member::where('member_id', $memberId)->exists()) {
                return $memberId;
            }

            $attempts++;
        }

        throw new \Exception('Failed to generate a unique member ID after ' . $maxRetries . ' attempts.');
    }

    /**
     * Validate a member ID format.
     *
     * @param string $memberId
     * @return bool
     */
    public static function isValidFormat(string $memberId): bool
    {
        // Allow both old (3 digits) and new (8 hex) suffix formats for backward compatibility
        return preg_match('/^GF\d{4}(\d{3}|[A-F0-9]{8})$/', $memberId) === 1;
    }

    /**
     * Extract the year from a member ID.
     *
     * @param string $memberId
     * @return int|null
     */
    public static function extractYear(string $memberId): ?int
    {
        if (!self::isValidFormat($memberId)) {
            return null;
        }

        return (int) substr($memberId, 2, 4);
    }

    /**
     * Extract the sequence number from a member ID.
     *
     * @param string $memberId
     * @return int|null
     */
    public static function extractNumber(string $memberId): ?int
    {
        if (!self::isValidFormat($memberId)) {
            return null;
        }
        // For legacy numeric IDs, return the last 3 digits; for new hex IDs, return null
        $suffix = substr($memberId, 6);
        if (ctype_digit($suffix)) {
            return (int) $suffix;
        }
        return null;
    }
}

