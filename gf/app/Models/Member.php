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
        'notes',
        'joined_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_at' => 'date',
        'newsletter' => 'boolean',
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
}
