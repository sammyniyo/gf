<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the public gallery page
     */
    public function index()
    {
        $galleries = Gallery::active()
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Gallery::getCategories();

        // Prepare gallery data for JavaScript
        $galleryData = $galleries->map(function($gallery) use ($categories) {
            return [
                'url' => $gallery->image_url,
                'title' => $gallery->title,
                'description' => $gallery->description,
                'category' => $gallery->category ? ($categories[$gallery->category] ?? $gallery->category) : null,
                'date' => $gallery->event_date ? $gallery->event_date->format('F d, Y') : null,
            ];
        });

        return view('gallery', compact('galleries', 'categories', 'galleryData'));
    }
}
