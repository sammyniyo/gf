<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'url',
        'page_title',
        'visitor_ip',
        'user_agent',
        'referer',
        'user_id',
        'viewed_at',
        'is_suspicious',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
        'is_suspicious' => 'boolean',
    ];

    /**
     * Get the user that viewed the page.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get total page views.
     */
    public static function getTotalViews()
    {
        return static::count();
    }

    /**
     * Get unique visitors count.
     */
    public static function getUniqueVisitors()
    {
        return static::distinct('visitor_ip')->count('visitor_ip');
    }

    /**
     * Get views for today.
     */
    public static function getTodayViews()
    {
        return static::whereDate('viewed_at', Carbon::today())->count();
    }

    /**
     * Get views for this week.
     */
    public static function getWeekViews()
    {
        return static::whereBetween('viewed_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
    }

    /**
     * Get views for this month.
     */
    public static function getMonthViews()
    {
        return static::whereMonth('viewed_at', Carbon::now()->month)
                     ->whereYear('viewed_at', Carbon::now()->year)
                     ->count();
    }

    /**
     * Get most popular pages.
     */
    public static function getPopularPages($limit = 10)
    {
        return static::select('url', 'page_title', DB::raw('COUNT(*) as views_count'))
                     ->groupBy('url', 'page_title')
                     ->orderByDesc('views_count')
                     ->limit($limit)
                     ->get();
    }

    /**
     * Get daily views for chart (last 30 days).
     */
    public static function getDailyViews($days = 30)
    {
        $startDate = Carbon::now()->subDays($days - 1)->startOfDay();

        $views = static::select(
            DB::raw('DATE(viewed_at) as date'),
            DB::raw('COUNT(*) as count')
        )
        ->where('viewed_at', '>=', $startDate)
        ->groupBy('date')
        ->orderBy('date')
        ->get()
        ->keyBy('date');

        $labels = [];
        $data = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateKey = $date->toDateString();
            $labels[] = $date->format('M d');
            $data[] = isset($views[$dateKey]) ? (int) $views[$dateKey]->count : 0;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    /**
     * Check if a URL is suspicious (security scanning, bots, etc.)
     */
    public static function isSuspiciousUrl(string $url): bool
    {
        $url = strtolower($url);

        // Common security scanning patterns
        $suspiciousPatterns = [
            // WordPress
            '/wp-admin/',
            '/wp-login\.php',
            '/wp-includes/',
            '/wp-content/',
            '/wordpress/',
            '/wp-config\.php',
            '/xmlrpc\.php',

            // Laravel/PHP
            '/\.env',
            '/\.env\.old',
            '/\.env\.backup',
            '/config/\.env',
            '/modules/\.env',
            '/core/\.env',
            '/vendor/\.env',
            '/phpinfo\.php',
            '/info\.php',
            '/test\.php',
            '/shell\.php',

            // Common exploit attempts
            '/admin/',
            '/administrator/',
            '/phpmyadmin/',
            '/mysql/',
            '/database/',
            '/sql/',
            '/backup/',
            '/backups/',

            // Sensitive files
            '/\.git/',
            '/\.svn/',
            '/\.htaccess',
            '/\.htpasswd',
            '/composer\.json',
            '/package\.json',
            '/\.gitignore',

            // CMS-specific
            '/administrator/',
            '/joomla/',
            '/drupal/',
            '/cpanel/',
            '/plesk/',

            // API scanning
            '/api/v1/',
            '/api/user',
            '/graphql',

            // Other suspicious patterns
            '/setup-config\.php',
            '/readme\.html',
            '/license\.txt',
            '/\.well-known/',
        ];

        foreach ($suspiciousPatterns as $pattern) {
            if (preg_match($pattern, $url)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user agent is suspicious
     */
    public static function isSuspiciousUserAgent(?string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true; // No user agent is suspicious
        }

        $ua = strtolower($userAgent);

        // Common bot/scanner user agents
        $suspiciousPatterns = [
            'bot', 'spider', 'crawl', 'slurp', 'wget', 'curl',
            'httpclient', 'libwww', 'headless', 'phantom',
            'scanner', 'scan', 'hack', 'exploit', 'sqlmap',
            'nikto', 'masscan', 'nmap', 'dirbuster', 'gobuster',
            'python-requests', 'java/', 'go-http-client',
            'zgrab', 'masscan', 'nessus', 'openvas'
        ];

        foreach ($suspiciousPatterns as $pattern) {
            if (str_contains($ua, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Scope to get suspicious page views
     */
    public function scopeSuspicious($query)
    {
        return $query->where('is_suspicious', true);
    }

    /**
     * Scope to get safe (non-suspicious) page views
     */
    public function scopeSafe($query)
    {
        return $query->where('is_suspicious', false);
    }
}
