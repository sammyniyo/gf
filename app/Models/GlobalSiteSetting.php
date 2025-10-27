<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_coming_soon',
        'coming_soon_title',
        'coming_soon_message',
        'target_date',
        'contact_email',
    ];

    protected $casts = [
        'is_coming_soon' => 'boolean',
        'target_date' => 'date',
    ];

    /**
     * Get or create the singleton instance
     */
    public static function getSettings()
    {
        return static::first() ?? static::create([
            'is_coming_soon' => false,
            'coming_soon_title' => 'Coming Soon',
            'coming_soon_message' => 'We\'re working hard to launch something amazing. Check back soon!',
        ]);
    }
}
