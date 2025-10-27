<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumPurchase;
use App\Services\ZipService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display the shop page with all albums
     */
    public function index()
    {
        $featuredAlbums = Album::active()
            ->featured()
            ->ordered()
            ->get();

        $albums = Album::active()
            ->ordered()
            ->paginate(12);

        return view('shop.index', compact('featuredAlbums', 'albums'));
    }

    /**
     * Display a single album
     */
    public function show(Album $album)
    {
        abort_if(!$album->is_active, 404);

        $relatedAlbums = Album::active()
            ->where('id', '!=', $album->id)
            ->ordered()
            ->limit(4)
            ->get();

        return view('shop.show', compact('album', 'relatedAlbums'));
    }

    /**
     * Show the purchase form for an album
     */
    public function purchase(Album $album)
    {
        abort_if(!$album->is_active, 404);

        return view('shop.purchase', compact('album'));
    }

    /**
     * Process the album purchase
     */
    public function processPurchase(Request $request, Album $album)
    {
        abort_if(!$album->is_active, 404);

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'payment_method' => 'required|in:stripe,paypal,mobile_money,irembopay',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the purchase record
        $purchase = AlbumPurchase::create([
            'album_id' => $album->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'amount' => $album->price,
            'payment_method' => $request->payment_method,
            'payment_status' => $album->isFree() ? 'completed' : 'pending',
        ]);

        // If free album, mark as completed immediately
        if ($album->isFree()) {
            return redirect()->route('shop.download', $purchase->download_code)
                ->with('success', 'Thank you! Your free album is ready for download.');
        }

        // Redirect to payment gateway based on payment method
        switch ($request->payment_method) {
            case 'stripe':
                return redirect()->route('shop.payment.stripe', $purchase->id);
            case 'paypal':
                return redirect()->route('shop.payment.paypal', $purchase->id);
            case 'mobile_money':
                return redirect()->route('shop.payment.mobile', $purchase->id);
            case 'irembopay':
                return redirect()->route('payments.irembopay.initialize', $purchase->id);
            default:
                return back()->with('error', 'Invalid payment method');
        }
    }

    /**
     * Show the download page with download code
     */
    public function download($downloadCode)
    {
        $purchase = AlbumPurchase::where('download_code', $downloadCode)->firstOrFail();

        abort_if(!$purchase->isPaid(), 403, 'Payment not completed yet');
        abort_if(!$purchase->canDownload(), 403, 'Download limit exceeded');

        return view('shop.download', compact('purchase'));
    }

    /**
     * Process the actual download
     */
    public function processDownload($downloadCode)
    {
        $purchase = AlbumPurchase::where('download_code', $downloadCode)->firstOrFail();

        abort_if(!$purchase->isPaid(), 403, 'Payment not completed yet');
        abort_if(!$purchase->canDownload(), 403, 'Download limit exceeded');

        $album = $purchase->album;

        // Increment download count
        $purchase->incrementDownloadCount();

        try {
            // Create ZIP service instance
            $zipService = new ZipService();

            // Get or create the album ZIP file
            $zipPath = $zipService->getOrCreateAlbumZip($album);

            // Generate a clean filename for download
            $cleanTitle = preg_replace('/[^a-zA-Z0-9\s\-_]/', '', $album->title);
            $cleanTitle = str_replace(' ', '_', $cleanTitle);
            $fileName = $cleanTitle . '_Album.zip';

            // Download the ZIP file
            return Storage::download($zipPath, $fileName);

        } catch (\Exception $e) {
            // Fallback to original download method if ZIP creation fails
            \Log::error('ZIP creation failed for album ' . $album->id . ': ' . $e->getMessage());

            // If download link is a URL, redirect to it
            if ($album->download_link && filter_var($album->download_link, FILTER_VALIDATE_URL)) {
                return redirect($album->download_link);
            }

            // If download link is a file path, download the file
            if ($album->download_link && Storage::exists($album->download_link)) {
                return Storage::download($album->download_link, $album->title . '.zip');
            }

            return back()->with('error', 'Download file not available. Please contact support.');
        }
    }

    /**
     * Search albums
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        $albums = Album::active()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->ordered()
            ->paginate(12);

        return view('shop.search', compact('albums', 'query'));
    }

    /**
     * Verify purchase with download code
     */
    public function verifyPurchase(Request $request)
    {
        $request->validate([
            'download_code' => 'required|string',
        ]);

        $purchase = AlbumPurchase::where('download_code', $request->download_code)->first();

        if (!$purchase) {
            return back()->with('error', 'Invalid download code');
        }

        return redirect()->route('shop.download', $purchase->download_code);
    }
}
