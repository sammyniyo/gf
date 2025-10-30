<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\AuditLogger;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Audit: user logged in
        try {
            AuditLogger::login();
        } catch (\Throwable $e) {
            // Do not block login on audit failure
            \Log::warning('Audit log (login) failed: ' . $e->getMessage());
        }

        // Redirect admins directly to admin dashboard
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Audit: user logged out (log before session is cleared)
        try {
            AuditLogger::logout();
        } catch (\Throwable $e) {
            \Log::warning('Audit log (logout) failed: ' . $e->getMessage());
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
