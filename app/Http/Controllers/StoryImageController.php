<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryImageController extends Controller
{
    public function index()
    {
        $images = $this->getStoryImages();
        return view('admin.story-images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'chapter' => 'required|string|in:humble-beginnings,growth-years,ministry-expansion,present-day'
        ]);

        $image = $request->file('image');
        $filename = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();

        // Store in public/storage/story-images
        $path = $image->storeAs('story-images', $filename, 'public');

        // Save image metadata
        $this->saveImageMetadata([
            'filename' => $filename,
            'path' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'chapter' => $request->chapter,
            'uploaded_at' => now()->toISOString()
        ]);

        return redirect()->route('admin.story-images.index')
            ->with('success', 'Story image uploaded successfully!');
    }

    public function destroy(Request $request, $filename)
    {
        // Remove from storage
        Storage::disk('public')->delete('story-images/' . $filename);

        // Remove from metadata
        $this->removeImageMetadata($filename);

        return redirect()->route('admin.story-images.index')
            ->with('success', 'Story image deleted successfully!');
    }

    private function getStoryImages()
    {
        $metadataFile = storage_path('app/story-images-metadata.json');

        if (!file_exists($metadataFile)) {
            return [];
        }

        $metadata = json_decode(file_get_contents($metadataFile), true);

        // Sort by uploaded date (newest first)
        usort($metadata, function($a, $b) {
            return strtotime($b['uploaded_at']) - strtotime($a['uploaded_at']);
        });

        return $metadata;
    }

    private function saveImageMetadata($metadata)
    {
        $metadataFile = storage_path('app/story-images-metadata.json');
        $existingMetadata = [];

        if (file_exists($metadataFile)) {
            $existingMetadata = json_decode(file_get_contents($metadataFile), true) ?: [];
        }

        $existingMetadata[] = $metadata;

        file_put_contents($metadataFile, json_encode($existingMetadata, JSON_PRETTY_PRINT));
    }

    private function removeImageMetadata($filename)
    {
        $metadataFile = storage_path('app/story-images-metadata.json');

        if (!file_exists($metadataFile)) {
            return;
        }

        $metadata = json_decode(file_get_contents($metadataFile), true) ?: [];
        $metadata = array_filter($metadata, function($item) use ($filename) {
            return $item['filename'] !== $filename;
        });

        file_put_contents($metadataFile, json_encode(array_values($metadata), JSON_PRETTY_PRINT));
    }
}
