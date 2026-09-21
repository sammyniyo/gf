<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PageSettings extends Model
{
    use HasFactory;

    public const ACTIVE_CHORISTERS_WINDOW_DAYS = 7;

    protected $fillable = [
        'page_identifier',
        'page_name',
        'status',
        'custom_message',
        'icon',
        'is_enabled',
        'timer_ends_at',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
        'timer_ends_at' => 'datetime',
    ];

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'active' => 'green',
            'coming_soon' => 'blue',
            'maintenance' => 'amber',
            'locked' => 'red',
            default => 'gray',
        };
    }

    public function getDisplayIconAttribute(): string
    {
        return match ($this->status) {
            'active' => 'check-circle',
            'coming_soon' => 'rocket',
            'maintenance' => 'wrench',
            'locked' => 'lock-closed',
            default => 'information-circle',
        };
    }

    public function isAccessible(): bool
    {
        return $this->is_enabled && $this->status === 'active';
    }

    public static function forActiveChoristers(): self
    {
        return static::query()->firstOrCreate(
            ['page_identifier' => 'active-choristers'],
            [
                'page_name' => 'Active Choristers',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'users',
                'is_enabled' => false,
                'timer_ends_at' => null,
            ]
        );
    }

    public static function activeChoristersRegistrationOpen(): bool
    {
        return (bool) static::activeChoristersWindow()['open'];
    }

    public static function activeChoristersWindow(): array
    {
        $setting = static::forActiveChoristers();
        $endsAt = $setting->timer_ends_at;

        if ($setting->is_enabled && $endsAt && $endsAt->isPast()) {
            $setting->is_enabled = false;
            $setting->timer_ends_at = null;
            $setting->save();
            $setting->refresh();
            $endsAt = null;
        }

        $open = (bool) $setting->is_enabled && $endsAt instanceof Carbon && $endsAt->isFuture();

        return [
            'setting' => $setting,
            'open' => $open,
            'ends_at' => $open ? $endsAt : null,
        ];
    }
}
