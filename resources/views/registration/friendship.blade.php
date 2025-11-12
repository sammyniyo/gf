@extends('layouts.app')

@section('title', 'Join God\'s Family | Friendship Registration')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-emerald-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">
                🙏 FRIENDSHIP REGISTRATION
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Join <span class="text-amber-600">God's Family</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Become a friend of God's Family Choir and stay connected with our ministry!
            </p>
        </div>

        <!-- Registration Form -->
        <form action="{{ route('registration.friendship.store') }}" method="POST" class="space-y-8" id="friendship-form" enctype="multipart/form-data">
            @csrf

            <!-- Session timeout warning -->
            <div id="session-warning" class="hidden bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mr-3"></i>
                    <div>
                        <p class="text-yellow-800 font-medium">Session Warning</p>
                        <p class="text-yellow-700 text-sm">Your session will expire soon. Please complete the form quickly or refresh the page.</p>
                    </div>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle text-red-600 mr-3 mt-1"></i>
                        <div>
                            <p class="text-red-800 font-medium mb-2">Please correct the following errors:</p>
                            <ul class="text-red-700 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-600 mr-3"></i>
                        <div>
                            <p class="text-red-800 font-medium">Error</p>
                            <p class="text-red-700 text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section 1: Personal Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold">
                        1
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Profile Photo <span class="text-red-500">*</span>
                        </label>
                        <div class="flex flex-col sm:flex-row items-center gap-5">
                            <div class="relative w-28 h-28 rounded-xl border-2 border-dashed border-amber-300 bg-amber-50 flex items-center justify-center overflow-hidden">
                                <img id="photo-preview-img" src="" alt="Selected profile preview" class="hidden w-full h-full object-cover">
                                <div id="photo-preview-placeholder" class="flex flex-col items-center justify-center text-amber-600 text-xs font-semibold">
                                    <i class="fas fa-camera text-2xl mb-1"></i>
                                    Preview
                                </div>
                            </div>
                            <div class="flex-1 w-full">
                                <input type="file" name="profile_photo" id="profile_photo" accept="image/*" required
                                    class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-amber-700 hover:file:bg-amber-200 cursor-pointer">
                                <p id="photo-file-name" class="text-xs text-gray-500 mt-2 hidden"></p>
                                <p class="text-xs text-gray-500 mt-2">
                                    Upload a clear headshot (JPG or PNG, max 2MB). This helps us recognize you in our community.
                                </p>
                            </div>
                        </div>
                        @error('profile_photo')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                placeholder="+250 XXX XXX XXX"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Code Reminder Section (shows when email/phone already exists) -->
                    @if (session('show_reminder') && ($errors->has('email') || $errors->has('phone')))
                        <div class="mt-4 animate-fade-in">
                            <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 border-2 border-blue-200 rounded-xl p-6 shadow-lg">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-envelope-open-text text-white text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                            <span>Already Registered?</span>
                                        </h3>
                                        <p class="text-gray-700 mb-4">
                                            It looks like this email or phone number is already registered. Enter your email below to receive your registration code.
                                        </p>

                                        <!-- Inline Reminder Form -->
                                        <div id="reminder-form-container">
                                            @if (session('reminder_success'))
                                                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <i class="fas fa-check-circle text-green-600"></i>
                                                        <p class="text-green-800 font-medium">{{ session('reminder_success') }}</p>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (session('reminder_error'))
                                                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                                                    <div class="flex items-center gap-3">
                                                        <i class="fas fa-exclamation-circle text-red-600"></i>
                                                        <p class="text-red-800 font-medium">{{ session('reminder_error') }}</p>
                                                    </div>
                                                </div>
                                            @endif

                                            <form action="{{ route('registration.remind-code.send') }}" method="POST" class="reminder-form" id="reminder-form-friendship">
                                                @csrf
                                                <div class="flex gap-3">
                                                    <input
                                                        type="email"
                                                        name="email"
                                                        value="{{ old('email', request('email')) }}"
                                                        placeholder="Enter your registered email"
                                                        required
                                                        class="flex-1 px-4 py-3 border-2 border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    >
                                                    <button
                                                        type="submit"
                                                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2"
                                                    >
                                                        <i class="fas fa-paper-plane"></i>
                                                        <span>Get Code</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Date of Birth
                            </label>
                            <input type="date" name="birthdate" value="{{ old('birthdate') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('birthdate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Gender
                            </label>
                            <select name="gender"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Education Level
                            </label>
                            <input type="text" name="occupation" value="{{ old('occupation') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent" placeholder="e.g. Undergraduate, Alumni, etc.">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Address
                        </label>
                        <textarea name="address" rows="2"
                            placeholder="Your address (optional)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Additional Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold">
                        2
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Additional Information</h2>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Occupation
                            </label>
                            <input type="text" name="occupation" value="{{ old('occupation') }}"
                                placeholder="e.g., Student, Teacher, Engineer"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('occupation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Church/Congregation
                            </label>
                            <input type="text" name="church" value="{{ old('church') }}"
                                placeholder="e.g., ASA UR Nyarugenge"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('church')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Message
                        </label>
                        <textarea name="message" rows="4"
                            placeholder="Tell us a bit about yourself or why you'd like to be a friend of God's Family Choir..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="newsletter" value="1" id="newsletter" {{ old('newsletter') ? 'checked' : '' }}
                            class="mt-1 w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                        <label for="newsletter" class="text-sm text-gray-700">
                            I would like to receive newsletters and updates from God's Family Choir
                        </label>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-gradient-to-r from-amber-50 to-emerald-50 rounded-2xl p-8 border border-amber-200">
                <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-gift text-amber-600"></i>
                    What You'll Receive
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Regular updates about our concerts and events</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Exclusive access to God's Family WhatsApp group</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Early notifications about special programs</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Opportunities to support our ministry</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Your unique Friend ID for future interactions</span>
                    </li>
                </ul>
            </div>

            <!-- Submit Button -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="text-center">
                    <button type="submit"
                        class="inline-flex items-center gap-3 px-12 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold text-lg rounded-xl hover:shadow-xl hover:shadow-amber-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-heart"></i>
                        Join as a Friend
                    </button>
                    <p class="text-sm text-gray-500 mt-4">
                        By submitting, you agree to our terms and conditions
                    </p>
                </div>
            </div>
        </form>

        <!-- Help Section -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start gap-4">
                <i class="fas fa-info-circle text-blue-600 text-2xl"></i>
                <div>
                    <h3 class="font-bold text-blue-900 mb-2">Need Help?</h3>
                    <p class="text-blue-800 text-sm">
                        If you have any questions or need assistance, please contact us at
                        <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="underline">asa.godsfamilychoir2017@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Alternative Registration -->
        <div class="mt-8 bg-emerald-50 border border-emerald-200 rounded-xl p-6 text-center">
            <p class="text-emerald-800 mb-4">
                <i class="fas fa-music mr-2"></i>
                Want to join as a choir member instead?
            </p>
            <a href="{{ route('registration.member') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition-colors">
                <i class="fas fa-microphone"></i>
                Register as Choir Member
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<x-static.footer />

@endsection

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.5s ease-out;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle reminder form submission with AJAX
    const reminderForm = document.getElementById('reminder-form-friendship');
    if (reminderForm) {
        reminderForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const button = this.querySelector('button[type="submit"]');
            const originalHtml = button.innerHTML;

            // Show loading state
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Sending...</span>';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                }
                // If not JSON, redirect to handle server-side response
                window.location.reload();
                return null;
            })
            .then(data => {
                if (!data) return;
                if (data.success) {
                    // Show success message
                    const container = document.getElementById('reminder-form-container');
                    container.innerHTML = `
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <p class="text-green-800 font-medium">${data.message}</p>
                            </div>
                        </div>
                    `;
                } else {
                    // Show error message
                    const container = document.getElementById('reminder-form-container');
                    const existingForm = container.querySelector('.reminder-form');
                    const errorHtml = `
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-exclamation-circle text-red-600"></i>
                                <p class="text-red-800 font-medium">${data.message || 'An error occurred. Please try again.'}</p>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('afterbegin', errorHtml);
                    button.disabled = false;
                    button.innerHTML = originalHtml;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.disabled = false;
                button.innerHTML = originalHtml;
                alert('An error occurred. Please try again or refresh the page.');
            });
        });
    }

    const form = document.getElementById('friendship-form');
    const sessionWarning = document.getElementById('session-warning');
    const photoInput = document.getElementById('profile_photo');
    const photoPreviewImg = document.getElementById('photo-preview-img');
    const photoPreviewPlaceholder = document.getElementById('photo-preview-placeholder');
    const photoFileName = document.getElementById('photo-file-name');
    let sessionTimeout = null;
    let warningShown = false;

    if (photoInput) {
        const resetPhotoPreview = () => {
            if (photoPreviewImg) {
                photoPreviewImg.src = '';
                photoPreviewImg.classList.add('hidden');
            }
            if (photoPreviewPlaceholder) {
                photoPreviewPlaceholder.classList.remove('hidden');
            }
            if (photoFileName) {
                photoFileName.textContent = '';
                photoFileName.classList.add('hidden');
            }
        };

        photoInput.addEventListener('change', function() {
            const file = this.files && this.files[0];
            if (!file) {
                resetPhotoPreview();
                return;
            }

            if (photoFileName) {
                photoFileName.textContent = file.name;
                photoFileName.classList.remove('hidden');
            }

            if (!photoPreviewImg) {
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                photoPreviewImg.src = event.target?.result || '';
                photoPreviewImg.classList.remove('hidden');
                if (photoPreviewPlaceholder) {
                    photoPreviewPlaceholder.classList.add('hidden');
                }
            };
            reader.readAsDataURL(file);
        });
    }

    // Session timeout warning (show warning 5 minutes before session expires)
    // Laravel default session lifetime is 120 minutes, so warn at 115 minutes
    const sessionLifetime = 120; // minutes
    const warningTime = 5; // minutes before expiry
    const warningDelay = (sessionLifetime - warningTime) * 60 * 1000; // convert to milliseconds

    // Show session warning
    sessionTimeout = setTimeout(function() {
        if (!warningShown) {
            sessionWarning.classList.remove('hidden');
            warningShown = true;

            // Auto-refresh the page after 2 minutes of warning
            setTimeout(function() {
                if (confirm('Your session is about to expire. Would you like to refresh the page to continue?')) {
                    window.location.reload();
                }
            }, 2 * 60 * 1000);
        }
    }, warningDelay);

    // Form submission handling
    form.addEventListener('submit', function(e) {
        // Clear the session timeout warning
        if (sessionTimeout) {
            clearTimeout(sessionTimeout);
        }

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        submitButton.disabled = true;

        // Check if CSRF token exists
        const csrfToken = form.querySelector('input[name="_token"]');
        if (!csrfToken || !csrfToken.value) {
            e.preventDefault();
            alert('Session expired. Please refresh the page and try again.');
            window.location.reload();
            return;
        }
    });

    // Auto-save form data to localStorage to prevent data loss
    const formInputs = form.querySelectorAll('input, textarea, select');
    formInputs.forEach(function(input) {
        if (!input.name) {
            return;
        }

        if (input.type === 'file') {
            return;
        }

        if (input.type === 'checkbox' || input.type === 'radio') {
            const checkedKey = 'friendship_' + input.name + '_checked';
            const savedChecked = localStorage.getItem(checkedKey);
            if (savedChecked !== null) {
                input.checked = savedChecked === 'true';
            }
            input.addEventListener('change', function() {
                localStorage.setItem(checkedKey, String(input.checked));
            });
            return;
        }

        const storageKey = 'friendship_' + input.name;
        const savedValue = localStorage.getItem(storageKey);
        if (savedValue !== null && !input.value) {
            input.value = savedValue;
        }

        input.addEventListener('input', function() {
            localStorage.setItem(storageKey, input.value);
        });
    });

    // Clear saved data on successful submission
    form.addEventListener('submit', function() {
        formInputs.forEach(function(input) {
            if (!input.name) {
                return;
            }
            localStorage.removeItem('friendship_' + input.name);
            if (input.type === 'checkbox' || input.type === 'radio') {
                localStorage.removeItem('friendship_' + input.name + '_checked');
            }
        });
    });

    // Handle page visibility change (user switches tabs)
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            // Page is hidden, extend session warning
            if (sessionTimeout) {
                clearTimeout(sessionTimeout);
            }
        } else {
            // Page is visible again, reset warning timer
            if (warningShown) {
                sessionWarning.classList.add('hidden');
                warningShown = false;
            }
            sessionTimeout = setTimeout(function() {
                if (!warningShown) {
                    sessionWarning.classList.remove('hidden');
                    warningShown = true;
                }
            }, warningDelay);
        }
    });
});
</script>
@endpush

