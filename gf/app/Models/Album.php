<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'price',
        'spotify_url',
        'apple_music_url',
        'youtube_url',
        'download_link',
        'track_count',
        'release_date',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'release_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'track_count' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Get all purchases for this album
     */
    public function purchases()
    {
        return $this->hasMany(AlbumPurchase::class);
    }

    /**
     * Get the album cover image URL
     */
    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image) {
            return Storage::url($this->cover_image);
        }
        return asset('images/default-album-cover.jpg');
    }

    /**
     * Check if the album is free
     */
    public function isFree()
    {
        return $this->price == 0;
    }

    /**
     * Scope to get only active albums
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only featured albums
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to order albums by custom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }
}
