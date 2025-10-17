<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Display the utility folder page with all resources
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->get('category', 'all');

        $query = Resource::active()->latest();

        if ($selectedCategory !== 'all') {
            $query->category($selectedCategory);
        }

        $resources = $query->get()->groupBy('category');
        $categories = Resource::getCategories();

        // Get uniforms separately for special showcase
        $uniforms = Resource::active()->category('uniforms')->get();

        return view('resources.index', compact('resources', 'categories', 'selectedCategory', 'uniforms'));
    }

    /**
     * Download a resource
     */
    public function download(Resource $resource)
    {
        // Increment download counter
        $resource->incrementDownloads();

        // Return file download
        return Storage::disk('public')->download(
            $resource->file_path,
            $resource->title . '.' . $resource->file_type
        );
    }

    /**
     * Preview a resource (for PDFs and images)
     */
    public function preview(Resource $resource)
    {
        if ($resource->isPdf() || $resource->isImage()) {
            $filePath = Storage::disk('public')->path($resource->file_path);

            if ($resource->isPdf()) {
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $resource->title . '.pdf"'
                ]);
            } else {
                return response()->file($filePath);
            }
        }

        // If not previewable, redirect to download
        return $this->download($resource);
    }
}
