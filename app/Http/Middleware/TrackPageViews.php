<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;
use Illuminate\Support\Facades\Auth;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Only track GET requests
        if ($request->isMethod('get')) {
            // Don't track admin routes, API routes, or asset requests
            $excludedPaths = [
                'admin/*',
                'api/*',
                'storage/*',
                'build/*',
                'favicon.ico',
                'robots.txt',
            ];

            $shouldTrack = true;
            foreach ($excludedPaths as $pattern) {
                if ($request->is($pattern)) {
                    $shouldTrack = false;
                    break;
                }
            }

            if ($shouldTrack) {
                try {
                    PageView::create([
                        'url' => $request->fullUrl(),
                        'page_title' => $this->getPageTitle($request),
                        'visitor_ip' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'referer' => $request->header('referer'),
                        'user_id' => Auth::id(),
                        'viewed_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    // Fail silently to not break the application
                    \Log::error('Failed to track page view: ' . $e->getMessage());
                }
            }
        }

        return $next($request);
    }

    /**
     * Get a friendly page title from the request.
     */
    private function getPageTitle(Request $request): string
    {
        $path = $request->path();

        $titles = [
            '/' => 'Home',
            'about' => 'About Us',
            'events' => 'Events',
            'contact' => 'Contact Us',
            'devotions' => 'Devotions',
            'stories' => 'Stories',
            'committee' => 'Leadership',
            'member-registration' => 'Join Choir',
        ];

        // Check for exact matches
        if (isset($titles[$path])) {
            return $titles[$path];
        }

        // Check for pattern matches
        if (str_starts_with($path, 'events/')) {
            return 'Event Details';
        }
        if (str_starts_with($path, 'devotions/')) {
            return 'Devotion';
        }
        if (str_starts_with($path, 'stories/')) {
            return 'Story';
        }

        return ucfirst(str_replace('-', ' ', $path));
    }
}
