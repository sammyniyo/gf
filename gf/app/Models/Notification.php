<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'title',
        'message',
        'icon',
        'color',
        'action_url',
        'action_text',
        'is_read',
        'read_at',
        'user_id',
        'data',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'data' => 'array',
        'created_at' => 'datetime',
    ];

    /**
     * Get the user that owns the notification.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope to get unread notifications.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope to get notifications for a specific user or all admins.
     */
    public function scopeForUser($query, $userId = null)
    {
        return $query->where(function($q) use ($userId) {
            $q->whereNull('user_id')
              ->orWhere('user_id', $userId);
        });
    }

    /**
     * Mark notification as read.
     */
    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Get relative time (e.g., "2 hours ago").
     */
    public function getRelativeTimeAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get icon HTML class based on type.
     */
    public function getIconClassAttribute(): string
    {
        if ($this->icon) {
            return $this->icon;
        }

        return match($this->type) {
            'registration' => 'M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z',
            'member' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
            'contact' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'contribution' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
            'event' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
            default => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9',
        };
    }

    /**
     * Get color classes based on notification type.
     */
    public function getColorClassesAttribute(): array
    {
        return match($this->color) {
            'blue' => [
                'bg' => 'bg-blue-100',
                'text' => 'text-blue-600',
                'border' => 'border-blue-200',
                'hover' => 'hover:bg-blue-50',
            ],
            'green' => [
                'bg' => 'bg-emerald-100',
                'text' => 'text-emerald-600',
                'border' => 'border-emerald-200',
                'hover' => 'hover:bg-emerald-50',
            ],
            'red' => [
                'bg' => 'bg-rose-100',
                'text' => 'text-rose-600',
                'border' => 'border-rose-200',
                'hover' => 'hover:bg-rose-50',
            ],
            'yellow' => [
                'bg' => 'bg-amber-100',
                'text' => 'text-amber-600',
                'border' => 'border-amber-200',
                'hover' => 'hover:bg-amber-50',
            ],
            'purple' => [
                'bg' => 'bg-purple-100',
                'text' => 'text-purple-600',
                'border' => 'border-purple-200',
                'hover' => 'hover:bg-purple-50',
            ],
            default => [
                'bg' => 'bg-slate-100',
                'text' => 'text-slate-600',
                'border' => 'border-slate-200',
                'hover' => 'hover:bg-slate-50',
            ],
        };
    }
}

