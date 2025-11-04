<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Story;
use App\Models\Devotion;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        // Start building the sitemap XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $xml .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        // Static pages
        $staticPages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('about'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('resources.index'), 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => route('stories.index'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('devotions.index'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('events.index'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('committee.index'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('registration.member'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('registration.friendship'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('privacy-policy'), 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['url' => route('terms-of-use'), 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        foreach ($staticPages as $page) {
            try {
                $url = $page['url'] ?? '';
                if (!empty($url)) {
                    $xml .= $this->buildUrlTag($url, $page['priority'], $page['changefreq']);
                }
            } catch (\Exception $e) {
                // Skip routes that don't exist or have issues
                continue;
            }
        }

        // Dynamic pages - Events
        try {
            $events = Event::where('is_public', true)
                ->whereNotNull('start_at')
                ->orderBy('start_at', 'desc')
                ->get();

            foreach ($events as $event) {
                try {
                    $url = route('events.show', $event);
                    $lastmod = $event->updated_at ? $event->updated_at->toAtomString() : $event->created_at->toAtomString();
                    $priority = $event->start_at > now() ? '0.8' : '0.6'; // Higher priority for upcoming events
                    $changefreq = $event->start_at > now() ? 'weekly' : 'monthly';
                    $xml .= $this->buildUrlTag($url, $priority, $changefreq, $lastmod);
                } catch (\Exception $e) {
                    continue;
                }
            }
        } catch (\Exception $e) {
            // Skip if events table doesn't exist or has issues
        }

        // Dynamic pages - Stories
        try {
            $stories = Story::where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($stories as $story) {
                try {
                    $url = route('story.show', $story);
                    $lastmod = $story->updated_at ? $story->updated_at->toAtomString() : $story->created_at->toAtomString();
                    $priority = $story->is_featured ? '0.8' : '0.7';
                    $xml .= $this->buildUrlTag($url, $priority, 'weekly', $lastmod);
                } catch (\Exception $e) {
                    continue;
                }
            }
        } catch (\Exception $e) {
            // Skip if stories table doesn't exist or has issues
        }

        // Dynamic pages - Devotions
        try {
            $devotions = Devotion::where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($devotions as $devotion) {
                try {
                    $url = route('devotions.show', $devotion);
                    $lastmod = $devotion->updated_at ? $devotion->updated_at->toAtomString() : $devotion->created_at->toAtomString();
                    $xml .= $this->buildUrlTag($url, '0.7', 'weekly', $lastmod);
                } catch (\Exception $e) {
                    continue;
                }
            }
        } catch (\Exception $e) {
            // Skip if devotions table doesn't exist or has issues
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    private function buildUrlTag($url, $priority, $changefreq, $lastmod = null)
    {
        $tag = "  <url>\n";
        $tag .= "    <loc>" . htmlspecialchars($url, ENT_XML1) . "</loc>\n";

        if ($lastmod) {
            $tag .= "    <lastmod>" . $lastmod . "</lastmod>\n";
        } else {
            $tag .= "    <lastmod>" . Carbon::now()->toAtomString() . "</lastmod>\n";
        }

        $tag .= "    <changefreq>" . $changefreq . "</changefreq>\n";
        $tag .= "    <priority>" . $priority . "</priority>\n";
        $tag .= "  </url>\n";

        return $tag;
    }
}
