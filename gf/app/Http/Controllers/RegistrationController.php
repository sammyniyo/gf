<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\MemberIdService;
use App\Mail\MemberWelcomeEmail;
use App\Mail\FriendshipWelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Show the member registration form.
     */
    public function showMemberForm()
    {
        return view('registration.member');
    }

    /**
     * Show the friendship registration form.
     */
    public function showFriendshipForm()
    {
        return view('registration.friendship');
    }

    /**
     * Handle member registration.
     */
    public function storeMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',

            // Professional Information
            'occupation' => 'nullable|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'church' => 'nullable|string|max:255',
            'education_level' => 'nullable|string|max:255',

            // Choir Details
            'voice' => 'required|string|in:soprano,alto,tenor,bass,other',
            'talent' => 'nullable|string|max:255',
            'musical_experience' => 'nullable|string',
            'instruments' => 'nullable|string',
            'choir_experience' => 'nullable|string',
            'why_join' => 'nullable|string',

            // Additional
            'availability' => 'nullable|string',
            'hobbies' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'message' => 'nullable|string',
            'newsletter' => 'boolean',
            'photo_path' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Generate unique member ID
        $memberId = MemberIdService::generateUnique();

        // Prepare member data
        $data = $request->except(['photo_path']);
        $data['member_id'] = $memberId;
        $data['member_type'] = 'member';
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['status'] = 'pending';
        $data['joined_at'] = now();

        // Handle photo upload
        if ($request->hasFile('photo_path')) {
            $photo = $request->file('photo_path');
            $photoName = $memberId . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/member-photos', $photoName);
            $data['photo_path'] = $photoName;
        }

        // Create member
        $member = Member::create($data);

        // Send welcome email
        try {
            Mail::to($member->email)->send(new MemberWelcomeEmail($member));
        } catch (\Exception $e) {
            // Log error but don't fail the registration
            \Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        return redirect()->route('registration.success')
            ->with('success', 'Thank you for registering! Check your email for next steps.')
            ->with('member', $member);
    }

    /**
     * Handle friendship registration.
     */
    public function storeFriendship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',

            // Professional Information
            'occupation' => 'nullable|string|max:255',
            'church' => 'nullable|string|max:255',

            // Additional
            'message' => 'nullable|string',
            'newsletter' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Generate unique member ID
        $memberId = MemberIdService::generateUnique();

        // Prepare member data
        $data = $request->all();
        $data['member_id'] = $memberId;
        $data['member_type'] = 'friendship';
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['status'] = 'active'; // Friends are automatically active
        $data['joined_at'] = now();

        // Create member
        $member = Member::create($data);

        // Send welcome email
        try {
            Mail::to($member->email)->send(new FriendshipWelcomeEmail($member));
        } catch (\Exception $e) {
            // Log error but don't fail the registration
            \Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        return redirect()->route('registration.success')
            ->with('success', 'Thank you for joining God\'s Family! Check your email.')
            ->with('member', $member);
    }

    /**
     * Show registration success page.
     */
    public function success()
    {
        return view('registration.success');
    }
}

