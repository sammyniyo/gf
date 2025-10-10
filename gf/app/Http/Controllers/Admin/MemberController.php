<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberController extends Controller
{
    /**
     * Display a listing of members.
     */
    public function index()
    {
        $members = Member::latest()->paginate(15);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Display the specified member.
     */
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified member.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'status' => 'required|in:pending,active,inactive',
            'notes' => 'nullable|string|max:1000',
        ]);

        $member->update([
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.members.show', $member)
            ->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified member.
     */
    public function destroy(Member $member)
    {
        // Delete profile photo if exists
        if ($member->profile_photo) {
            \Storage::delete('public/member-photos/' . $member->profile_photo);
        }

        $member->delete();

        return redirect()->route('admin.members.index')
            ->with('success', 'Member deleted successfully!');
    }

    /**
     * Export members to CSV.
     */
    public function export()
    {
        $members = Member::all();

        $filename = 'members_export_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($members) {
            $file = fopen('php://output', 'w');

            // CSV Headers
            fputcsv($file, [
                'ID',
                'First Name',
                'Last Name',
                'Email',
                'Phone',
                'Date of Birth',
                'Gender',
                'Address',
                'Occupation',
                'Workplace',
                'Education Level',
                'Skills',
                'Voice Type',
                'Musical Experience',
                'Instruments',
                'Choir Experience',
                'Why Join',
                'Emergency Contact Name',
                'Emergency Contact Phone',
                'Availability',
                'Newsletter',
                'Status',
                'Created At'
            ]);

            // CSV Data
            foreach ($members as $member) {
                fputcsv($file, [
                    $member->id,
                    $member->first_name,
                    $member->last_name,
                    $member->email,
                    $member->phone,
                    $member->date_of_birth?->format('Y-m-d'),
                    $member->gender,
                    $member->address,
                    $member->occupation,
                    $member->workplace,
                    $member->education_level,
                    $member->skills,
                    $member->voice_type,
                    $member->musical_experience,
                    $member->instruments,
                    $member->choir_experience,
                    $member->why_join,
                    $member->emergency_contact_name,
                    $member->emergency_contact_phone,
                    $member->availability,
                    $member->newsletter ? 'Yes' : 'No',
                    $member->status,
                    $member->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
