<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSettings;
use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    /**
     * Display a listing of page settings
     */
    public function index()
    {
        $pageSettings = PageSettings::orderBy('page_name')->get();
        return view('admin.page-settings.index', compact('pageSettings'));
    }

    /**
     * Show the form for editing page settings
     */
    public function edit(PageSettings $pageSetting)
    {
        return view('admin.page-settings.edit', compact('pageSetting'));
    }

    /**
     * Update page settings
     */
    public function update(Request $request, PageSettings $pageSetting)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,coming_soon,maintenance,locked',
            'custom_message' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:50',
            'is_enabled' => 'in:0,1',
        ]);

        // Convert string "0" or "1" to boolean
        $validated['is_enabled'] = $request->input('is_enabled') === '1';
        $pageSetting->update($validated);

        return redirect()->route('admin.page-settings.index')
            ->with('success', 'Page settings updated successfully!');
    }

    /**
     * Bulk update page settings
     */
    public function bulkUpdate(Request $request)
    {
        $requests = $request->input('pages', []);

        foreach ($requests as $pageId => $data) {
            $pageSetting = PageSettings::findOrFail($pageId);

            $pageSetting->update([
                'status' => $data['status'] ?? 'active',
                'is_enabled' => isset($data['is_enabled']),
            ]);
        }

        return redirect()->route('admin.page-settings.index')
            ->with('success', 'Page settings updated successfully!');
    }
}

