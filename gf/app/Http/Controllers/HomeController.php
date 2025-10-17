<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\SpotifyService;

class HomeController extends Controller
{
    public function index()
    {
        // Get the next upcoming public event
        $nextEvent = Event::where('is_public', true)
            ->where('start_at', '>', now())
            ->orderBy('start_at', 'asc')
            ->first();

        // Get Spotify tracks
        $spotifyTracks = null;
        try {
            $spotifyService = new SpotifyService();
            $spotifyTracks = $spotifyService->getFeaturedTracks();
        } catch (\Exception $e) {
            \Log::info('Spotify API not configured or failed: ' . $e->getMessage());
        }

        return view('home', compact('nextEvent', 'spotifyTracks'));
    }
    public function about()
    {
        return view('about');
    }
    public function story()
    {
        return view('story');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function showMemberForm()
    {
        return view('member-registration');
    }
    public function contact()
    {
        return view('contact');
    }
}
