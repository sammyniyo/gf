<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    /**
     * Display a listing of resources.
     */
    public function index(Request $request)
    {
        $query = Resource::query()->latest();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $resources = $query->paginate(20);
        $categories = Resource::getCategories();

        return view('admin.resources.index', compact('resources', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Resource::getCategories();
        return view('admin.resources.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:' . implode(',', array_keys(Resource::getCategories())),
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,webp|max:20480', // Max 20MB
        ], [
            'file.required' => 'Please select a file to upload.',
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be a PDF, Word document, or image (JPG, PNG, GIF, WEBP).',
            'file.max' => 'The file size must not exceed 20MB.',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs('resources', $fileName, 'public');
        $fileSize = round($file->getSize() / 1024); // Convert to KB

        Resource::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'file_path' => $filePath,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $fileSize,
            'uploaded_by' => auth()->user()->name ?? 'Admin',
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        return view('admin.resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $categories = Resource::getCategories();
        return view('admin.resources.edit', compact('resource', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:' . implode(',', array_keys(Resource::getCategories())),
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,webp|max:20480', // Max 20MB
        ], [
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be a PDF, Word document, or image (JPG, PNG, GIF, WEBP).',
            'file.max' => 'The file size must not exceed 20MB.',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'is_active' => $request->has('is_active'),
        ];

        // Handle file upload if new file provided
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($resource->file_path);

            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('resources', $fileName, 'public');
            $fileSize = round($file->getSize() / 1024);

            $data['file_path'] = $filePath;
            $data['file_type'] = $file->getClientOriginalExtension();
            $data['file_size'] = $fileSize;
        }

        $resource->update($data);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        // Delete file from storage
        Storage::disk('public')->delete($resource->file_path);

        // Delete database record
        $resource->delete();

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource deleted successfully!');
    }

    /**
     * Toggle resource active status.
     */
    public function toggleActive(Resource $resource)
    {
        $resource->update(['is_active' => !$resource->is_active]);

        return back()->with('success', 'Resource status updated!');
    }
}
