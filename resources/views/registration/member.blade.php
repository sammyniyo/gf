@extends('layouts.app')

@section('title', 'Join the Choir | God\'s Family Choir')
@section('meta_description', 'Register as a choir member of God\'s Family Choir. Share your voice, church, and availability. We review every application.')
@section('canonical_url', route('registration.member'))
@section('og:title', 'Join the Choir | God\'s Family Choir')
@section('og:description', 'Become a member of God\'s Family Choir. Fill in your details and we will review your application.')

@php
    $memberStartStep = 0;
    if (session('show_reminder')) {
        $memberStartStep = 0;
    } elseif ($errors->hasAny(['voice', 'talent', 'instruments', 'musical_experience', 'choir_experience', 'why_join'])) {
        $memberStartStep = 2;
    } elseif ($errors->hasAny(['occupation', 'workplace', 'church', 'education_level'])) {
        $memberStartStep = 1;
    } elseif ($errors->hasAny(['hobbies', 'skills', 'availability', 'profile_photo', 'message'])) {
        $memberStartStep = 3;
    }
    $memberClientErrors = collect($errors->messages())->map(fn ($messages) => $messages[0] ?? '')->all();
@endphp

@section('content')
<script>
function memberRegister() {
    return {
        step: {{ (int) $memberStartStep }},
        birthdayNote: '',
        submitting: false,
        titles: ['Who you are', 'Work and church', 'Your voice', 'A little more'],
        errors: Object.assign({}, @json($memberClientErrors)),
        stepFields: {
            0: ['first_name', 'last_name', 'email', 'phone', 'birthdate', 'gender', 'joining_year', 'address'],
            1: ['occupation', 'workplace', 'church', 'education_level'],
            2: ['voice', 'talent', 'instruments', 'musical_experience', 'choir_experience', 'why_join'],
            3: ['hobbies', 'skills', 'availability', 'profile_photo', 'message'],
        },
        progress() {
            return ((this.step + 1) / 4) * 100;
        },
        formEl() {
            return this.$el.querySelector('form');
        },
        fieldValue(name) {
            const form = this.formEl();
            const el = form ? form.elements.namedItem(name) : null;
            return el ? el.value : '';
        },
        fieldClass(name, extra = '') {
            const base = extra || 'min-h-[48px] w-full rounded-2xl bg-white px-4 text-sm outline-none placeholder:text-slate-400';
            return this.errors[name]
                ? `${base} border border-rose-300 ring-rose-600/20 focus:border-rose-500 focus:ring-4`
                : `${base} border border-slate-200 ring-emerald-600/20 focus:border-emerald-600 focus:ring-4`;
        },
        setError(name, message) {
            this.errors[name] = message || '';
        },
        nameError(value, label) {
            const text = String(value || '').trim();
            if (!text) return `Enter your ${label}.`;
            if (text.length < 2) return `${label.charAt(0).toUpperCase() + label.slice(1)} is too short.`;
            if (/\d/.test(text) || !/^[\p{L}\s'.’-]+$/u.test(text)) return `Use letters only in your ${label}.`;
            return '';
        },
        emailError(value) {
            const text = String(value || '').trim();
            if (!text) return 'Enter your email.';
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(text)) return 'Enter a valid email address.';
            return '';
        },
        phoneError(value) {
            const digits = String(value || '').replace(/\D+/g, '');
            if (!digits) return 'Enter your phone number.';
            if (digits.length < 9 || digits.length > 15) return 'Enter a valid phone number, for example +250 780 000 000.';
            return '';
        },
        birthError(value) {
            if (!value) return 'Enter your date of birth.';
            const birth = new Date(`${value}T00:00:00`);
            if (Number.isNaN(birth.getTime())) return 'Enter a valid date of birth.';
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            if (birth >= today) return 'Date of birth must be before today.';
            let age = today.getFullYear() - birth.getFullYear();
            const month = today.getMonth() - birth.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birth.getDate())) age -= 1;
            if (age < 8) return 'You must be at least 8 years old to register.';
            if (age > 90) return 'Please check the date of birth.';
            return '';
        },
        photoError(input) {
            const file = input && input.files && input.files[0];
            if (!file) return '';
            if (!file.type.startsWith('image/')) return 'Profile photo must be an image.';
            if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) return 'Use a JPG, PNG, or WebP photo.';
            if (file.size > 2 * 1024 * 1024) return 'Profile photo must be 2MB or smaller.';
            return '';
        },
        validateField(name) {
            const value = this.fieldValue(name);
            let message = '';
            if (name === 'first_name') message = this.nameError(value, 'first name');
            else if (name === 'last_name') message = this.nameError(value, 'last name');
            else if (name === 'email') message = this.emailError(value);
            else if (name === 'phone') message = this.phoneError(value);
            else if (name === 'birthdate') message = this.birthError(value);
            else if (name === 'gender' && !value) message = 'Select your gender.';
            else if (name === 'address') {
                const text = String(value || '').trim();
                if (!text) message = 'Enter your address.';
                else if (text.length < 5) message = 'Enter a fuller address.';
            } else if (name === 'joining_year' && value) {
                const year = Number(value);
                const max = new Date().getFullYear();
                if (!Number.isInteger(year) || year < 1998 || year > max) {
                    message = `Joining year must be between 1998 and ${max}.`;
                }
            } else if (name === 'voice' && !value) {
                message = 'Select the part you sing.';
            } else if (name === 'profile_photo') {
                const form = this.formEl();
                message = this.photoError(form ? form.elements.namedItem(name) : null);
            }
            this.setError(name, message);
            return !message;
        },
        validateStep(step) {
            const names = this.stepFields[step] || [];
            let ok = true;
            names.forEach((name) => {
                if (!this.validateField(name)) ok = false;
            });
            return ok;
        },
        firstErrorStep() {
            for (let i = 0; i <= 3; i++) {
                if (!this.validateStep(i)) return i;
            }
            return -1;
        },
        goNext() {
            if (!this.validateStep(this.step)) {
                this.$nextTick(() => {
                    const first = this.formEl()?.querySelector('.border-rose-300');
                    if (first) first.focus();
                });
                return;
            }
            this.step = Math.min(3, this.step + 1);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        back() {
            this.step = Math.max(0, this.step - 1);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        onBirthday(value) {
            this.validateField('birthdate');
            if (!value) {
                this.birthdayNote = '';
                return;
            }
            const birth = new Date(`${value}T00:00:00`);
            const today = new Date();
            if (birth.getMonth() === today.getMonth() && birth.getDate() === today.getDate()) {
                this.birthdayNote = 'Happy birthday. Welcome to God\'s Family.';
            } else {
                this.birthdayNote = '';
            }
        },
        previewPhoto(input) {
            this.validateField('profile_photo');
            const box = this.$refs.photoPreview;
            const image = this.$refs.previewImage;
            if (!box || !image) return;
            if (input.files && input.files[0] && !this.errors.profile_photo) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    image.src = e.target.result;
                    box.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                image.src = '';
                box.classList.add('hidden');
            }
        },
        submitForm(event) {
            if (this.submitting) return;
            const invalid = this.firstErrorStep();
            if (invalid !== -1) {
                this.step = invalid;
                this.$nextTick(() => {
                    const first = this.formEl()?.querySelector('.border-rose-300');
                    if (first) first.focus();
                });
                return;
            }
            this.submitting = true;
            event.target.submit();
        },
    };
}
</script>

