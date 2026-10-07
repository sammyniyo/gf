<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RehearsalAttendance extends Model
{
    public const PRESENT = 'present';
    public const ABSENT = 'absent';
    public const LATE = 'late';
    public const EXCUSED = 'excused';

    protected $fillable = [
        'rehearsal_id',
        'member_id',
        'status',
        'note',
        'marked_by',
    ];

    public function rehearsal(): BelongsTo
    {
        return $this->belongsTo(Rehearsal::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function markedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'marked_by');
    }

    public static function statuses(): array
    {
        return [
            self::PRESENT => 'Present',
            self::LATE => 'Late',
            self::EXCUSED => 'Excused',
            self::ABSENT => 'Absent',
        ];
    }
}
