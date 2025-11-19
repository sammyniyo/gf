<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\AuditLogger;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('registrations')->latest()->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|max:2048',
            'capacity' => 'nullable|integer|min:1',
            'is_public' => 'boolean',
            'accept_support' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('events', 'public');
        }

        $validated['is_public'] = $request->boolean('is_public', true);
        $validated['accept_support'] = $request->boolean('accept_support', null);

        $event = Event::create($validated);

        // Audit: event created
        try {
            AuditLogger::created($event);
        } catch (\Throwable $e) {
            \Log::warning('Audit log (event created) failed: ' . $e->getMessage());
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        return redirect()->route('admin.events.edit', $event);
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'location' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|max:2048',
            'capacity' => 'nullable|integer|min:1',
            'is_public' => 'boolean',
            'accept_support' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($event->cover_image) {
                Storage::disk('public')->delete($event->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('events', 'public');
        }

        $validated['is_public'] = $request->boolean('is_public', true);
        $validated['accept_support'] = $request->boolean('accept_support', $event->accept_support);

        $event->update($validated);

        // Audit: event updated
        try {
            AuditLogger::updated($event, [], [], 'Updated event');
        } catch (\Throwable $e) {
            \Log::warning('Audit log (event updated) failed: ' . $e->getMessage());
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->cover_image) {
            Storage::disk('public')->delete($event->cover_image);
        }

        // Audit before delete
        try {
            AuditLogger::deleted($event);
        } catch (\Throwable $e) {
            \Log::warning('Audit log (event deleted) failed: ' . $e->getMessage());
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function registrations(Event $event)
    {
        $registrations = $event->registrations()->with('event')->latest()->paginate(20);
        return view('admin.events.registrations', compact('event', 'registrations'));
    }
}

