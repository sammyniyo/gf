<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockWordPressScans
{
    /**
     * Common WordPress paths that bots scan for
     */
    protected $blockedPaths = [
        'wp-admin',
        'wp-login.php',
        'wp-includes',
        'wp-content',
        'wordpress',
        'wp-config.php',
        'xmlrpc.php',
        'readme.html',
        'license.txt',
        'wp-cron.php',
        'wp-trackback.php',
        'wp-comments-post.php',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = strtolower($request->path());

        // Check if the request path contains any blocked WordPress paths
        foreach ($this->blockedPaths as $blockedPath) {
            if (str_contains($path, $blockedPath)) {
                // Return 403 Forbidden immediately
                return response('', 403);
            }
        }

        return $next($request);
    }
}

