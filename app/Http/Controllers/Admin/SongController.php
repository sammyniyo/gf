<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index(Request $request)
    {
        $query = Song::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('composer', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by difficulty
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === '1');
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        if (in_array($sortBy, ['title', 'composer', 'plays_count', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $songs = $query->paginate(12)->withQueryString();

        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        return view('admin.songs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'album' => 'nullable|string|max:255',
            'type' => 'required|in:vocal,instrumental',
            'audio_file' => 'nullable|file|mimes:mp3,wav,ogg|max:10240', // 10MB max
            'sheet_music' => 'nullable|file|mimes:pdf|max:5120', // 5MB max
            'duration_seconds' => 'nullable|integer|min:1',
            'lyrics' => 'nullable|string',
            'key_signature' => 'nullable|string|max:10',
            'tempo' => 'nullable|integer|min:1|max:300',
            'difficulty' => 'required|in:beginner,intermediate,advanced,expert',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('audio_file')) {
            $audioFile = $request->file('audio_file');
            $audioName = time() . '_' . $audioFile->getClientOriginalName();
            $data['audio_file'] = $audioFile->storeAs('public/songs/audio', $audioName);
        }

        if ($request->hasFile('sheet_music')) {
            $sheetFile = $request->file('sheet_music');
            $sheetName = time() . '_' . $sheetFile->getClientOriginalName();
            $data['sheet_music'] = $sheetFile->storeAs('public/songs/sheets', $sheetName);
        }

        $data['is_featured'] = $request->has('is_featured');
        $data['is_published'] = $request->has('is_published');
        $data['plays_count'] = 0;

        Song::create($data);

        return redirect()->route('admin.songs.index')
            ->with('success', 'Song created successfully!');
    }

    public function show(Song $song)
    {
        $song->incrementPlayCount();
        return view('admin.songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        return view('admin.songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'composer' => 'nullable|string|max:255',
            'arranger' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'album' => 'nullable|string|max:255',
            'type' => 'required|in:vocal,instrumental',
            'audio_file' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'sheet_music' => 'nullable|file|mimes:pdf|max:5120',
            'duration_seconds' => 'nullable|integer|min:1',
            'lyrics' => 'nullable|string',
            'key_signature' => 'nullable|string|max:10',
            'tempo' => 'nullable|integer|min:1|max:300',
            'difficulty' => 'required|in:beginner,intermediate,advanced,expert',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('audio_file')) {
            // Delete old file
            if ($song->audio_file) {
                Storage::delete($song->audio_file);
            }

            $audioFile = $request->file('audio_file');
            $audioName = time() . '_' . $audioFile->getClientOriginalName();
            $data['audio_file'] = $audioFile->storeAs('public/songs/audio', $audioName);
        }

        if ($request->hasFile('sheet_music')) {
            // Delete old file
            if ($song->sheet_music) {
                Storage::delete($song->sheet_music);
            }

            $sheetFile = $request->file('sheet_music');
            $sheetName = time() . '_' . $sheetFile->getClientOriginalName();
            $data['sheet_music'] = $sheetFile->storeAs('public/songs/sheets', $sheetName);
        }

        $data['is_featured'] = $request->has('is_featured');
        $data['is_published'] = $request->has('is_published');

        $song->update($data);

        return redirect()->route('admin.songs.index')
            ->with('success', 'Song updated successfully!');
    }

    public function destroy(Song $song)
    {
        // Delete files
        if ($song->audio_file) {
            Storage::delete($song->audio_file);
        }
        if ($song->sheet_music) {
            Storage::delete($song->sheet_music);
        }

        $song->delete();

        return redirect()->route('admin.songs.index')
            ->with('success', 'Song deleted successfully!');
    }

    public function toggleFeatured(Song $song)
    {
        $song->update(['is_featured' => !$song->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $song->is_featured
        ]);
    }
}