<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32" x-data="memberRegister()">
    <div class="relative mx-auto max-w-2xl px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                Choir member
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Join the choir</h1>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base">
                Tell us who you are and how you sing. We review every application before you become a member.
            </p>
        </div>

        <div class="mb-6 flex items-center rounded-full border border-slate-200 bg-slate-50 p-1">
            <a href="{{ route('registration.member') }}"
               class="flex-1 rounded-full bg-white px-3 py-2.5 text-center text-sm font-semibold text-slate-900 shadow-sm">
                Choir member
            </a>
            <a href="{{ route('registration.friendship') }}"
               class="flex-1 rounded-full px-3 py-2.5 text-center text-sm font-semibold text-slate-500 hover:text-slate-700">
                Friend of the choir
            </a>
        </div>

        <div class="mb-5">
            <div class="mb-2 flex items-center justify-between text-xs font-medium text-slate-500">
                <span x-text="'Step ' + (step + 1) + ' of 4 · ' + titles[step]"></span>
                <span x-text="Math.round(progress()) + '%'"></span>
            </div>
            <div class="h-1.5 overflow-hidden rounded-full bg-slate-100">
                <div class="h-full rounded-full bg-emerald-600 transition-all duration-500" :style="`width: ${progress()}%`"></div>
            </div>
        </div>

        @if ($errors->any() && ! session('show_reminder'))
            <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                Please check the highlighted fields and try again.
            </div>
        @endif

        <form action="{{ route('registration.member.store') }}" method="POST" enctype="multipart/form-data"
              class="space-y-5" novalidate @submit.prevent="submitForm($event)">
            @csrf

            <article x-show="step === 0" x-cloak x-ref="step0"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Step 1</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Who you are</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">We use this to know you and to send your member code.</p>
                </header>

                <div class="space-y-5 p-5 sm:p-7">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">First name <span class="text-rose-500">*</span></span>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required maxlength="80" autocomplete="given-name"
                                placeholder="e.g. Samuel"
                                @blur="validateField('first_name')" @input="validateField('first_name')"
                                :class="fieldClass('first_name')">
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.first_name" x-text="errors.first_name"></p>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Last name <span class="text-rose-500">*</span></span>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required maxlength="80" autocomplete="family-name"
                                placeholder="e.g. Niyonsenga"
                                @blur="validateField('last_name')" @input="validateField('last_name')"
                                :class="fieldClass('last_name')">
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.last_name" x-text="errors.last_name"></p>
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Email <span class="text-rose-500">*</span></span>
                            <input type="email" name="email" value="{{ old('email') }}" required maxlength="255" autocomplete="email"
                                placeholder="you@email.com"
                                @blur="validateField('email')" @input="validateField('email')"
                                :class="fieldClass('email')">
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.email" x-text="errors.email"></p>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Phone <span class="text-rose-500">*</span></span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required maxlength="20" autocomplete="tel"
                                placeholder="e.g. +250 780 000 000"
                                @blur="validateField('phone')" @input="validateField('phone')"
                                :class="fieldClass('phone')">
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.phone" x-text="errors.phone"></p>
                        </label>
                    </div>

                    @if (session('show_reminder') && ($errors->has('email') || $errors->has('phone')))
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm text-slate-700">
                            <p class="font-semibold text-slate-900">Already registered?</p>
                            <p class="mt-1 leading-6">This email or phone is already in our books. We can send your registration code.</p>
                            <div id="reminder-form-container" class="mt-4">
                                <div class="flex flex-col gap-3 sm:flex-row">
                                    <input type="email" id="reminder-email" value="{{ old('email') }}"
                                        placeholder="Your registered email"
                                        class="min-h-[48px] flex-1 rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                    <button type="button" id="reminder-send"
                                        class="inline-flex min-h-[48px] items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white">
                                        Email my code
                                    </button>
                                </div>
                            </div>
                            <p class="mt-3 text-xs text-slate-500">
                                Or open the <a href="{{ route('registration.remind-code') }}" class="font-semibold text-emerald-700 underline">code reminder page</a>.
                            </p>
                        </div>
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Date of birth <span class="text-rose-500">*</span></span>
                            <input type="date" name="birthdate" value="{{ old('birthdate') }}" required
                                min="{{ now()->subYears(90)->toDateString() }}"
                                max="{{ now()->subYears(8)->toDateString() }}"
                                @change="onBirthday($event.target.value)"
                                :class="fieldClass('birthdate')">
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.birthdate" x-text="errors.birthdate"></p>
                            <p x-show="birthdayNote" x-cloak class="mt-2 text-sm text-emerald-700" x-text="birthdayNote"></p>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Gender <span class="text-rose-500">*</span></span>
                            <select name="gender" required @change="validateField('gender')" :class="fieldClass('gender')">
                                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.gender" x-text="errors.gender"></p>
                        </label>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Year you joined the choir</span>
                        <input type="number" name="joining_year" value="{{ old('joining_year') }}" min="1998" max="{{ date('Y') }}"
                            placeholder="e.g. 2019"
                            @blur="validateField('joining_year')" @input="validateField('joining_year')"
                            :class="fieldClass('joining_year')">
                        <p class="mt-1 text-xs text-slate-500">Leave blank if you are joining now.</p>
                        <p class="mt-1 text-sm text-rose-600" x-show="errors.joining_year" x-text="errors.joining_year"></p>
                    </label>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Address <span class="text-rose-500">*</span></span>
                        <textarea name="address" rows="2" required maxlength="500" placeholder="e.g. Nyamirambo, Kigali"
                            @blur="validateField('address')" @input="validateField('address')"
                            :class="fieldClass('address', 'w-full rounded-2xl bg-white px-4 py-3 text-sm outline-none placeholder:text-slate-400')">{{ old('address') }}</textarea>
                        <p class="mt-1 text-sm text-rose-600" x-show="errors.address" x-text="errors.address"></p>
                    </label>
                </div>
            </article>

            <article x-show="step === 1" x-cloak x-ref="step1"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Step 2</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Work and church</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">Optional, but it helps us know the family better.</p>
                </header>
                <div class="grid gap-4 p-5 sm:grid-cols-2 sm:p-7">
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Occupation</span>
                        <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="e.g. Student, teacher, engineer"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Workplace or school</span>
                        <input type="text" name="workplace" value="{{ old('workplace') }}" placeholder="e.g. University of Rwanda"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Church or congregation</span>
                        <input type="text" name="church" value="{{ old('church') }}" placeholder="e.g. ASA UR Nyarugenge"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Education</span>
                        <select name="education_level"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            <option value="" disabled {{ old('education_level') ? '' : 'selected' }}>Select education</option>
                            <option value="primary" {{ old('education_level') == 'primary' ? 'selected' : '' }}>Primary</option>
                            <option value="secondary" {{ old('education_level') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                            <option value="diploma" {{ old('education_level') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="bachelor" {{ old('education_level') == 'bachelor' ? 'selected' : '' }}>Bachelor's degree</option>
                            <option value="master" {{ old('education_level') == 'master' ? 'selected' : '' }}>Master's degree</option>
                            <option value="phd" {{ old('education_level') == 'phd' ? 'selected' : '' }}>Doctorate</option>
                            <option value="other" {{ old('education_level') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </label>
                </div>
            </article>

            <article x-show="step === 2" x-cloak x-ref="step2"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Step 3</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Your voice</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">Choose the part you sing. If you are unsure, say so.</p>
                </header>
                <div class="space-y-5 p-5 sm:p-7">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Voice <span class="text-rose-500">*</span></span>
                            <select name="voice" required @change="validateField('voice')" :class="fieldClass('voice')">
                                <option value="" disabled {{ old('voice') ? '' : 'selected' }}>Select voice</option>
                                <option value="soprano" {{ old('voice') == 'soprano' ? 'selected' : '' }}>Soprano</option>
                                <option value="alto" {{ old('voice') == 'alto' ? 'selected' : '' }}>Alto</option>
                                <option value="tenor" {{ old('voice') == 'tenor' ? 'selected' : '' }}>Tenor</option>
                                <option value="bass" {{ old('voice') == 'bass' ? 'selected' : '' }}>Bass</option>
                                <option value="unsure" {{ old('voice') == 'unsure' ? 'selected' : '' }}>Not sure</option>
                            </select>
                            <p class="mt-1 text-sm text-rose-600" x-show="errors.voice" x-text="errors.voice"></p>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Primary talent</span>
                            <select name="talent"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                <option value="" disabled {{ old('talent') ? '' : 'selected' }}>Select talent</option>
                                <option value="singer" {{ old('talent') == 'singer' ? 'selected' : '' }}>Singer</option>
                                <option value="instrumentalist" {{ old('talent') == 'instrumentalist' ? 'selected' : '' }}>Instrumentalist</option>
                                <option value="both" {{ old('talent') == 'both' ? 'selected' : '' }}>Singer and instrumentalist</option>
                                <option value="choir_director" {{ old('talent') == 'choir_director' ? 'selected' : '' }}>Choir director</option>
                                <option value="other" {{ old('talent') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </label>
                    </div>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Instruments you play</span>
                        <input type="text" name="instruments" value="{{ old('instruments') }}" placeholder="e.g. Piano, guitar, drums"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Musical experience</span>
                        <textarea name="musical_experience" rows="3" placeholder="e.g. 4 years singing, solfa, or school choir"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">{{ old('musical_experience') }}</textarea>
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Previous choir experience</span>
                        <textarea name="choir_experience" rows="3" placeholder="e.g. Church choir, school choir"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">{{ old('choir_experience') }}</textarea>
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Why do you want to join?</span>
                        <textarea name="why_join" rows="3" placeholder="e.g. I want to serve God through music"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">{{ old('why_join') }}</textarea>
                    </label>
                </div>
            </article>

            <article x-show="step === 3" x-cloak x-ref="step3"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Step 4</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">A little more</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">These help us place you, but you can leave them blank.</p>
                </header>
                <div class="space-y-5 p-5 sm:p-7">
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Hobbies</span>
                        <input type="text" name="hobbies" value="{{ old('hobbies') }}" placeholder="e.g. Reading, football, photography"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Other skills</span>
                        <input type="text" name="skills" value="{{ old('skills') }}" placeholder="e.g. Photography, video, design"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Availability</span>
                        <textarea name="availability" rows="3" placeholder="e.g. Monday and Thursday evenings, Saturday afternoon"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">{{ old('availability') }}</textarea>
                    </label>

                    <div>
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Profile photo</span>
                        <div class="flex items-start gap-4">
                            <div x-ref="photoPreview" class="hidden h-20 w-20 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
                                <img x-ref="previewImage" src="" alt="Preview" class="h-full w-full object-cover">
                            </div>
                            <label class="flex-1">
                                <input type="file" name="profile_photo" accept="image/jpeg,image/png,image/webp" @change="previewPhoto($event.target)"
                                    class="block w-full text-sm text-slate-600 file:mr-3 file:rounded-full file:border-0 file:bg-emerald-50 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-emerald-800">
                                <p class="mt-1 text-xs text-slate-500">Optional. JPG, PNG, or WebP, up to 2MB.</p>
                                <p class="mt-1 text-sm text-rose-600" x-show="errors.profile_photo" x-text="errors.profile_photo"></p>
                            </label>
                        </div>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Anything else</span>
                        <textarea name="message" rows="3" placeholder="e.g. Anything else we should know"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4">{{ old('message') }}</textarea>
                    </label>

                    <label class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700">
                        <input type="checkbox" name="newsletter" value="1" id="newsletter" {{ old('newsletter') ? 'checked' : '' }}
                            class="mt-0.5 h-4 w-4 rounded border-slate-300 text-emerald-700 focus:ring-emerald-600">
                        <span>Send me choir news and event updates.</span>
                    </label>

                    <p class="text-sm leading-6 text-slate-500">After you submit, we share the main God's Family WhatsApp group link with you.</p>
                </div>
            </article>

            <div class="flex items-center gap-3">
                <button type="button" @click="back()" x-show="step > 0" x-cloak
                    class="rounded-full px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                    Back
                </button>
                <button type="button" @click="goNext()" x-show="step < 3" x-cloak
                    class="ml-auto inline-flex min-h-[48px] flex-1 items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white sm:flex-none">
                    Continue
                </button>
                <button type="submit" x-show="step === 3" x-cloak :disabled="submitting"
                    class="ml-auto inline-flex min-h-[52px] flex-1 items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white disabled:cursor-not-allowed disabled:bg-slate-300">
                    <span x-text="submitting ? 'Sending...' : 'Submit application'"></span>
                </button>
            </div>
        </form>

        <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm text-slate-600">
            <p class="font-semibold text-slate-900">Need help?</p>
            <p class="mt-1 leading-6">
                Write to
                <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="font-semibold text-emerald-700 underline">asa.godsfamilychoir2017@gmail.com</a>
                or <a href="{{ route('registration.friendship') }}" class="font-semibold text-emerald-700 underline">register as a friend</a> instead.
            </p>
        </div>
    </div>
</div>

<x-static.footer />

@if (session('show_reminder'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('reminder-send');
    const email = document.getElementById('reminder-email');
    const container = document.getElementById('reminder-form-container');
    if (!button || !email || !container) return;

    button.addEventListener('click', function () {
        const value = email.value.trim();
        if (!value) {
            email.focus();
            return;
        }

        const original = button.textContent;
        button.disabled = true;
        button.textContent = 'Sending...';

        const body = new FormData();
        body.append('email', value);
        body.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        fetch(@json(route('registration.remind-code.send')), {
            method: 'POST',
            body,
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
        })
        .then((res) => res.json())
        .then((data) => {
            container.innerHTML = '<p class="' + (data.success ? 'text-emerald-700' : 'text-rose-600') + '">' + (data.message || 'Please try again.') + '</p>';
        })
        .catch(() => {
            button.disabled = false;
            button.textContent = original;
        });
    });
});
</script>
@endif
@endsection
