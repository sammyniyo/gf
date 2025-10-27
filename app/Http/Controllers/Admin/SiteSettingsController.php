<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSiteSetting;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    /**
     * Show the site settings form
     */
    public function index()
    {
        $settings = GlobalSiteSetting::getSettings();
        return view('admin.site-settings.index', compact('settings'));
    }

    /**
     * Update site settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'is_coming_soon' => 'in:0,1',
            'coming_soon_title' => 'nullable|string|max:255',
            'coming_soon_message' => 'nullable|string|max:2000',
            'target_date' => 'nullable|date',
            'contact_email' => 'nullable|email|max:255',
        ]);

        // Convert string "0" or "1" to boolean
        $validated['is_coming_soon'] = $request->input('is_coming_soon') === '1';

        $settings = GlobalSiteSetting::getSettings();
        $settings->update($validated);

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site settings updated successfully!');
    }
}
