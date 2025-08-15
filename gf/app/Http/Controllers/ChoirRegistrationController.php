<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Member; // Make sure you have this model created

class ChoirRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'names' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:15',
            'physical_address' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'work_place' => 'nullable|string|max:255',
            'church' => 'required|string|max:255',
            'talent' => 'nullable|string|max:255',
            'hobbies' => 'nullable|string|max:255',
            'status' => 'required|string',
            'gf_join_date' => 'required|date',
            'voice' => 'required|string|max:50',
            'roles' => 'nullable|string|max:255',
            'birthday' => 'required|date',
            'photo' => 'nullable|image|max:2048',
            'message' => 'nullable|string|max:1000',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('members/photos', 'public');
        }

        // Save member
        Member::create($validated);

        return redirect()->route('member-registration')->with('success', 'Thank you for registering as a choir member!');
    }
}
