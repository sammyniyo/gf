<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Member;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_events' => Event::count(),
            'upcoming_events' => Event::where('date', '>=', now())->count(),
            'total_registrations' => EventRegistration::count(),
            'total_members' => Member::count(),
            'total_contacts' => Contact::count(),
            'recent_registrations' => EventRegistration::with(['event'])->latest()->take(5)->get(),
            'recent_members' => Member::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $stats);
    }
}

