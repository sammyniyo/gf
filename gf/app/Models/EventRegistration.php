<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id','name','email','phone','tickets','total_amount','registration_code','status'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
