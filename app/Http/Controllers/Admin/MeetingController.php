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
        // Get active choristers (members who actively sing) for choir meetings
        $members = Member::activeChoristers()->get();
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
            'committee_departments' => 'required_if:attendee_type,committee|array',
            'committee_departments.*' => 'string|max:255',
            'custom_attendees' => 'required_if:attendee_type,custom|array',
            'custom_attendees.*' => 'exists:members,id',
        ]);

        $meetingData = collect($validated)->except(['custom_attendees', 'committee_departments'])->toArray();
        if ($validated['attendee_type'] === 'custom') {
            $meetingData['custom_attendees'] = $validated['custom_attendees'];
        }
        if ($validated['attendee_type'] === 'committee') {
            $meetingData['custom_attendees'] = $validated['committee_departments'];
        }

        $meeting = Meeting::create($meetingData);

        // Add attendees based on type
        $this->addAttendees(
            $meeting,
            $validated['attendee_type'],
            $validated['custom_attendees'] ?? [],
            $validated['committee_departments'] ?? []
        );

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

    private function addAttendees(Meeting $meeting, $type, $customIds = [], $committeeDepartments = [])
    {
        $attendees = [];

        if ($type === 'committee') {
            $committeesQuery = Committee::where('is_active', true);
            if (!empty($committeeDepartments)) {
                $committeesQuery->whereIn('department', $committeeDepartments);
            }
            $committees = $committeesQuery->with('member')->get();
            foreach ($committees as $committee) {
                $member = $committee->member;
                $email = $member?->email ?? $committee->email;
                if (!$email) {
                    continue;
                }
                $attendees[] = [
                    'member_id' => $member?->id,
                    'email' => $email,
                    'name' => $member
                        ? $member->first_name . ' ' . $member->last_name
                        : ($committee->name ?? $committee->department ?? 'Committee Contact'),
                ];
            }
        } elseif ($type === 'all_members') {
            // For "all_members", include only active choristers (members who actively sing)
            $members = Member::activeChoristers()->get();
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

        $uniqueEmails = [];
        foreach ($attendees as $attendee) {
            if (empty($attendee['email'])) {
                continue;
            }

            $emailKey = strtolower($attendee['email']);
            if (isset($uniqueEmails[$emailKey])) {
                continue;
            }

            $uniqueEmails[$emailKey] = true;
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


