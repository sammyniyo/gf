<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        // Personal Information
        'name',  // Legacy field for compatibility
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',

        // Professional Information
        'occupation',
        'workplace',
        'education_level',
        'skills',

        // Choir Details
        'voice_type',
        'musical_experience',
        'instruments',
        'choir_experience',
        'why_join',

        // Emergency Contact
        'emergency_contact_name',
        'emergency_contact_phone',

        // Additional Information
        'availability',
        'profile_photo',
        'newsletter',
        'status',
        'member_type',
        'monthly_target',
        'yearly_target',
        'notes',
        'joined_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_at' => 'date',
        'newsletter' => 'boolean',
        'monthly_target' => 'decimal:2',
        'yearly_target' => 'decimal:2',
    ];

    protected $attributes = [
        'status' => 'pending',
        'newsletter' => false,
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
}
