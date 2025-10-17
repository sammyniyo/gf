<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Display a listing of stories.
     */
    public function index(Request $request)
    {
        $query = Story::with('author')->latest();

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        // Search
        if ($request->has('search') && !empty($request->search)) {
            $query->search($request->search);
        }

        $stories = $query->paginate(15);
        $categories = $this->getCategories();

        return view('admin.stories.index', compact('stories', 'categories'));
    }

    /**
     * Show the form for creating a new story.
     */
    public function create()
    {
        $categories = $this->getCategories();
        $authors = User::where('is_admin', true)->get();

        return view('admin.stories.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created story in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:stories,slug',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('stories/featured-images', 'public');
        }

        // Process tags
        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        // Process meta keywords
        if ($request->meta_keywords) {
            $validated['meta_keywords'] = array_map('trim', explode(',', $request->meta_keywords));
        }

        // Set author
        $validated['author_id'] = Auth::id();

        // Auto-publish if status is published and no publish date set
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Create slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $story = Story::create($validated);

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story created successfully!');
    }

    /**
     * Show the form for editing the specified story.
     */
    public function edit(Story $story)
    {
        $categories = $this->getCategories();
        $authors = User::where('is_admin', true)->get();

        return view('admin.stories.edit', compact('story', 'categories', 'authors'));
    }

    /**
     * Update the specified story in storage.
     */
    public function update(Request $request, Story $story)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:stories,slug,' . $story->id,
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string',
            'tags' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($story->featured_image) {
                Storage::disk('public')->delete($story->featured_image);
            }

            $validated['featured_image'] = $request->file('featured_image')
                ->store('stories/featured-images', 'public');
        }

        // Process tags
        if ($request->has('tags')) {
            $validated['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        }

        // Process meta keywords
        if ($request->has('meta_keywords')) {
            $validated['meta_keywords'] = $request->meta_keywords ? array_map('trim', explode(',', $request->meta_keywords)) : [];
        }

        // Handle checkboxes
        $validated['is_featured'] = $request->has('is_featured');
        $validated['allow_comments'] = $request->has('allow_comments');

        // Auto-publish if status changed to published and no publish date set
        if ($validated['status'] === 'published' && empty($story->published_at) && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $story->update($validated);

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story updated successfully!');
    }

    /**
     * Remove the specified story from storage.
     */
    public function destroy(Story $story)
    {
        // Delete featured image
        if ($story->featured_image) {
            Storage::disk('public')->delete($story->featured_image);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')
            ->with('success', 'Story deleted successfully!');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Story $story)
    {
        $story->update(['is_featured' => !$story->is_featured]);

        return back()->with('success', 'Featured status updated!');
    }

    /**
     * Get available categories.
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
