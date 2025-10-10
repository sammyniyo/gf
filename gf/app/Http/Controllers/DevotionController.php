<?php

namespace App\Http\Controllers;

use App\Models\Devotion;
use Illuminate\Http\Request;

class DevotionController extends Controller
{
    /**
     * Display a listing of devotions.
     */
    public function index()
    {
        $devotions = Devotion::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('devotions.index', compact('devotions'));
    }

    /**
     * Display the specified devotion.
     */
    public function show(Devotion $devotion)
    {
        // Get related devotions (same category or recent ones)
        $relatedDevotions = Devotion::where('is_published', true)
            ->where('id', '!=', $devotion->id)
            ->where(function($query) use ($devotion) {
                $query->where('category', $devotion->category)
                      ->orWhere('created_at', '>=', now()->subDays(30));
            })
            ->limit(3)
            ->get();

        return view('devotions.show', compact('devotion', 'relatedDevotions'));
    }
}
