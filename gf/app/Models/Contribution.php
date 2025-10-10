<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'month',
        'amount',
        'has_paid',
        'payment_date',
        'payment_method',
        'notes',
    ];

    protected $casts = [
        'has_paid' => 'boolean',
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function scopeMonth($query, $month)
    {
        return $query->where('month', $month);
    }

    public function scopePaid($query)
    {
        return $query->where('has_paid', true);
    }
}


