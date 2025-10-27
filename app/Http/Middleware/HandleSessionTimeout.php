<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HandleSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if session is valid and not expired
        if (!$request->session()->isStarted()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Session expired',
                    'message' => 'Your session has expired. Please refresh the page and try again.',
                    'code' => 419
                ], 419);
            }

            return redirect()->back()
                ->with('error', 'Your session has expired. Please refresh the page and try again.')
                ->withInput();
        }

        // Check if session is about to expire (within 5 minutes)
        $lastActivity = $request->session()->get('last_activity', time());
        $sessionLifetime = config('session.lifetime', 120) * 60; // Convert to seconds
        $timeRemaining = $sessionLifetime - (time() - $lastActivity);

        if ($timeRemaining < 300) { // Less than 5 minutes remaining
            $request->session()->put('session_warning', true);
        }

        // Update last activity
        $request->session()->put('last_activity', time());

        return $next($request);
    }
}
