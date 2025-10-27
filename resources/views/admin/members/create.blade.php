@extends('admin.layout')

@section('page-title', 'Add New Member')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Add New Choir Member</h1>
            <p class="mt-1 text-sm text-slate-500">Manually add a new member to the choir</p>
        </div>
        <a href="{{ route('admin.members.index') }}"
           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Members
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            <!-- Personal Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-slate-700 mb-2">First Name *</label>
                        <input type="text" name="first_name" id="first_name" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('first_name') border-red-500 @enderror"
                               value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-slate-700 mb-2">Last Name *</label>
                        <input type="text" name="last_name" id="last_name" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('last_name') border-red-500 @enderror"
                               value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone *</label>
                        <input type="tel" name="phone" id="phone" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                               value="{{ old('phone') }}">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-slate-700 mb-2">Date of Birth *</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('date_of_birth') border-red-500 @enderror"
                               value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-slate-700 mb-2">Gender *</label>
                        <select name="gender" id="gender" required
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('gender') border-red-500 @enderror">
                            <option value="">Select gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address *</label>
                        <textarea name="address" id="address" rows="2" required
                                  class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Professional Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Professional Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="occupation" class="block text-sm font-medium text-slate-700 mb-2">Occupation *</label>
                        <input type="text" name="occupation" id="occupation" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('occupation') border-red-500 @enderror"
                               value="{{ old('occupation') }}">
                        @error('occupation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="workplace" class="block text-sm font-medium text-slate-700 mb-2">Workplace</label>
                        <input type="text" name="workplace" id="workplace"
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('workplace') border-red-500 @enderror"
                               value="{{ old('workplace') }}">
                        @error('workplace')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="education_level" class="block text-sm font-medium text-slate-700 mb-2">Education Level *</label>
                        <select name="education_level" id="education_level" required
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('education_level') border-red-500 @enderror">
                            <option value="">Select education level</option>
                            <option value="primary" {{ old('education_level') == 'primary' ? 'selected' : '' }}>Primary School</option>
                            <option value="secondary" {{ old('education_level') == 'secondary' ? 'selected' : '' }}>Secondary School</option>
                            <option value="diploma" {{ old('education_level') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="bachelor" {{ old('education_level') == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                            <option value="master" {{ old('education_level') == 'master' ? 'selected' : '' }}>Master's Degree</option>
                            <option value="phd" {{ old('education_level') == 'phd' ? 'selected' : '' }}>PhD</option>
                            <option value="other" {{ old('education_level') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('education_level')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="skills" class="block text-sm font-medium text-slate-700 mb-2">Special Skills</label>
                        <input type="text" name="skills" id="skills"
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('skills') border-red-500 @enderror"
                               value="{{ old('skills') }}" placeholder="e.g., Public speaking, Event management">
                        @error('skills')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Choir Details -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Choir Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="voice_type" class="block text-sm font-medium text-slate-700 mb-2">Voice Type *</label>
                        <select name="voice_type" id="voice_type" required
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('voice_type') border-red-500 @enderror">
                            <option value="">Select voice type</option>
                            <option value="soprano" {{ old('voice_type') == 'soprano' ? 'selected' : '' }}>Soprano</option>
                            <option value="alto" {{ old('voice_type') == 'alto' ? 'selected' : '' }}>Alto</option>
                            <option value="tenor" {{ old('voice_type') == 'tenor' ? 'selected' : '' }}>Tenor</option>
                            <option value="bass" {{ old('voice_type') == 'bass' ? 'selected' : '' }}>Bass</option>
                            <option value="unsure" {{ old('voice_type') == 'unsure' ? 'selected' : '' }}>Not sure</option>
                        </select>
                        @error('voice_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="musical_experience" class="block text-sm font-medium text-slate-700 mb-2">Musical Experience *</label>
                        <select name="musical_experience" id="musical_experience" required
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('musical_experience') border-red-500 @enderror">
                            <option value="">Select experience level</option>
                            <option value="beginner" {{ old('musical_experience') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('musical_experience') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('musical_experience') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            <option value="professional" {{ old('musical_experience') == 'professional' ? 'selected' : '' }}>Professional</option>
                        </select>
                        @error('musical_experience')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="instruments" class="block text-sm font-medium text-slate-700 mb-2">Instruments Played</label>
                        <input type="text" name="instruments" id="instruments"
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('instruments') border-red-500 @enderror"
                               value="{{ old('instruments') }}" placeholder="e.g., Piano, Guitar, Violin">
                        @error('instruments')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="choir_experience" class="block text-sm font-medium text-slate-700 mb-2">Previous Choir Experience</label>
                        <select name="choir_experience" id="choir_experience"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('choir_experience') border-red-500 @enderror">
                            <option value="">Select experience</option>
                            <option value="none" {{ old('choir_experience') == 'none' ? 'selected' : '' }}>No experience</option>
                            <option value="school" {{ old('choir_experience') == 'school' ? 'selected' : '' }}>School choir</option>
                            <option value="church" {{ old('choir_experience') == 'church' ? 'selected' : '' }}>Church choir</option>
                            <option value="community" {{ old('choir_experience') == 'community' ? 'selected' : '' }}>Community choir</option>
                            <option value="professional" {{ old('choir_experience') == 'professional' ? 'selected' : '' }}>Professional choir</option>
                        </select>
                        @error('choir_experience')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="why_join" class="block text-sm font-medium text-slate-700 mb-2">Why do they want to join? *</label>
                        <textarea name="why_join" id="why_join" rows="3" required
                                  class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('why_join') border-red-500 @enderror"
                                  placeholder="Tell us what draws them to our choir...">{{ old('why_join') }}</textarea>
                        @error('why_join')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Additional Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="emergency_contact_name" class="block text-sm font-medium text-slate-700 mb-2">Emergency Contact Name *</label>
                        <input type="text" name="emergency_contact_name" id="emergency_contact_name" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('emergency_contact_name') border-red-500 @enderror"
                               value="{{ old('emergency_contact_name') }}">
                        @error('emergency_contact_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="emergency_contact_phone" class="block text-sm font-medium text-slate-700 mb-2">Emergency Contact Phone *</label>
                        <input type="tel" name="emergency_contact_phone" id="emergency_contact_phone" required
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('emergency_contact_phone') border-red-500 @enderror"
                               value="{{ old('emergency_contact_phone') }}">
                        @error('emergency_contact_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="availability" class="block text-sm font-medium text-slate-700 mb-2">Availability *</label>
                        <select name="availability" id="availability" required
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('availability') border-red-500 @enderror">
                            <option value="">Select availability</option>
                            <option value="weekends" {{ old('availability') == 'weekends' ? 'selected' : '' }}>Weekends only</option>
                            <option value="evenings" {{ old('availability') == 'evenings' ? 'selected' : '' }}>Evenings</option>
                            <option value="flexible" {{ old('availability') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                            <option value="limited" {{ old('availability') == 'limited' ? 'selected' : '' }}>Limited availability</option>
                        </select>
                        @error('availability')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-slate-700 mb-2">Profile Photo</label>
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                               class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('profile_photo') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-slate-500">Optional: Upload a profile photo (max 2MB)</p>
                        @error('profile_photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="newsletter" value="1"
                                   class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                                   {{ old('newsletter') ? 'checked' : '' }}>
                            <span class="text-sm text-slate-700">Subscribe to newsletter</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="glass-card p-6">
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.members.index') }}"
                       class="px-6 py-2.5 text-sm font-semibold text-slate-600 bg-white border border-slate-200 rounded-xl transition hover:bg-slate-50">
                        Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-xl shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400/50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Add Member
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

