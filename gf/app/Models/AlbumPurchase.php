<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AlbumPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_status',
        'payment_details',
        'download_code',
        'download_count',
        'max_downloads',
        'downloaded_at',
        'irembo_invoice_id',
        'irembo_reference',
        'irembo_payment_details',
        'payment_processed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'download_count' => 'integer',
        'max_downloads' => 'integer',
        'downloaded_at' => 'datetime',
        'payment_details' => 'array',
        'irembo_payment_details' => 'array',
        'payment_processed_at' => 'datetime',
    ];

    /**
     * Boot the model and generate download code
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($purchase) {
            if (empty($purchase->download_code)) {
                $purchase->download_code = strtoupper(Str::random(16));
            }
        });
    }

    /**
     * Get the album for this purchase
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Check if the purchase can still be downloaded
     */
    public function canDownload()
    {
        return $this->download_count < $this->max_downloads;
    }

    /**
     * Check if payment is completed
     */
    public function isPaid()
    {
        return $this->payment_status === 'completed';
    }

    /**
     * Increment download count
     */
    public function incrementDownloadCount()
    {
        $this->increment('download_count');
        if ($this->download_count === 1) {
            $this->update(['downloaded_at' => now()]);
        }
    }

    /**
     * Scope to get completed purchases
     */
    public function scopeCompleted($query)
    {
        return $query->where('payment_status', 'completed');
    }

    /**
     * Scope to get pending purchases
     */
    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }
}
