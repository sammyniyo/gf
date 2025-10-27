<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'category',
        'tags',
        'reading_time',
        'views_count',
        'likes_count',
        'author_id',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
        'allow_comments',
        'comment_count',
        'event_date',
        'location',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'event_date' => 'date',
        'tags' => 'array',
        'meta_keywords' => 'array',
        'is_featured' => 'boolean',
        'allow_comments' => 'boolean',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($story) {
            if (empty($story->slug)) {
                $story->slug = Str::slug($story->title);
            }

            // Auto-calculate reading time if content exists
            if ($story->content) {
                $story->reading_time = $story->calculateReadingTime($story->content);
            }
        });

        static::updating(function ($story) {
            // Update slug if title changed
            if ($story->isDirty('title') && empty($story->slug)) {
                $story->slug = Str::slug($story->title);
            }

            // Recalculate reading time if content changed
            if ($story->isDirty('content')) {
                $story->reading_time = $story->calculateReadingTime($story->content);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relationship: Author
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Scope: Published stories
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope: Featured stories
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: By category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope: Search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%");
        });
    }

    /**
     * Get the excerpt or generate one from content.
     */
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return Str::limit(strip_tags($this->content), 200);
    }

    /**
     * Calculate reading time in minutes.
     */
    public function calculateReadingTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200); // Average reading speed: 200 words per minute

        return max(1, $minutes); // Minimum 1 minute
    }

    /**
     * Increment views count.
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Increment likes count.
     */
    public function incrementLikes()
    {
        $this->increment('likes_count');
    }

    /**
     * Get formatted reading time.
     */
    public function getFormattedReadingTimeAttribute()
    {
        return $this->reading_time . ' min read';
    }

    /**
     * Get related stories.
     */
    public function getRelatedStories($limit = 3)
    {
        return static::published()
                     ->where('id', '!=', $this->id)
                     ->where('category', $this->category)
                     ->latest('published_at')
                     ->limit($limit)
                     ->get();
    }
}
