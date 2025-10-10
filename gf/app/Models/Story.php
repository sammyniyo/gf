<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'category',
        'featured_image',
        'is_published',
        'published_at',
        'event_date',
        'location',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'event_date' => 'date',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include published stories.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Get the excerpt or generate one from content.
     */
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return \Str::limit(strip_tags($this->content), 200);
    }
}
