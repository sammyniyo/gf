<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\MemberIdService;
use App\Mail\MemberWelcomeEmail;
use App\Mail\FriendshipWelcomeEmail;
use App\Mail\MemberRegistrationMail;
use App\Jobs\SendWelcomeEmail;
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
        if ($request->hasFile('photo_path') && !$request->hasFile('profile_photo')) {
            $request->files->set('profile_photo', $request->file('photo_path'));
        }

        $validator = Validator::make($request->all(), [
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20|unique:members,phone',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'joining_year' => 'nullable|integer|min:1998|max:'.date('Y'),
            'address' => 'required|string',

            // Professional Information
            'occupation' => 'nullable|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'church' => 'nullable|string|max:255',
            'education_level' => 'nullable|string|in:primary,secondary,diploma,bachelor,master,phd,other',

            // Choir Details
            'voice' => 'required|string|in:soprano,alto,tenor,bass,unsure',
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
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            // Check if the error is due to duplicate email or phone
            $hasDuplicateEmail = $validator->errors()->has('email') &&
                str_contains($validator->errors()->first('email'), 'already been taken');
            $hasDuplicatePhone = $validator->errors()->has('phone') &&
                str_contains($validator->errors()->first('phone'), 'already been taken');

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('show_reminder', $hasDuplicateEmail || $hasDuplicatePhone);
        }

        // Generate unique member ID
        $memberId = MemberIdService::generateUnique();

        // Prepare member data
        $data = $request->except(['profile_photo', 'photo_path']);

        if (!empty($data['education_level'])) {
            $educationLevelMap = [
                'bachelors' => 'bachelor',
                'masters' => 'master',
                'doctorate' => 'phd',
            ];

            $normalizedEducation = strtolower($data['education_level']);
            if (array_key_exists($normalizedEducation, $educationLevelMap)) {
                $data['education_level'] = $educationLevelMap[$normalizedEducation];
            }
        }

        if (!empty($data['voice'])) {
            $voiceMap = [
                'other' => 'unsure',
                'not_sure' => 'unsure',
            ];

            $normalizedVoice = strtolower($data['voice']);
            if (array_key_exists($normalizedVoice, $voiceMap)) {
                $data['voice'] = $voiceMap[$normalizedVoice];
            }
            // Ensure voice_type is also set (will be synced by model mutator, but set explicitly for clarity)
            $data['voice_type'] = $data['voice'];
        }

        $data['newsletter'] = $request->boolean('newsletter');
        $data['member_id'] = $memberId;
        $data['member_type'] = 'member';
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['status'] = 'pending';
        $data['joined_at'] = now();

        // Handle photo upload
        $photoField = $request->hasFile('profile_photo')
            ? 'profile_photo'
            : ($request->hasFile('photo_path') ? 'photo_path' : null);

        if ($photoField) {
            $photo = $request->file($photoField);
            $photoName = $memberId . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/member-photos', $photoName);
            $data['profile_photo'] = $photoName;
        }

        // Create member
        $member = Member::create($data);

        // Send registration notification email (not welcome email - that comes after confirmation)
        try {
            Mail::to($member->email)->send(new MemberRegistrationMail($member));
            \Log::info('Member registration notification email sent to: ' . $member->email);
        } catch (\Exception $e) {
            \Log::error('Failed to send registration notification email: ' . $e->getMessage());
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
        // Check if session is valid
        if (!$request->session()->isStarted()) {
            return redirect()->back()
                ->with('error', 'Your session has expired. Please refresh the page and try again.')
                ->withInput();
        }

        // Check CSRF token
        if (!$request->hasValidSignature() && !$request->has('_token')) {
            return redirect()->back()
                ->with('error', 'Security token expired. Please refresh the page and try again.')
                ->withInput();
        }

        $validator = Validator::make($request->all(), [
            // Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20|unique:members,phone',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string',

            // Professional Information
            'occupation' => 'nullable|string|max:255',
            'church' => 'nullable|string|max:255',

            // Additional
            'message' => 'nullable|string',
            'newsletter' => 'boolean',
            'profile_photo' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            // Check if the error is due to duplicate email or phone
            $hasDuplicateEmail = $validator->errors()->has('email') &&
                str_contains($validator->errors()->first('email'), 'already been taken');
            $hasDuplicatePhone = $validator->errors()->has('phone') &&
                str_contains($validator->errors()->first('phone'), 'already been taken');

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('show_reminder', $hasDuplicateEmail || $hasDuplicatePhone);
        }

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Generate unique member ID
        $memberId = MemberIdService::generateUnique();

        // Prepare member data
        $data = $request->except('profile_photo');
        $data['member_id'] = $memberId;
        $data['member_type'] = 'friendship';
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $data['status'] = 'active'; // Friends are automatically active
        $data['joined_at'] = now();

        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $photoName = $memberId . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/member-photos', $photoName);
            $data['profile_photo'] = $photoName;
            $data['photo_path'] = $photoName;
        }

        // Create member
        $member = Member::create($data);

        // Send welcome email immediately to avoid requiring a queue worker
        try {
            Mail::to($member->email)->send(new FriendshipWelcomeEmail($member));
            \Log::info('Friendship welcome email sent to: ' . $member->email);
        } catch (\Exception $e) {
            \Log::error('Failed to send friendship welcome email: ' . $e->getMessage());
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

    /**
     * Show form to remind member code by email.
     */
    public function showRemindCodeForm()
    {
        return view('registration.remind-code');
    }

    /**
     * Send member code to existing email.
     */
    public function sendRemindCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $member = Member::where('email', $request->email)->first();

        if (!$member) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'We could not find a registration with this email address.'
                ], 422);
            }
            return back()
                ->with('reminder_error', 'We could not find a registration with this email address.')
                ->with('show_reminder', true)
                ->withInput();
        }

        try {
            Mail::to($member->email)->send(new \App\Mail\MemberCodeReminderEmail($member));
        } catch (\Throwable $th) {
            \Log::error('Failed to send code reminder: ' . $th->getMessage());
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'We could not send the email right now. Please try again later.'
                ], 500);
            }
            return back()
                ->with('reminder_error', 'We could not send the email right now. Please try again later.')
                ->with('show_reminder', true)
                ->withInput();
        }

        $successMessage = 'We have emailed your registration code (' . $member->member_id . ') to ' . $member->email . '. Please check your inbox!';

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage
            ]);
        }

        return back()
            ->with('reminder_success', $successMessage)
            ->with('show_reminder', true)
            ->withInput();
    }

    /**
     * Show form to download ID card by member code.
     */
    public function showDownloadIdCardForm()
    {
        return view('registration.download-id-card');
    }

    /**
     * Download ID card by member code.
     */
    public function downloadIdCard(Request $request)
    {
        $request->validate([
            'member_code' => 'required|string',
        ]);

        $member = Member::where('member_id', strtoupper($request->member_code))->first();

        if (!$member) {
            return redirect()->back()
                ->with('error', 'Member code not found. Please check your code and try again.')
                ->withInput();
        }

        return \App\Services\PdfService::downloadMemberIdCard($member);
    }

    /**
     * Show member portal lookup form.
     */
    public function showMemberPortal()
    {
        return view('registration.member-portal');
    }

    /**
     * Access member portal by code.
     */
    public function accessMemberPortal(Request $request)
    {
        $request->validate([
            'member_code' => 'required|string',
        ]);

        $member = Member::where('member_id', strtoupper($request->member_code))->first();

        if (!$member) {
            return redirect()->back()
                ->with('error', 'Member code not found. Please check your code and try again.')
                ->withInput();
        }

        // Store member ID in session for security
        session(['member_portal_id' => $member->id]);

        return redirect()->route('member.portal.view', $member);
    }

    /**
     * View member portal (profile, card, edit).
     */
    public function viewMemberPortal(Member $member)
    {
        // Verify the member ID matches the session (security check)
        if (session('member_portal_id') != $member->id) {
            return redirect()->route('member.portal')
                ->with('error', 'Please enter your member code to access your profile.');
        }

        return view('registration.member-portal-view', compact('member'));
    }

    /**
     * Show edit form for member portal.
     */
    public function editMemberPortal(Member $member)
    {
        // Verify the member ID matches the session (security check)
        if (session('member_portal_id') != $member->id) {
            return redirect()->route('member.portal')
                ->with('error', 'Please enter your member code to access your profile.');
        }

        return view('registration.member-portal-edit', compact('member'));
    }

    /**
     * Update member information from portal.
     */
    public function updateMemberPortal(Request $request, Member $member)
    {
        // Verify the member ID matches the session (security check)
        if (session('member_portal_id') != $member->id) {
            return redirect()->route('member.portal')
                ->with('error', 'Please enter your member code to access your profile.');
        }

        $request->validate([
            'phone' => 'required|string|max:20|unique:members,phone,' . $member->id,
            'address' => 'nullable|string|max:500',
            'occupation' => 'nullable|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'church' => 'nullable|string|max:255',
            'joining_year' => 'nullable|integer|min:1998|max:'.date('Y'),
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $updateData = $request->only([
            'phone', 'address', 'occupation', 'workplace', 'church', 'joining_year'
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($member->profile_photo) {
                \Storage::delete('public/member-photos/' . basename($member->profile_photo));
            }

            $photo = $request->file('profile_photo');
            $photoName = $member->member_id . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/member-photos', $photoName);
            $updateData['profile_photo'] = $photoName;
        }

        $member->update($updateData);

        return redirect()->route('member.portal.view', $member)
            ->with('success', 'Your profile has been updated successfully!');
    }
}
