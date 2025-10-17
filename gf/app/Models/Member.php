<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        // Unique Identifiers
        'member_id',
        'member_type', // 'member' or 'friendship'

        // Personal Information
        'name',  // Legacy field for compatibility
        'first_name',
        'last_name',
        'email',
        'phone',
        'birthdate',
        'date_of_birth', // Alias for birthdate
        'gender',
        'address',

        // Professional Information
        'occupation',
        'workplace',
        'church',
        'education_level',
        'skills',

        // Choir Details (Members only)
        'voice',
        'voice_type', // Alias for voice
        'talent',
        'musical_experience',
        'instruments',
        'choir_experience',
        'why_join',

        // Emergency Contact
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',

        // Status & Roles
        'status',
        'roles',
        'joined_at',

        // Additional Information
        'hobbies',
        'photo_path',
        'profile_photo', // Alias for photo_path
        'availability',
        'message',
        'newsletter',

        // Contribution Targets
        'monthly_target',
        'yearly_target',
        'contribution_category',
        'has_payment_award',
        'payment_award_emoji',
        'paid_until_date',

        // Admin Notes
        'notes',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'date_of_birth' => 'date',
        'joined_at' => 'date',
        'newsletter' => 'boolean',
        'monthly_target' => 'decimal:2',
        'yearly_target' => 'decimal:2',
        'has_payment_award' => 'boolean',
        'paid_until_date' => 'date',
    ];

    protected $attributes = [
        'status' => 'pending',
        'newsletter' => false,
        'member_type' => 'member',
    ];

    /**
     * Get the member's full name.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the member's profile photo URL.
     */
    public function getProfilePhotoUrlAttribute(): ?string
    {
        if ($this->profile_photo) {
            return asset('storage/member-photos/' . $this->profile_photo);
        }

        return null;
    }

    /**
     * Scope a query to only include active members.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include pending members.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include full members (choristers).
     */
    public function scopeMembers($query)
    {
        return $query->where('member_type', 'member');
    }

    /**
     * Scope a query to only include friendship members.
     */
    public function scopeFriendship($query)
    {
        return $query->where('member_type', 'friendship');
    }

    /**
     * Check if this is a full member (chorister).
     */
    public function isMember(): bool
    {
        return $this->member_type === 'member';
    }

    /**
     * Check if this is a friendship member.
     */
    public function isFriendship(): bool
    {
        return $this->member_type === 'friendship';
    }

    /**
     * Get the member's contributions.
     */
    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    /**
     * Get total contributions amount.
     */
    public function getTotalContributionsAttribute(): float
    {
        return $this->contributions()->sum('amount');
    }

    /**
     * Get paid contributions amount.
     */
    public function getPaidContributionsAttribute(): float
    {
        return $this->contributions()->paid()->sum('amount');
    }

    /**
     * Get pending contributions amount.
     */
    public function getPendingContributionsAttribute(): float
    {
        return $this->contributions()->where('has_paid', false)->sum('amount');
    }

    /**
     * Get monthly contribution progress percentage.
     */
    public function getMonthlyProgressAttribute(): float
    {
        if ($this->monthly_target <= 0) {
            return 0;
        }

        $currentMonth = now()->format('Y-m');
        $monthlyPaid = $this->contributions()
            ->where('month', $currentMonth)
            ->where('has_paid', true)
            ->sum('amount');

        return round(($monthlyPaid / $this->monthly_target) * 100, 2);
    }

    /**
     * Get yearly contribution progress percentage.
     */
    public function getYearlyProgressAttribute(): float
    {
        if ($this->yearly_target <= 0) {
            return 0;
        }

        $currentYear = now()->year;
        $yearlyPaid = $this->contributions()
            ->whereYear('created_at', $currentYear)
            ->where('has_paid', true)
            ->sum('amount');

        return round(($yearlyPaid / $this->yearly_target) * 100, 2);
    }

    /**
     * Check if member has met monthly target.
     */
    public function hasMetMonthlyTarget(): bool
    {
        return $this->monthly_progress >= 100;
    }

    /**
     * Check if member has met yearly target.
     */
    public function hasMetYearlyTarget(): bool
    {
        return $this->yearly_progress >= 100;
    }

    /**
     * Get the monthly contribution target based on category.
     */
    public function getMonthlyTargetAmountAttribute(): int
    {
        return match($this->contribution_category) {
            'student' => 500,
            'alumni' => 1000,
            'exempt' => 0,
            default => 500,
        };
    }

    /**
     * Check if member is paid ahead and update award status.
     */
    public function updatePaymentAwardStatus(): void
    {
        $today = now();

        if ($this->paid_until_date && $this->paid_until_date->isFuture()) {
            $monthsAhead = $today->diffInMonths($this->paid_until_date);

            // Award different emojis based on how far ahead they've paid
            if ($monthsAhead >= 12) {
                $this->payment_award_emoji = '🥇'; // 1+ year ahead
            } elseif ($monthsAhead >= 6) {
                $this->payment_award_emoji = '🏆'; // 6+ months ahead
            } elseif ($monthsAhead >= 3) {
                $this->payment_award_emoji = '🌟'; // 3+ months ahead
            } else {
                $this->payment_award_emoji = '✨'; // 1-2 months ahead
            }

            $this->has_payment_award = true;
        } else {
            $this->has_payment_award = false;
            $this->payment_award_emoji = null;
        }

        $this->saveQuietly(); // Save without triggering events
    }

    /**
     * Get contribution status for the current month.
     */
    public function getCurrentMonthContributionStatus(): string
    {
        $today = now();

        // Check if paid until date covers current month
        if ($this->paid_until_date && $this->paid_until_date >= $today) {
            return 'paid';
        }

        // Check if there's a payment for current month
        $hasPaidThisMonth = $this->contributions()
            ->where('month', $today->month)
            ->whereYear('created_at', $today->year)
            ->where('has_paid', true)
            ->exists();

        return $hasPaidThisMonth ? 'paid' : 'pending';
    }

    /**
     * Get all months covered by bulk payment.
     */
    public function getMonthsCoveredByPayment(Contribution $contribution): array
    {
        $months = [];
        $startDate = $contribution->payment_date;

        for ($i = 0; $i < $contribution->months_covered; $i++) {
            $months[] = $startDate->copy()->addMonths($i);
        }

        return $months;
    }
}
