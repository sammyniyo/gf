<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AuditLog extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'action',
        'auditable_type',
        'auditable_id',
        'description',
        'ip_address',
        'user_agent',
        'url',
        'old_values',
        'new_values',
        'properties',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'properties' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user who performed the action.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the auditable model (Member, Event, etc.)
     */
    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get a human-readable action label.
     */
    public function getActionLabelAttribute(): string
    {
        return match($this->action) {
            'created' => 'Created',
            'updated' => 'Updated',
            'deleted' => 'Deleted',
            'restored' => 'Restored',
            'viewed' => 'Viewed',
            'exported' => 'Exported',
            'imported' => 'Imported',
            'login' => 'Logged In',
            'logout' => 'Logged Out',
            'password_changed' => 'Changed Password',
            'email_sent' => 'Sent Email',
            'status_changed' => 'Changed Status',
            default => ucfirst($this->action),
        };
    }

    /**
     * Get action badge color.
     */
    public function getActionColorAttribute(): string
    {
        return match($this->action) {
            'created' => 'green',
            'updated' => 'blue',
            'deleted' => 'red',
            'restored' => 'green',
            'viewed' => 'gray',
            'exported' => 'purple',
            'imported' => 'indigo',
            'login' => 'emerald',
            'logout' => 'gray',
            'password_changed' => 'amber',
            'email_sent' => 'sky',
            'status_changed' => 'orange',
            default => 'slate',
        };
    }

    /**
     * Get the model name without namespace.
     */
    public function getModelNameAttribute(): string
    {
        if (!$this->auditable_type) {
            return 'Unknown';
        }

        $parts = explode('\\', $this->auditable_type);
        return end($parts);
    }

    /**
     * Scope to filter by action.
     */
    public function scopeAction($query, $action)
    {
        return $query->where('action', $action);
    }

    /**
     * Scope to filter by model type.
     */
    public function scopeModelType($query, $type)
    {
        return $query->where('auditable_type', $type);
    }

    /**
     * Scope to filter by user.
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to filter by date range.
     */
    public function scopeDateRange($query, $start, $end)
    {
        return $query->whereBetween('created_at', [$start, $end]);
    }
}
