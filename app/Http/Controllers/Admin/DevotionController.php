<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DevotionController extends Controller
{
    public function index()
    {
        $devotions = Devotion::orderByDesc('created_at')->paginate(15);
        return view('admin.devotions.index', compact('devotions'));
    }

    public function create()
    {
        return view('admin.devotions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scripture_reference' => 'nullable|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ]);

        // Ensure unique slug
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Devotion::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        Devotion::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'excerpt' => $validated['excerpt'] ?? null,
            'scripture_reference' => $validated['scripture_reference'] ?? null,
            'author' => Auth::user()->name ?? null,
            'category' => $validated['category'] ?? 'general',
            'is_published' => (bool)($validated['is_published'] ?? (!empty($validated['published_at']))),
            'published_at' => $validated['published_at'] ?? null,
        ]);
        return redirect()->route('admin.devotions.index')->with('success', 'Devotion created successfully');
    }

    public function edit(Devotion $devotion)
    {
        return view('admin.devotions.edit', compact('devotion'));
    }

    public function update(Request $request, Devotion $devotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scripture_reference' => 'nullable|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ]);

        // Update slug if title changes
        if ($devotion->title !== $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $counter = 1;
            while (Devotion::where('slug', $slug)->where('id', '!=', $devotion->id)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $devotion->slug = $slug;
        }

        $devotion->title = $validated['title'];
        $devotion->content = $validated['content'];
        $devotion->excerpt = $validated['excerpt'] ?? null;
        $devotion->scripture_reference = $validated['scripture_reference'] ?? null;
        $devotion->category = $validated['category'] ?? $devotion->category;
        $devotion->is_published = (bool)($validated['is_published'] ?? (!empty($validated['published_at']) || $devotion->is_published));
        $devotion->published_at = $validated['published_at'] ?? $devotion->published_at;
        $devotion->save();

        return redirect()->route('admin.devotions.index')->with('success', 'Devotion updated successfully');
    }

    public function destroy(Devotion $devotion)
    {
        $devotion->delete();
        return redirect()->route('admin.devotions.index')->with('success', 'Devotion deleted');
    }
}


