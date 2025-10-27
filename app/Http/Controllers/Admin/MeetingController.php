<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\MeetingAttendee;
use App\Models\Member;
use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingInvitation;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::orderBy('meeting_date', 'desc')->paginate(15);
        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        $members = Member::where('status', 'active')->get();
        $committees = Committee::where('is_active', true)->get();
        return view('admin.meetings.create', compact('members', 'committees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meeting_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'meeting_link' => 'nullable|url',
            'attendee_type' => 'required|in:committee,all_members,custom',
            'custom_attendees' => 'nullable|array',
            'custom_attendees.*' => 'exists:members,id',
        ]);

        $meeting = Meeting::create($validated);

        // Add attendees based on type
        $this->addAttendees($meeting, $validated['attendee_type'], $validated['custom_attendees'] ?? []);

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Meeting created successfully!');
    }

    public function sendInvitations(Meeting $meeting)
    {
        foreach ($meeting->attendees as $attendee) {
            if (!$attendee->invitation_sent) {
                try {
                    Mail::to($attendee->email)->send(new MeetingInvitation($meeting, $attendee));
                    $attendee->update(['invitation_sent' => true]);
                } catch (\Exception $e) {
                    // Log error but continue
                }
            }
        }

        $meeting->update([
            'email_sent' => true,
            'email_sent_at' => now(),
        ]);

        return back()->with('success', 'Invitations sent successfully!');
    }

    private function addAttendees(Meeting $meeting, $type, $customIds = [])
    {
        $attendees = [];

        if ($type === 'committee') {
            $committees = Committee::where('is_active', true)->get();
            foreach ($committees as $committee) {
                if ($committee->email) {
                    $attendees[] = [
                        'email' => $committee->email,
                        'name' => $committee->name,
                    ];
                }
            }
        } elseif ($type === 'all_members') {
            $members = Member::where('status', 'active')->get();
            foreach ($members as $member) {
                $attendees[] = [
                    'member_id' => $member->id,
                    'email' => $member->email,
                    'name' => $member->first_name . ' ' . $member->last_name,
                ];
            }
        } elseif ($type === 'custom') {
            $members = Member::whereIn('id', $customIds)->get();
            foreach ($members as $member) {
                $attendees[] = [
                    'member_id' => $member->id,
                    'email' => $member->email,
                    'name' => $member->first_name . ' ' . $member->last_name,
                ];
            }
        }

        foreach ($attendees as $attendee) {
            $meeting->attendees()->create($attendee);
        }
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('admin.meetings.index')
            ->with('success', 'Meeting deleted successfully!');
    }
}


