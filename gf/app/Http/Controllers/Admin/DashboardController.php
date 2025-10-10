<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Member;
use App\Models\Contact;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $trendWindowStart = $now->copy()->subDays(29)->startOfDay();

        $totalEvents = Event::count();

        $upcomingEventsQuery = Event::whereDate('date', '>=', $now->toDateString());
        $upcomingEventsCount = (clone $upcomingEventsQuery)->count();
        $upcomingEventsList = (clone $upcomingEventsQuery)->orderBy('date')->take(8)->get();

        $totalRegistrations = EventRegistration::count();
        $totalMembers = Member::count();
        $totalContacts = Contact::count();

        $recentRegistrations = EventRegistration::with('event')->latest()->take(6)->get();
        $recentMembers = Member::latest()->take(6)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        $unreadContactsCount = Contact::where('is_read', false)->count();

        $trendData = EventRegistration::selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('created_at', '>=', $trendWindowStart)
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        $trendLabels = [];
        $trendTotals = [];

        for ($daysAgo = 29; $daysAgo >= 0; $daysAgo--) {
            $date = $now->copy()->subDays($daysAgo)->startOfDay();
            $dateKey = $date->toDateString();

            $trendLabels[] = $date->format('M d');
            $trendTotals[] = (int) optional($trendData->get($dateKey))->total;
        }

        return view('admin.dashboard', [
            'total_events' => $totalEvents,
            'upcoming_events' => $upcomingEventsCount,
            'total_registrations' => $totalRegistrations,
            'total_members' => $totalMembers,
            'total_contacts' => $totalContacts,
            'recent_registrations' => $recentRegistrations,
            'recent_members' => $recentMembers,
            'recent_contacts' => $recentContacts,
            'upcoming_events_list' => $upcomingEventsList,
            'registrationTrend' => [
                'labels' => $trendLabels,
                'totals' => $trendTotals,
            ],
            'upcoming_events_count' => $upcomingEventsCount,
            'unread_contacts_count' => $unreadContactsCount,
        ]);
    }
}
