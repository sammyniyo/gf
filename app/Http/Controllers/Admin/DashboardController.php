<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Member;
use App\Models\Contact;
use App\Models\Contribution;
use App\Models\ContributionTarget;
use App\Models\Song;
use App\Models\PageView;
use App\Mail\BirthdayWishEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $trendWindowStart = $now->copy()->subDays(29)->startOfDay();

        $totalEvents = Event::count();

        $upcomingEventsQuery = Event::whereDate('start_at', '>=', $now->toDateString());
        $upcomingEventsCount = (clone $upcomingEventsQuery)->count();
        $upcomingEventsList = (clone $upcomingEventsQuery)->orderBy('start_at')->take(8)->get();

        $totalRegistrations = EventRegistration::count();
        $totalMembers = Member::count();
        $totalContacts = Contact::count();
        $totalContributions = Contribution::count();
        $totalSongs = Song::count();

        // Contribution analytics
        $totalContributionAmount = Contribution::sum('amount');
        $paidContributionAmount = Contribution::paid()->sum('amount');
        $pendingContributionAmount = Contribution::where('has_paid', false)->sum('amount');

        // Active contribution targets
        $activeTargets = ContributionTarget::active()->get();
        $targetsProgress = $activeTargets->map(function($target) {
            return [
                'name' => $target->name,
                'type' => $target->type,
                'target_amount' => $target->target_amount,
                'current_amount' => $target->current_amount,
                'progress_percentage' => $target->progress_percentage,
                'remaining_amount' => $target->remaining_amount,
                'is_completed' => $target->is_completed,
            ];
        });

        // Featured songs
        $featuredSongs = Song::published()->featured()->take(4)->get();
        $recentSongs = Song::published()->latest()->take(3)->get();

        // Page view analytics
        $totalPageViews = PageView::getTotalViews();
        $uniqueVisitors = PageView::getUniqueVisitors();
        $todayViews = PageView::getTodayViews();
        $weekViews = PageView::getWeekViews();
        $monthViews = PageView::getMonthViews();
        $popularPages = PageView::getPopularPages(5);
        $pageViewTrend = PageView::getDailyViews(30);

        $recentRegistrations = EventRegistration::with('event')->latest()->take(6)->get();
        $recentMembers = Member::latest()->take(6)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        $unreadContactsCount = Contact::where('is_read', false)->count();

        // Birthday data
        $today = Carbon::today();
        $birthdaysToday = Member::whereNotNull('birthdate')
            ->whereRaw('MONTH(birthdate) = ?', [$today->month])
            ->whereRaw('DAY(birthdate) = ?', [$today->day])
            ->get();

        $birthdaysThisWeek = Member::whereNotNull('birthdate')
            ->get()
            ->filter(function ($member) use ($today) {
                $birthdate = Carbon::parse($member->birthdate);
                $birthdayThisYear = Carbon::create($today->year, $birthdate->month, $birthdate->day);
                return $birthdayThisYear->between($today, $today->copy()->addDays(7));
            })
            ->sortBy(function ($member) use ($today) {
                $birthdate = Carbon::parse($member->birthdate);
                $birthdayThisYear = Carbon::create($today->year, $birthdate->month, $birthdate->day);
                return $birthdayThisYear->format('md');
            })
            ->values();

        $birthdaysThisMonth = Member::whereNotNull('birthdate')
            ->whereRaw('MONTH(birthdate) = ?', [$today->month])
            ->orderByRaw('DAY(birthdate)')
            ->get();

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
            'total_contributions' => $totalContributions,
            'total_songs' => $totalSongs,
            'total_contribution_amount' => $totalContributionAmount,
            'paid_contribution_amount' => $paidContributionAmount,
            'pending_contribution_amount' => $pendingContributionAmount,
            'targets_progress' => $targetsProgress,
            'featured_songs' => $featuredSongs,
            'recent_songs' => $recentSongs,
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
            // Page view analytics
            'total_page_views' => $totalPageViews,
            'unique_visitors' => $uniqueVisitors,
            'today_views' => $todayViews,
            'week_views' => $weekViews,
            'month_views' => $monthViews,
            'popular_pages' => $popularPages,
            'page_view_trend' => $pageViewTrend,
            // Birthday data
            'birthdays_today' => $birthdaysToday,
            'birthdays_this_week' => $birthdaysThisWeek,
            'birthdays_this_month' => $birthdaysThisMonth,
        ]);
    }

    /**
     * Get events for calendar in JSON format
     */
    public function getCalendarEvents()
    {
        $events = Event::all()->map(function($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_at->toIso8601String(),
                'end' => $event->end_at ? $event->end_at->toIso8601String() : null,
                'url' => route('admin.events.show', $event),
                'backgroundColor' => $this->getEventColor($event),
                'borderColor' => $this->getEventColor($event),
                'textColor' => '#ffffff',
                'extendedProps' => [
                    'type' => $event->type,
                    'location' => $event->location,
                    'registrations' => $event->registrations()->count(),
                    'capacity' => $event->capacity,
                ],
            ];
        });

        return response()->json($events);
    }

    /**
     * Get color based on event type
     */
    private function getEventColor($event)
    {
        if ($event->isPast()) {
            return '#94a3b8'; // slate-400
        }

        return match(strtoupper($event->type ?? '')) {
            'CONCERT' => '#8b5cf6', // violet
            'WORKSHOP' => '#3b82f6', // blue
            'REHEARSAL' => '#10b981', // emerald
            'MEETING' => '#f59e0b', // amber
            'PERFORMANCE' => '#ec4899', // pink
            default => '#6366f1', // indigo
        };
    }

    /**
     * Send birthday emails to members with birthdays today
     */
    public function sendBirthdayEmails()
    {
        $today = Carbon::today();
        $birthdaysToday = Member::whereNotNull('birthdate')
            ->whereRaw('MONTH(birthdate) = ?', [$today->month])
            ->whereRaw('DAY(birthdate) = ?', [$today->day])
            ->get();

        $successCount = 0;
        $failCount = 0;

        foreach ($birthdaysToday as $member) {
            try {
                Mail::to($member->email)->send(new BirthdayWishEmail($member));
                $successCount++;
            } catch (\Exception $e) {
                \Log::error("Failed to send birthday email to {$member->email}: " . $e->getMessage());
                $failCount++;
            }
        }

        if ($successCount > 0) {
            return redirect()->route('admin.dashboard')
                ->with('success', "🎉 Birthday emails sent successfully to {$successCount} member(s)!");
        } elseif ($failCount > 0) {
            return redirect()->route('admin.dashboard')
                ->with('error', "Failed to send {$failCount} birthday email(s). Check logs for details.");
        } else {
            return redirect()->route('admin.dashboard')
                ->with('info', 'No birthdays today to send emails to.');
        }
    }
}
