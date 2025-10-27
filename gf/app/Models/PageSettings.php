<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_identifier',
        'page_name',
        'status',
        'custom_message',
        'icon',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    /**
     * Get the status color for display
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'active' => 'green',
            'coming_soon' => 'blue',
            'maintenance' => 'amber',
            'locked' => 'red',
            default => 'gray',
        };
    }

    /**
     * Get the icon for display
     */
    public function getDisplayIconAttribute(): string
    {
        return match($this->status) {
            'active' => 'check-circle',
            'coming_soon' => 'rocket',
            'maintenance' => 'wrench',
            'locked' => 'lock-closed',
            default => 'information-circle',
        };
    }

    /**
     * Check if page is accessible
     */
    public function isAccessible(): bool
    {
        return $this->is_enabled && $this->status === 'active';
    }
}

