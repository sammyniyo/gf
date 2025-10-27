<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'meeting_date',
        'location',
        'meeting_link',
        'attendee_type',
        'custom_attendees',
        'email_sent',
        'email_sent_at',
    ];

    protected $casts = [
        'meeting_date' => 'datetime',
        'custom_attendees' => 'array',
        'email_sent' => 'boolean',
        'email_sent_at' => 'datetime',
    ];

    public function attendees()
    {
        return $this->hasMany(MeetingAttendee::class);
    }
}


