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
     * Show the form for creating a new member.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',
            // Professional Information
            'occupation' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'education_level' => 'required|in:primary,secondary,diploma,bachelor,master,phd,other',
            'skills' => 'nullable|string|max:500',
            // Choir Details
            'voice_type' => 'required|in:soprano,alto,tenor,bass,unsure',
            'musical_experience' => 'required|in:beginner,intermediate,advanced,professional',
            'instruments' => 'nullable|string|max:255',
            'choir_experience' => 'nullable|in:none,school,church,community,professional',
            'why_join' => 'required|string|max:1000',
            // Additional Information
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'availability' => 'required|in:weekends,evenings,flexible,limited',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'newsletter' => 'nullable|boolean',
        ]);

        // Populate 'name' field from first_name and last_name (for legacy database compatibility)
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/member-photos', $photoName);
            $data['profile_photo'] = $photoName;
        }

        // Set initial values
        $data['status'] = 'active'; // Admin-created members are active by default
        $data['joined_at'] = now();
        $data['newsletter'] = $request->has('newsletter');

        // Create member
        $member = Member::create($data);

        return redirect()->route('admin.members.show', $member)
            ->with('success', 'Member added successfully!');
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

        $oldStatus = $member->status;
        $newStatus = $request->status;

        $member->update([
            'status' => $newStatus,
            'notes' => $request->notes,
        ]);

        // Send welcome email when member status changes from pending to active
        if ($oldStatus !== 'active' && $newStatus === 'active') {
            try {
                \Mail::to($member->email)->send(new \App\Mail\MemberWelcomeMail($member));
            } catch (\Exception $e) {
                \Log::error('Failed to send welcome email to member: ' . $e->getMessage());
                // Don't fail the update if email fails
            }
        }

        return redirect()->route('admin.members.show', $member)
            ->with('success', 'Member updated successfully!' . ($newStatus === 'active' && $oldStatus !== 'active' ? ' Welcome email sent.' : ''));
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
