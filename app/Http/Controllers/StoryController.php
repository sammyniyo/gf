<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of published stories.
     */
    public function index(Request $request)
    {
        $query = Story::with('author')->published();

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->category($request->category);
        }

        // Search
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }

        // Filter by tag
        if ($request->has('tag') && !empty($request->tag)) {
            $query->where('tags', 'like', '%"' . $request->tag . '"%');
        }

        // Sort
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'popular':
                $query->orderBy('views_count', 'desc');
                break;
            case 'liked':
                $query->orderBy('likes_count', 'desc');
                break;
            default:
                $query->latest('published_at');
        }

        $stories = $query->paginate(9);

        // Get featured stories
        $featuredStories = Story::published()->featured()->limit(3)->get();

        // Get popular tags
        $popularTags = $this->getPopularTags();

        // Get categories
        $categories = $this->getCategories();

        return view('stories.index', compact('stories', 'featuredStories', 'popularTags', 'categories'));
    }

    /**
     * Display the specified story.
     */
    public function show(Story $story)
    {
        // Only show published stories to non-admin users
        if ($story->status !== 'published' && !auth()->check()) {
            abort(404);
        }

        // Increment views
        $story->incrementViews();

        // Get related stories
        $relatedStories = $story->getRelatedStories(3);

        return view('stories.show', compact('story', 'relatedStories'));
    }

    /**
     * Like a story.
     */
    public function like(Story $story)
    {
        $story->incrementLikes();

        return response()->json([
            'success' => true,
            'likes' => $story->likes_count
        ]);
    }

    /**
     * Get popular tags.
     */
    private function getPopularTags()
    {
        $stories = Story::published()->whereNotNull('tags')->get();
        $tagCounts = [];

        foreach ($stories as $story) {
            if (is_array($story->tags)) {
                foreach ($story->tags as $tag) {
                    $tagCounts[$tag] = ($tagCounts[$tag] ?? 0) + 1;
                }
            }
        }

        arsort($tagCounts);
        return array_slice($tagCounts, 0, 10, true);
    }

    /**
     * Get categories.
     */
    private function getCategories()
    {
        return [
            'testimony' => 'Testimony',
            'ministry' => 'Ministry Updates',
            'events' => 'Events & Concerts',
            'devotional' => 'Devotional',
            'behind-scenes' => 'Behind the Scenes',
            'community' => 'Community Outreach',
            'training' => 'Training & Development',
            'general' => 'General',
        ];
    }
}
