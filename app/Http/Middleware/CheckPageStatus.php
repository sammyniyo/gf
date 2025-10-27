<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageSettings;
use Illuminate\Support\Facades\Auth;

class CheckPageStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $pageIdentifier
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $pageIdentifier)
    {
        $pageSetting = PageSettings::where('page_identifier', $pageIdentifier)->first();

        // If no setting exists, proceed (page doesn't have status management)
        if (!$pageSetting) {
            return $next($request);
        }

        // Allow admins to always access (for testing/managing)
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Check if page is accessible (enabled and active status)
        if ($pageSetting->isAccessible()) {
            return $next($request);
        }

        // Return the appropriate status view based on status
        $status = $pageSetting->status;
        $viewName = "pages.status.{$status}";

        return response()->view($viewName, [
            'pageSetting' => $pageSetting,
            'pageName' => $pageSetting->page_name,
            'customMessage' => $pageSetting->custom_message,
        ], 503);
    }
}

