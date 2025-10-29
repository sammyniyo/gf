<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditLogger
{
    /**
     * Log an action.
     */
    public static function log(
        string $action,
        ?Model $auditable = null,
        string $description = '',
        array $oldValues = [],
        array $newValues = [],
        array $properties = []
    ): AuditLog {
        $user = Auth::user();

        return AuditLog::create([
            'user_id' => $user?->id,
            'user_name' => $user?->name,
            'user_email' => $user?->email,
            'action' => $action,
            'auditable_type' => $auditable ? get_class($auditable) : null,
            'auditable_id' => $auditable?->id,
            'description' => $description ?: static::generateDescription($action, $auditable),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'url' => Request::fullUrl(),
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'properties' => $properties,
        ]);
    }

    /**
     * Log a creation event.
     */
    public static function created(Model $model, string $description = ''): AuditLog
    {
        return static::log(
            'created',
            $model,
            $description ?: static::generateDescription('created', $model)
        );
    }

    /**
     * Log an update event.
     */
    public static function updated(Model $model, array $oldValues = [], array $newValues = [], string $description = ''): AuditLog
    {
        return static::log(
            'updated',
            $model,
            $description ?: static::generateDescription('updated', $model),
            $oldValues,
            $newValues
        );
    }

    /**
     * Log a deletion event.
     */
    public static function deleted(Model $model, string $description = ''): AuditLog
    {
        return static::log(
            'deleted',
            $model,
            $description ?: static::generateDescription('deleted', $model)
        );
    }

    /**
     * Log a view event.
     */
    public static function viewed(Model $model, string $description = ''): AuditLog
    {
        return static::log(
            'viewed',
            $model,
            $description ?: static::generateDescription('viewed', $model)
        );
    }

    /**
     * Log a status change event.
     */
    public static function statusChanged(Model $model, string $oldStatus, string $newStatus): AuditLog
    {
        return static::log(
            'status_changed',
            $model,
            static::generateDescription('status_changed', $model, [
                'from' => $oldStatus,
                'to' => $newStatus
            ]),
            ['status' => $oldStatus],
            ['status' => $newStatus]
        );
    }

    /**
     * Log an email sent event.
     */
    public static function emailSent(string $to, string $subject, ?Model $relatedModel = null): AuditLog
    {
        return static::log(
            'email_sent',
            $relatedModel,
            "Email sent to {$to}: {$subject}",
            [],
            [],
            ['to' => $to, 'subject' => $subject]
        );
    }

    /**
     * Log a login event.
     */
    public static function login(): AuditLog
    {
        $user = Auth::user();
        return static::log(
            'login',
            null,
            "{$user->name} logged in"
        );
    }

    /**
     * Log a logout event.
     */
    public static function logout(): AuditLog
    {
        $user = Auth::user();
        return static::log(
            'logout',
            null,
            "{$user->name} logged out"
        );
    }

    /**
     * Log an export event.
     */
    public static function exported(string $type, int $count): AuditLog
    {
        return static::log(
            'exported',
            null,
            "Exported {$count} {$type}",
            [],
            [],
            ['type' => $type, 'count' => $count]
        );
    }

    /**
     * Generate a human-readable description.
     */
    protected static function generateDescription(string $action, ?Model $model, array $context = []): string
    {
        if (!$model) {
            return ucfirst($action);
        }

        $modelName = class_basename($model);
        $identifier = static::getModelIdentifier($model);

        return match($action) {
            'created' => "Created {$modelName}: {$identifier}",
            'updated' => "Updated {$modelName}: {$identifier}",
            'deleted' => "Deleted {$modelName}: {$identifier}",
            'viewed' => "Viewed {$modelName}: {$identifier}",
            'restored' => "Restored {$modelName}: {$identifier}",
            'status_changed' => "Changed {$modelName} status from {$context['from']} to {$context['to']}: {$identifier}",
            default => ucfirst($action) . " {$modelName}: {$identifier}",
        };
    }

    /**
     * Get a human-readable identifier for a model.
     */
    protected static function getModelIdentifier(Model $model): string
    {
        // Try common identifier fields
        if (isset($model->name)) {
            return $model->name;
        }

        if (isset($model->first_name) && isset($model->last_name)) {
            return "{$model->first_name} {$model->last_name}";
        }

        if (isset($model->title)) {
            return $model->title;
        }

        if (isset($model->email)) {
            return $model->email;
        }

        if (isset($model->member_id)) {
            return $model->member_id;
        }

        return "ID: {$model->id}";
    }

    /**
     * Get changed attributes between two arrays.
     */
    public static function getChanges(array $original, array $current, array $excludeKeys = []): array
    {
        $changes = [
            'old' => [],
            'new' => [],
        ];

        // Add default exclude keys
        $excludeKeys = array_merge($excludeKeys, [
            'updated_at',
            'created_at',
            'remember_token',
            'password',
        ]);

        foreach ($current as $key => $value) {
            if (in_array($key, $excludeKeys)) {
                continue;
            }

            if (!array_key_exists($key, $original) || $original[$key] !== $value) {
                $changes['old'][$key] = $original[$key] ?? null;
                $changes['new'][$key] = $value;
            }
        }

        return $changes;
    }
}

