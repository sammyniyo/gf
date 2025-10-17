<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'file_path',
        'file_type',
        'file_size',
        'uploaded_by',
        'is_active',
        'downloads',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'downloads' => 'integer',
    ];

    /**
     * Get all available categories with labels
     */
    public static function getCategories()
    {
        return [
            'lyrics' => 'PDF Lyrics',
            'music_sheets' => 'Music Sheets',
            'code_of_conduct' => 'Code of Conduct',
            'announcements' => 'Announcements',
            'uniforms' => 'Uniforms',
            'other' => 'Other Documents',
        ];
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute()
    {
        return self::getCategories()[$this->category] ?? $this->category;
    }

    /**
     * Get file URL
     */
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }

    /**
     * Get formatted file size
     */
    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return 'Unknown';

        $size = $this->file_size;
        if ($size < 1024) {
            return $size . ' KB';
        } elseif ($size < 1048576) {
            return round($size / 1024, 2) . ' MB';
        } else {
            return round($size / 1048576, 2) . ' GB';
        }
    }

    /**
     * Increment download count
     */
    public function incrementDownloads()
    {
        $this->increment('downloads');
    }

    /**
     * Scope for active resources
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for specific category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Check if file is an image
     */
    public function isImage()
    {
        return in_array(strtolower($this->file_type), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    }

    /**
     * Check if file is a PDF
     */
    public function isPdf()
    {
        return strtolower($this->file_type) === 'pdf';
    }
}
