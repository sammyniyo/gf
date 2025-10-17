<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'start_at',
        'end_at',
        'location',
        'capacity',
        'is_public',
        'cover_image',
        'accept_support'
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'accept_support' => 'boolean',
        'start_at'  => 'datetime',
        'end_at'    => 'datetime',
        'capacity' => 'integer',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function isConcert(): bool
    {
        return strtoupper($this->type ?? '') === 'CONCERT';
    }

    public function supportsGiving(): bool
    {
        // Concerts default to support true unless explicitly disabled
        if ($this->isConcert()) {
            return $this->accept_support !== false;
        }
        // Other types respect the flag (default false)
        return (bool) $this->accept_support;
    }

    public function isFull(): bool
    {
        return $this->capacity !== null && $this->registrations()->count() >= $this->capacity;
    }

    public function isPast(): bool
    {
        return $this->start_at instanceof Carbon && $this->start_at->isPast();
    }
}
