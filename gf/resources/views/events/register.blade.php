@extends('layouts.app')

@section('title', 'Register for ' . $event->title . ' | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Event Cover Image -->
    <div class="absolute inset-0">
        @if($event->cover_image)
            <img src="{{ Storage::url($event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-20" />
        @else
            <img src="{{ asset('images/gf-2.jpg') }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-15" />
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-emerald-900/85 to-emerald-950/95"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-6 py-16 text-center">
        <div class="inline-block mb-6">
            <span class="px-4 py-2 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-semibold">
                REGISTRATION
            </span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4 leading-tight">
            Register for<br>
            <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">{{ $event->title }}</span>
        </h1>
        <p class="text-xl text-emerald-100 max-w-2xl mx-auto">
            {{ $event->start_at->format('l, F j, Y \a\t g:i A') }}
            @if($event->location)
                • {{ $event->location }}
            @endif
        </p>
    </div>
</section>

<!-- Registration Form Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-2xl mx-auto px-6">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 p-6 bg-green-50 border border-green-200 rounded-2xl">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-green-900">Registration Successful!</h3>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Event Info Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Event Details</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $event->start_at->format('l, F j, Y') }}</p>
                                <p class="text-gray-600">{{ $event->start_at->format('g:i A') }}</p>
                            </div>
                        </div>

                        @if($event->location)
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Location</p>
                                    <p class="text-gray-600">{{ $event->location }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-900">Type</p>
                                <p class="text-gray-600 capitalize">{{ $event->type }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Registration Info</h3>
                    <div class="space-y-3">
                        @if($event->capacity)
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Capacity</p>
                                    <p class="text-gray-600">{{ $event->registrations_count }} / {{ $event->capacity }} registered</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-900">Status</p>
                                <p class="text-gray-600">Open for Registration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Registration Form</h2>

            <form action="{{ route('events.register.store', $event) }}" method="POST" class="space-y-6" id="registrationForm">
                @csrf

                <!-- Registration Type Toggle -->
                <div class="bg-gradient-to-r from-emerald-50 to-amber-50 rounded-xl p-6 border-2 border-emerald-200">
                    <label class="block text-sm font-semibold text-gray-900 mb-3">
                        Are you a choir member?
                    </label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="registration_type" value="guest" checked onchange="toggleRegistrationType()" class="sr-only peer">
                            <div class="p-4 text-center border-2 border-gray-300 rounded-xl cursor-pointer peer-checked:border-emerald-600 peer-checked:bg-emerald-50 peer-checked:text-emerald-900 transition-all hover:border-gray-400">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="font-bold">Guest</span>
                                </div>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="registration_type" value="member" onchange="toggleRegistrationType()" class="sr-only peer">
                            <div class="p-4 text-center border-2 border-gray-300 rounded-xl cursor-pointer peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-900 transition-all hover:border-gray-400">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                    <span class="font-bold">Member</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Member Code Section (Hidden by default) -->
                <div id="memberCodeSection" class="hidden">
                    <label for="member_code" class="block text-sm font-semibold text-gray-900 mb-2">
                        Member Code <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-3">
                        <input type="text"
                               id="member_code"
                               name="member_code"
                               placeholder="e.g., GF2024001"
                               class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors uppercase">
                        <button type="button" onclick="lookupMemberCode()" class="px-6 py-3 bg-gradient-to-r from-amber-600 to-amber-700 text-white font-bold rounded-xl hover:shadow-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <p id="memberCodeError" class="mt-2 text-sm text-red-600 hidden"></p>
                    <p id="memberCodeSuccess" class="mt-2 text-sm text-emerald-600 hidden"></p>
                </div>

                <!-- Guest Details Section -->
                <div id="guestDetailsSection">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-900 mb-2">
                        Phone Number <span class="text-gray-500">(Optional)</span>
                    </label>
                    <input type="tel"
                           id="phone"
                           name="phone"
                           value="{{ old('phone') }}"
                           placeholder="e.g., 0781234567"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount Offered -->
                <div>
                    @if($event->isConcert() && !empty($presets))
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Donation Amount <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-3">
                            @foreach($presets as $preset)
                                <label class="relative cursor-pointer">
                                    <input type="radio"
                                           name="amount_preset"
                                           value="{{ $preset }}"
                                           {{ old('amount_preset') == $preset ? 'checked' : '' }}
                                           onchange="selectPresetAmount({{ $preset }})"
                                           class="sr-only peer">
                                    <div class="p-3 text-center border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 transition-all hover:border-gray-300">
                                        <span class="font-semibold text-gray-900 peer-checked:text-emerald-700">
                                            {{ $preset == 0 ? 'Free' : number_format($preset) . ' RWF' }}
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                            <!-- Custom Amount Option -->
                            <label class="relative cursor-pointer">
                                <input type="radio"
                                       name="amount_preset"
                                       value="custom"
                                       {{ old('amount_preset') == 'custom' ? 'checked' : '' }}
                                       onchange="selectPresetAmount('custom')"
                                       class="sr-only peer">
                                <div class="p-3 text-center border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-amber-500 peer-checked:bg-amber-50 peer-checked:text-amber-700 transition-all hover:border-gray-300">
                                    <span class="font-semibold text-gray-900 peer-checked:text-amber-700">
                                        Custom Amount
                                    </span>
                                </div>
                            </label>
                        </div>

                        <!-- Custom Amount Input (Hidden by default) -->
                        <div id="customAmountInput" class="hidden mt-3">
                            <label for="custom_amount" class="block text-sm font-medium text-gray-700 mb-2">
                                Enter Your Amount (RWF)
                            </label>
                            <input type="number"
                                   id="custom_amount"
                                   name="custom_amount"
                                   value="{{ old('custom_amount') }}"
                                   min="0"
                                   placeholder="Enter amount in RWF"
                                   class="w-full px-4 py-3 border-2 border-amber-200 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors">
                        </div>

                        <!-- Hidden field to store the final amount -->
                        <input type="hidden" id="amount_offered" name="amount_offered" value="{{ old('amount_offered', 0) }}" required>

                        @error('amount_offered')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @else
                        <label for="amount_offered" class="block text-sm font-semibold text-gray-900 mb-2">
                            Donation Amount <span class="text-gray-500">(Optional)</span>
                        </label>
                        <input type="number"
                               id="amount_offered"
                               name="amount_offered"
                               value="{{ old('amount_offered') }}"
                               min="0"
                               placeholder="Enter amount in RWF"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        @error('amount_offered')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @endif
                </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold text-lg rounded-xl hover:shadow-xl hover:shadow-emerald-500/50 hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Complete Registration
                    </button>
                </div>
            </form>

            <!-- Back to Event -->
            <div class="mt-6 text-center">
                <a href="{{ route('events.show', $event) }}"
                   class="inline-flex items-center gap-2 text-gray-600 hover:text-emerald-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Event Details
                </a>
            </div>
        </div>
    </div>
</section>

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<script>
// Toggle between member and guest registration
function toggleRegistrationType() {
    const type = document.querySelector('input[name="registration_type"]:checked').value;
    const memberSection = document.getElementById('memberCodeSection');
    const guestSection = document.getElementById('guestDetailsSection');

    if (type === 'member') {
        memberSection.classList.remove('hidden');
        guestSection.classList.add('hidden');
        // Clear and disable guest fields
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('name').removeAttribute('required');
        document.getElementById('email').removeAttribute('required');
    } else {
        memberSection.classList.add('hidden');
        guestSection.classList.remove('hidden');
        // Enable guest fields
        document.getElementById('name').setAttribute('required', 'required');
        document.getElementById('email').setAttribute('required', 'required');
        document.getElementById('member_code').value = '';
    }
}

// Lookup member by code
async function lookupMemberCode() {
    const memberCode = document.getElementById('member_code').value.trim().toUpperCase();
    const errorEl = document.getElementById('memberCodeError');
    const successEl = document.getElementById('memberCodeSuccess');
    const guestSection = document.getElementById('guestDetailsSection');

    // Reset messages
    errorEl.classList.add('hidden');
    successEl.classList.add('hidden');

    if (!memberCode) {
        errorEl.textContent = 'Please enter a member code';
        errorEl.classList.remove('hidden');
        return;
    }

    try {
        const response = await fetch(`/api/members/lookup/${memberCode}`);
        const data = await response.json();

        if (response.ok && data.success) {
            // Show success message
            successEl.textContent = `✓ Welcome back, ${data.member.first_name} ${data.member.last_name}!`;
            successEl.classList.remove('hidden');

            // Pre-fill form fields
            document.getElementById('name').value = `${data.member.first_name} ${data.member.last_name}`;
            document.getElementById('email').value = data.member.email;
            document.getElementById('phone').value = data.member.phone || '';

            // Make fields read-only
            document.getElementById('name').setAttribute('readonly', 'readonly');
            document.getElementById('email').setAttribute('readonly', 'readonly');
            document.getElementById('phone').setAttribute('readonly', 'readonly');
            document.getElementById('name').classList.add('bg-gray-50');
            document.getElementById('email').classList.add('bg-gray-50');
            document.getElementById('phone').classList.add('bg-gray-50');

            // Show guest section with pre-filled data
            guestSection.classList.remove('hidden');

            // Store member ID in a hidden field
            let memberIdField = document.getElementById('member_id_field');
            if (!memberIdField) {
                memberIdField = document.createElement('input');
                memberIdField.type = 'hidden';
                memberIdField.id = 'member_id_field';
                memberIdField.name = 'member_id';
                document.getElementById('registrationForm').appendChild(memberIdField);
            }
            memberIdField.value = data.member.id;

            // Scroll to the form to show pledge options
            setTimeout(() => {
                guestSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 300);
        } else {
            errorEl.textContent = data.message || 'Member code not found';
            errorEl.classList.remove('hidden');
        }
    } catch (error) {
        errorEl.textContent = 'Error looking up member code. Please try again.';
        errorEl.classList.remove('hidden');
    }
}

// Handle custom amount selection
function selectPresetAmount(value) {
    const customInput = document.getElementById('customAmountInput');
    const customAmountField = document.getElementById('custom_amount');
    const amountOfferedField = document.getElementById('amount_offered');

    if (value === 'custom') {
        customInput.classList.remove('hidden');
        customAmountField.setAttribute('required', 'required');
        amountOfferedField.value = '';

        // Update amount when custom input changes
        customAmountField.addEventListener('input', function() {
            amountOfferedField.value = this.value;
        });
    } else {
        customInput.classList.add('hidden');
        customAmountField.removeAttribute('required');
        customAmountField.value = '';
        amountOfferedField.value = value;
    }
}

// Form validation before submit
document.getElementById('registrationForm')?.addEventListener('submit', function(e) {
    const type = document.querySelector('input[name="registration_type"]:checked').value;

    if (type === 'member') {
        const memberCode = document.getElementById('member_code').value.trim();
        const memberIdField = document.getElementById('member_id_field');

        if (!memberCode || !memberIdField) {
            e.preventDefault();
            alert('Please lookup your member code before submitting');
            return false;
        }
    }
});
</script>

<x-static.footer />
@endsection
