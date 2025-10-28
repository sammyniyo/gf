<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\GlobalSiteSetting;
use Illuminate\Support\Facades\Auth;

class CheckSiteMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $settings = GlobalSiteSetting::getSettings();

        // If site is in coming soon mode
        if ($settings->is_coming_soon) {
            // Allow admin routes and authentication routes
            if ($request->is('admin/*') ||
                $request->is('login') ||
                $request->is('register') ||
                $request->is('password/*') ||
                $request->is('email/verify/*')) {
                return $next($request);
            }

            // Allow logged-in admins to access everything
            if (Auth::check() && Auth::user()->is_admin) {
                return $next($request);
            }

            // Show coming soon page
            return response()->view('pages.site-coming-soon', [
                'settings' => $settings,
            ], 503);
        }

        return $next($request);
    }
}
