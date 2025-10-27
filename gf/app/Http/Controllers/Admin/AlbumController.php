<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of albums
     */
    public function index()
    {
        $albums = Album::orderBy('order')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new album
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created album
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'zip_file' => 'nullable|file|mimes:zip|max:102400', // 100MB max for ZIP files
            'spotify_url' => 'nullable|url',
            'apple_music_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'track_count' => 'nullable|integer|min:0',
            'release_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('albums', 'public');
            $validated['cover_image'] = $path;
        }

        // Handle ZIP file upload
        if ($request->hasFile('zip_file')) {
            $zipPath = $request->file('zip_file')->store('albums/zips', 'public');
            $validated['download_link'] = $zipPath;
        }

        // Set defaults
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Album::create($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album created successfully!');
    }

    /**
     * Show the form for editing an album
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified album
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'zip_file' => 'nullable|file|mimes:zip|max:102400', // 100MB max for ZIP files
            'spotify_url' => 'nullable|url',
            'apple_music_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'track_count' => 'nullable|integer|min:0',
            'release_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image
            if ($album->cover_image) {
                Storage::disk('public')->delete($album->cover_image);
            }
            $path = $request->file('cover_image')->store('albums', 'public');
            $validated['cover_image'] = $path;
        }

        // Handle ZIP file upload
        if ($request->hasFile('zip_file')) {
            // Delete old ZIP file
            if ($album->download_link && Storage::disk('public')->exists($album->download_link)) {
                Storage::disk('public')->delete($album->download_link);
            }
            $zipPath = $request->file('zip_file')->store('albums/zips', 'public');
            $validated['download_link'] = $zipPath;
        }

        // Set defaults
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $album->update($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album updated successfully!');
    }

    /**
     * Remove the specified album
     */
    public function destroy(Album $album)
    {
        // Delete cover image if exists
        if ($album->cover_image) {
            Storage::disk('public')->delete($album->cover_image);
        }

        // Delete ZIP file if exists
        if ($album->download_link && Storage::disk('public')->exists($album->download_link)) {
            Storage::disk('public')->delete($album->download_link);
        }

        $album->delete();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album deleted successfully!');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Album $album)
    {
        $album->update(['is_featured' => !$album->is_featured]);

        return back()->with('success', 'Featured status updated!');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Album $album)
    {
        $album->update(['is_active' => !$album->is_active]);

        return back()->with('success', 'Active status updated!');
    }
}
