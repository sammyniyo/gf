<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'target_id',
        'month',
        'amount',
        'has_paid',
        'payment_date',
        'payment_method',
        'payment_type',
        'notes',
        'is_recurring',
    ];

    protected $casts = [
        'has_paid' => 'boolean',
        'payment_date' => 'date',
        'amount' => 'decimal:2',
        'is_recurring' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function target()
    {
        return $this->belongsTo(ContributionTarget::class, 'target_id');
    }

    public function scopeMonth($query, $month)
    {
        return $query->where('month', $month);
    }

    public function scopePaid($query)
    {
        return $query->where('has_paid', true);
    }

    public function scopeMonthly($query)
    {
        return $query->where('payment_type', 'monthly');
    }

    public function scopeOneTime($query)
    {
        return $query->where('payment_type', 'one_time');
    }

    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
    }
}


