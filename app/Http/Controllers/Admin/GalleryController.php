<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Gallery::with('uploadedBy')->latest();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status === 'featured') {
                $query->where('is_featured', true);
            }
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $galleries = $query->paginate(20);
        $categories = Gallery::getCategories();

        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Gallery::getCategories();
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:10240', // Max 10MB
            'category' => 'nullable|in:' . implode(',', array_keys(Gallery::getCategories())),
            'event_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ], [
            'image.required' => 'Please select an image to upload.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a JPEG, PNG, WEBP, or GIF file.',
            'image.max' => 'The image size must not exceed 10MB.',
        ]);

        $image = $request->file('image');
        $fileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

        $path = $image->storeAs('gallery', $fileName, 'public');

        Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $path,
            'category' => $validated['category'] ?? null,
            'event_date' => $validated['event_date'] ?? null,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active') ? true : ($request->input('is_active', true)),
            'order' => $validated['order'] ?? 0,
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('uploadedBy');
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $categories = Gallery::getCategories();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'category' => 'nullable|in:' . implode(',', array_keys(Gallery::getCategories())),
            'event_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a JPEG, PNG, WEBP, or GIF file.',
            'image.max' => 'The image size must not exceed 10MB.',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'] ?? null,
            'event_date' => $validated['event_date'] ?? null,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
            'order' => $validated['order'] ?? 0,
        ];

        // Handle image upload if new image provided
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($gallery->image_path);

            $image = $request->file('image');
            $fileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('gallery', $fileName, 'public');

            $data['image_path'] = $path;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image file
        Storage::disk('public')->delete($gallery->image_path);

        // Delete record
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery image deleted successfully!');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Gallery $gallery)
    {
        $gallery->update(['is_featured' => !$gallery->is_featured]);

        return back()->with('success', $gallery->is_featured
            ? 'Image marked as featured!'
            : 'Image removed from featured!');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        return back()->with('success', $gallery->is_active
            ? 'Image activated!'
            : 'Image deactivated!');
    }
}
