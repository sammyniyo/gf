<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingAttendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'member_id',
        'email',
        'name',
        'invitation_sent',
        'attended',
    ];

    protected $casts = [
        'invitation_sent' => 'boolean',
        'attended' => 'boolean',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}


