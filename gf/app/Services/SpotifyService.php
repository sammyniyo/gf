<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    private $clientId;
    private $clientSecret;
    private $accessToken;

    public function __construct()
    {
        $this->clientId = config('services.spotify.client_id');
        $this->clientSecret = config('services.spotify.client_secret');
    }

    /**
     * Get access token from Spotify
     */
    private function getAccessToken()
    {
        // Check if we have a cached token
        $cachedToken = Cache::get('spotify_access_token');
        if ($cachedToken) {
            return $cachedToken;
        }

        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $accessToken = $data['access_token'];
            $expiresIn = $data['expires_in'] ?? 3600;

            // Cache the token for slightly less than its expiry time
            Cache::put('spotify_access_token', $accessToken, $expiresIn - 60);

            return $accessToken;
        }

        throw new \Exception('Failed to get Spotify access token');
    }

    /**
     * Search for tracks by artist name
     */
    public function searchTracks($artistName, $limit = 10)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.spotify.com/v1/search', [
                'q' => 'artist:"' . $artistName . '"',
                'type' => 'track',
                'limit' => $limit,
                'market' => 'US'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            \Log::error('Spotify API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get artist's top tracks
     */
    public function getArtistTopTracks($artistId, $limit = 5)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/artists/{$artistId}/top-tracks", [
                'market' => 'US'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return array_slice($data['tracks'] ?? [], 0, $limit);
            }

            return [];
        } catch (\Exception $e) {
            \Log::error('Spotify API Error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Search for an artist
     */
    public function searchArtist($artistName)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.spotify.com/v1/search', [
                'q' => $artistName,
                'type' => 'artist',
                'limit' => 1,
                'market' => 'US'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['artists']['items'][0] ?? null;
            }

            return null;
        } catch (\Exception $e) {
            \Log::error('Spotify API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get featured tracks for the homepage
     */
    public function getFeaturedTracks()
    {
        try {
            $accessToken = $this->getAccessToken();

            // Use God's Family Choir specific artist ID
            $artistId = '6qAFmjsmVuuXZEwzrIYy5J';

            $tracks = $this->getArtistTopTracks($artistId, 6);
            if (empty($tracks)) {
                // If the artist ID fails, return null to show fallback message
                return null;
            }

            return [
                'tracks' => [
                    'items' => $tracks
                ]
            ];
        } catch (\Exception $e) {
            \Log::error('Spotify API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get playlist tracks
     */
    public function getPlaylistTracks($playlistId)
    {
        try {
            $accessToken = $this->getAccessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("https://api.spotify.com/v1/playlists/{$playlistId}/tracks");

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            \Log::error('Spotify API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Format track duration from milliseconds to MM:SS
     */
    public function formatDuration($durationMs)
    {
        $seconds = floor($durationMs / 1000);
        $minutes = floor($seconds / 60);
        $seconds = $seconds % 60;

        return sprintf('%d:%02d', $minutes, $seconds);
    }

    /**
     * Get track preview URL or fallback to Spotify URL
     */
    public function getTrackUrl($track)
    {
        return $track['preview_url'] ?? $track['external_urls']['spotify'] ?? null;
    }
}
