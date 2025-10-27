<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContributionTarget extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'target_amount',
        'current_amount',
        'start_date',
        'end_date',
        'is_active',
        'is_monthly',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'is_monthly' => 'boolean',
    ];

    /**
     * Get the contributions for this target.
     */
    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class, 'target_id');
    }

    /**
     * Get the progress percentage.
     */
    public function getProgressPercentageAttribute(): float
    {
        if ($this->target_amount <= 0) {
            return 0;
        }

        return round(($this->current_amount / $this->target_amount) * 100, 2);
    }

    /**
     * Get the remaining amount.
     */
    public function getRemainingAmountAttribute(): float
    {
        return max(0, $this->target_amount - $this->current_amount);
    }

    /**
     * Check if target is completed.
     */
    public function getIsCompletedAttribute(): bool
    {
        return $this->current_amount >= $this->target_amount;
    }

    /**
     * Update current amount based on contributions.
     */
    public function updateCurrentAmount(): void
    {
        $this->current_amount = $this->contributions()->sum('amount');
        $this->save();
    }

    /**
     * Scope for active targets.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for monthly targets.
     */
    public function scopeMonthly($query)
    {
        return $query->where('is_monthly', true);
    }

    /**
     * Scope for one-time targets.
     */
    public function scopeOneTime($query)
    {
        return $query->where('is_monthly', false);
    }
}
