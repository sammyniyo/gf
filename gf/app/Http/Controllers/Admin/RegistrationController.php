<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = EventRegistration::with('event');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('registration_code', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhereHas('event', function ($eventQuery) use ($search) {
                      $eventQuery->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by event
        if ($request->filled('event_id')) {
            $query->where('event_id', $request->get('event_id'));
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->get('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->get('date_to'));
        }

        // Filter by status (if you have status field)
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = ['created_at', 'name', 'email', 'total_amount'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $registrations = $query->paginate(5)->withQueryString();

        // Get events for filter dropdown
        $events = \App\Models\Event::select('id', 'title')->orderBy('title')->get();

        return view('admin.registrations.index', compact('registrations', 'events'));
    }

    public function show(EventRegistration $registration)
    {
        $registration->load('event');
        return view('admin.registrations.show', compact('registration'));
    }

    public function destroy(EventRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted successfully!');
    }

    public function export()
    {
        $registrations = EventRegistration::with('event')->get();

        $filename = 'registrations_' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');

            // Add headers
            fputcsv($file, ['ID', 'Event', 'Name', 'Email', 'Phone', 'Tickets', 'Total Amount', 'Registration Code', 'Created At']);

            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->id,
                    $registration->event->name ?? 'N/A',
                    $registration->name,
                    $registration->email,
                    $registration->phone ?? 'N/A',
                    $registration->tickets,
                    $registration->total_amount ?? 'N/A',
                    $registration->registration_code,
                    $registration->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

