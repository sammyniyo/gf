<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'event_date',
        'is_featured',
        'is_active',
        'order',
        'uploaded_by',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the user who uploaded the image
     */
    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the full URL for the image
     */
    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image_path);
    }

    /**
     * Scope for active galleries
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured galleries
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get available categories
     */
    public static function getCategories()
    {
        return [
            'events' => 'Events',
            'rehearsals' => 'Rehearsals',
            'concerts' => 'Concerts',
            'worship' => 'Worship',
            'community' => 'Community',
            'outreach' => 'Outreach',
            'backstage' => 'Backstage',
            'other' => 'Other',
        ];
    }

    /**
     * Delete the image file when the gallery item is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($gallery) {
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }
        });
    }
}
