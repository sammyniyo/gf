<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'start_at',
        'end_at',
        'date',
        'time',
        'location',
        'max_attendees',
        'is_public',
        'image'
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'start_at'  => 'datetime',
        'end_at'    => 'datetime',
        'date'      => 'date',
        'max_attendees' => 'integer',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function isConcert(): bool
    {
        return strtoupper($this->type ?? '') === 'CONCERT';
    }

    public function isFull(): bool
    {
        return $this->max_attendees !== null && $this->registrations()->count() >= $this->max_attendees;
    }

    public function isPast(): bool
    {
        return $this->start_at instanceof Carbon && $this->start_at->isPast();
    }
}
