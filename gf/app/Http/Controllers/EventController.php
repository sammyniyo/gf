<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $types = Event::query()->select('type')->distinct()->orderBy('type')->pluck('type');

        $query = Event::query()
            ->where('is_public', true)
            ->withCount('registrations');

        // Status: upcoming (default) | past | all
        $status = $request->string('status', 'upcoming')->toString();
        if ($status === 'upcoming') {
            $query->where('start_at', '>=', now())->orderBy('start_at');
        } elseif ($status === 'past') {
            $query->where('start_at', '<', now())->orderByDesc('start_at');
        } else {
            $query->orderBy('start_at');
        }

        // Text search (title/description/location)
        if ($q = trim((string) $request->query('q'))) {
            $query->where(function ($qq) use ($q) {
                $qq->where('title', 'like', "%{$q}%")
                   ->orWhere('description', 'like', "%{$q}%")
                   ->orWhere('location', 'like', "%{$q}%");
            });
        }

        // Type filter
        if ($type = trim((string) $request->query('type'))) {
            $query->where('type', $type);
        }

        // Date range
        if ($from = $request->date('from')) {
            $query->whereDate('start_at', '>=', $from);
        }
        if ($to = $request->date('to')) {
            $query->whereDate('start_at', '<=', $to);
        }

        // Open only (has capacity or unlimited)
        if ($request->boolean('open_only')) {
            $query->where(function ($qq) {
                $qq->whereNull('capacity')
                   ->orWhereColumn('registrations_count', '<', 'capacity');
            });
        }

        $events = $query->paginate(9)->withQueryString();

        return view('events.index', [
            'events' => $events,
            'types'  => $types,
            'status' => $status,
        ]);
    }

    public function show(Event $event): View
    {
        abort_if(!$event->is_public, 404);

        $event->loadCount('registrations');

        return view('events.show', compact('event'));
    }

    // Per-event ICS download (Add to Calendar)
    public function ics(Event $event): Response
    {
        abort_if(!$event->is_public, 404);

        $uid = (string) Str::uuid();
        $start = $event->start_at->clone()->utc()->format('Ymd\THis\Z');
        $end   = ($event->end_at ?? $event->start_at->clone()->addHours(2))
                    ->clone()->utc()->format('Ymd\THis\Z');

        $desc  = 'More info: ' . route('events.show', $event);
        $ics = "BEGIN:VCALENDAR\r\n".
               "VERSION:2.0\r\n".
               "PRODID:-//GF Choir//Events//EN\r\n".
               "BEGIN:VEVENT\r\n".
               "UID:$uid\r\n".
               "DTSTAMP:".now()->utc()->format('Ymd\THis\Z')."\r\n".
               "DTSTART:$start\r\n".
               "DTEND:$end\r\n".
               "SUMMARY:".addslashes($event->title)."\r\n".
               "LOCATION:".addslashes((string)$event->location)."\r\n".
               "DESCRIPTION:".addslashes($desc)."\r\n".
               "URL:".route('events.show', $event)."\r\n".
               "END:VEVENT\r\n".
               "END:VCALENDAR\r\n";

        return response($ics, 200, [
            'Content-Type' => 'text/calendar; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="event-'.$event->id.'.ics"',
        ]);
    }
}
