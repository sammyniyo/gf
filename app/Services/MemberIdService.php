<?php

namespace App\Services;

use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberIdService
{
    /**
     * Generate a unique member ID in format: GF{YEAR}{RANDOM_NUMBER}
     * Example: GF2024527, GF2024843, etc.
     *
     * @return string
     */
    public static function generate(): string
    {
        $year = date('Y');
        $prefix = 'GF' . $year;

        // Generate a random 3-digit number (100-999)
        $randomNumber = rand(100, 999);

        // Format with leading zeros (3 digits)
        $formattedNumber = str_pad($randomNumber, 3, '0', STR_PAD_LEFT);

        return $prefix . $formattedNumber;
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
        // Format: GF followed by 4-digit year and 3-digit number
        return preg_match('/^GF\d{4}\d{3}$/', $memberId) === 1;
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

        return (int) substr($memberId, -3);
    }
}

