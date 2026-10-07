<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Rehearsal extends Model
{
    public const KIND_TUESDAY = 'tuesday';
    public const KIND_THURSDAY = 'thursday';
    public const KIND_SATURDAY = 'saturday';

    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';

    protected $fillable = [
        'held_on',
        'kind',
        'title',
        'notes',
        'status',
        'taken_by',
        'opened_at',
        'closed_at',
    ];

    protected $casts = [
        'held_on' => 'date',
        'opened_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function attendances(): HasMany
    {
        return $this->hasMany(RehearsalAttendance::class);
    }

    public function takenBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'taken_by');
    }

    public function isOpen(): bool
    {
        return $this->status === self::STATUS_OPEN;
    }

    public function isSaturday(): bool
    {
        return $this->kind === self::KIND_SATURDAY;
    }

    public function kindLabel(): string
    {
        return match ($this->kind) {
            self::KIND_TUESDAY => 'Tuesday rehearsal',
            self::KIND_THURSDAY => 'Thursday rehearsal',
            self::KIND_SATURDAY => 'Saturday (special)',
            default => 'Rehearsal',
        };
    }

    public static function kindFromDate(Carbon|string $date): string
    {
        $day = Carbon::parse($date)->dayOfWeek;

        return match ($day) {
            Carbon::TUESDAY => self::KIND_TUESDAY,
            Carbon::THURSDAY => self::KIND_THURSDAY,
            Carbon::SATURDAY => self::KIND_SATURDAY,
            default => self::KIND_TUESDAY,
        };
    }

    public static function kinds(): array
    {
        return [
            self::KIND_TUESDAY => 'Tuesday rehearsal',
            self::KIND_THURSDAY => 'Thursday rehearsal',
            self::KIND_SATURDAY => 'Saturday (special)',
        ];
    }
}
