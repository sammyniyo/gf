<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\MemberIdService;
use App\Mail\MemberWelcomeEmail;
use App\Mail\FriendshipWelcomeEmail;
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
            'gender' => 'required|in:male,female,other',
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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
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

        // Send welcome email using job queue to avoid rate limits
        try {
            SendWelcomeEmail::dispatch($member, 'member');
            \Log::info('Member welcome email job dispatched for: ' . $member->email);
        } catch (\Exception $e) {
            \Log::error('Failed to dispatch welcome email job: ' . $e->getMessage());
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

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

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

        // Send welcome email using job queue to avoid rate limits
        try {
            SendWelcomeEmail::dispatch($member, 'friendship');
            \Log::info('Friendship welcome email job dispatched for: ' . $member->email);
        } catch (\Exception $e) {
            \Log::error('Failed to dispatch welcome email job: ' . $e->getMessage());
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
            return back()->withErrors(['email' => 'We could not find a registration with this email.'])->withInput();
        }

        try {
            Mail::to($member->email)->send(new \App\Mail\MemberCodeReminderEmail($member));
        } catch (\Throwable $th) {
            \Log::error('Failed to send code reminder: ' . $th->getMessage());
            return back()->with('error', 'We could not send the email right now. Please try again later.');
        }

        return back()->with('success', 'We have emailed your registration code to you.');
    }
}
