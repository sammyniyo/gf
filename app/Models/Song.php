<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'composer',
        'arranger',
        'genre',
        'album',
        'type',
        'audio_file',
        'sheet_music',
        'duration_seconds',
        'lyrics',
        'key_signature',
        'tempo',
        'difficulty',
        'is_featured',
        'is_published',
        'plays_count',
    ];

    protected $casts = [
        'duration_seconds' => 'integer',
        'tempo' => 'integer',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'plays_count' => 'integer',
    ];

    /**
     * Get the audio file URL.
     */
    public function getAudioUrlAttribute(): ?string
    {
        return $this->audio_file ? Storage::url($this->audio_file) : null;
    }

    /**
     * Get the sheet music URL.
     */
    public function getSheetMusicUrlAttribute(): ?string
    {
        return $this->sheet_music ? Storage::url($this->sheet_music) : null;
    }

    /**
     * Get formatted duration.
     */
    public function getFormattedDurationAttribute(): string
    {
        if (!$this->duration_seconds) {
            return 'Unknown';
        }

        $minutes = floor($this->duration_seconds / 60);
        $seconds = $this->duration_seconds % 60;

        return sprintf('%d:%02d', $minutes, $seconds);
    }

    /**
     * Increment play count.
     */
    public function incrementPlayCount(): void
    {
        $this->increment('plays_count');
    }

    /**
     * Scope for published songs.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for featured songs.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for vocal songs.
     */
    public function scopeVocal($query)
    {
        return $query->where('type', 'vocal');
    }

    /**
     * Scope for instrumental songs.
     */
    public function scopeInstrumental($query)
    {
        return $query->where('type', 'instrumental');
    }

    /**
     * Scope by difficulty.
     */
    public function scopeByDifficulty($query, $difficulty)
    {
        return $query->where('difficulty', $difficulty);
    }

    /**
     * Get the album this song belongs to
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'album', 'title');
    }

    /**
     * Scope by genre.
     */
    public function scopeByGenre($query, $genre)
    {
        return $query->where('genre', $genre);
    }
}
