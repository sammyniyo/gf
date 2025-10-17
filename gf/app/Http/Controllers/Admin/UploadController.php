<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Handle generic image uploads for editors/forms.
     */
    public function image(Request $request)
    {
        // Support multiple common field names used by editors
        $file = $request->file('image') ?? $request->file('file') ?? $request->file('upload');

        if (!$file) {
            return response()->json([
                'success' => false,
                'message' => 'No image file provided.'
            ], 422);
        }

        $request->validate([
            $file->getClientOriginalName() => 'nullable', // no-op to avoid unknown key
            'max' => 'nullable',
        ]);

        $request->validate([
            // Validate actual file
            'image' => 'nullable|image|max:4096',
            'file' => 'nullable|image|max:4096',
            'upload' => 'nullable|image|max:4096',
        ]);

        $path = $file->store('uploads', 'public');
        $url = Storage::disk('public')->url($path);

        // Standard JSON response { url: ... }
        return response()->json([
            'success' => true,
            'url' => $url,
            'path' => $path,
        ]);
    }
}


