<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveChoristerCommitment extends Model
{
    protected $fillable = [
        'member_id',
        'name',
        'phone',
        'email',
        'voice',
        'language',
        'read_seconds',
        'sections_read',
        'ip_address',
        'user_agent',
        'accepted_at',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
        'read_seconds' => 'integer',
        'sections_read' => 'integer',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
