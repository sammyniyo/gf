<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display the main story page.
     */
    public function index()
    {
        $stories = Story::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Get all published stories for category grouping
        $allStories = Story::where('is_published', true)->get();
        $groupedStories = $allStories->groupBy('category');

        return view('story.index', compact('stories', 'groupedStories'));
    }

    /**
     * Display the specified story.
     */
    public function show(Story $story)
    {
        // Get related stories
        $relatedStories = Story::where('is_published', true)
            ->where('id', '!=', $story->id)
            ->where('category', $story->category)
            ->limit(3)
            ->get();

        return view('story.show', compact('story', 'relatedStories'));
    }
}
