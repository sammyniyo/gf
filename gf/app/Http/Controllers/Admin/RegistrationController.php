<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = EventRegistration::with('event')->latest()->paginate(20);
        return view('admin.registrations.index', compact('registrations'));
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

