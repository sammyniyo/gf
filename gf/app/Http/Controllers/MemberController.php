<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberRegistrationMail;
use App\Services\NotificationService;

class MemberController extends Controller
{
    /**
     * Display the member registration form.
     */
    public function create()
    {
        return view('member-registration');
    }

    /**
     * Store a newly created member.
     */
    public function store(StoreMemberRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            // Remove terms_agreed from data as it's not a database field
            unset($data['terms_agreed']);

            // Populate 'name' field from first_name and last_name (for legacy database compatibility)
            if (isset($data['first_name']) && isset($data['last_name'])) {
                $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            }

            // Handle profile photo upload
            if ($request->hasFile('photo_path')) {
                $photo = $request->file('photo_path');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photoPath = $photo->storeAs('public/member-photos', $photoName);
                $data['photo_path'] = 'member-photos/' . $photoName;
            }

            // Set initial status
            $data['status'] = 'pending';
            $data['joined_at'] = now();

            // Create member
            $member = Member::create($data);

            // Create notification for admins
            NotificationService::newMemberRegistration($member);

            // Send confirmation email
            try {
                Mail::to($member->email)->send(new MemberRegistrationMail($member));
            } catch (\Exception $e) {
                \Log::error('Failed to send registration email: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Registration submitted successfully!',
                'member' => $member
            ]);

        } catch (\Exception $e) {
            \Log::error('Member registration error: ' . $e->getMessage());
            \Log::error('Error trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your registration. Please try again.',
                'error_details' => config('app.debug') ? $e->getMessage() : null,
                'errors' => ['general' => ['Registration failed. Please try again.']]
            ], 500);
        }
    }

    /**
     * Display the specified member.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified member.
     */
    public function update(StoreMemberRequest $request, Member $member)
    {
        $data = $request->validated();

        // Handle profile photo update
        if ($request->hasFile('photo_path')) {
            // Delete old photo if exists
            if ($member->photo_path) {
                Storage::delete('public/' . $member->photo_path);
            }

            $photo = $request->file('photo_path');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/member-photos', $photoName);
            $data['photo_path'] = 'member-photos/' . $photoName;
        }

        $member->update($data);

        return redirect()->route('members.show', $member)
            ->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified member.
     */
    public function destroy(Member $member)
    {
        // Delete profile photo if exists
        if ($member->photo_path) {
            Storage::delete('public/' . $member->photo_path);
        }

        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully!');
    }

    /**
     * Display a listing of members (admin only).
     */
    public function index()
    {
        $members = Member::latest()->paginate(15);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Lookup member by member code (for event registration).
     */
    public function lookupByCode($code)
    {
        $member = Member::where('member_id', strtoupper($code))
            ->where('status', 'active')
            ->first();

        if (!$member) {
            return response()->json([
                'success' => false,
                'message' => 'Member code not found or inactive'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'member' => [
                'id' => $member->id,
                'member_id' => $member->member_id,
                'first_name' => $member->first_name,
                'last_name' => $member->last_name,
                'email' => $member->email,
                'phone' => $member->phone,
            ]
        ]);
    }
}
