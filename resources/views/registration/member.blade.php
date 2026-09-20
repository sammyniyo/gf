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
@endphp

@section('content')
<script>
function memberRegister() {
    return {
        step: {{ (int) $memberStartStep }},
        birthdayNote: '',
        submitting: false,
        titles: ['Who you are', 'Work and church', 'Your voice', 'A little more'],
        progress() {
            return ((this.step + 1) / 4) * 100;
        },
        currentPanel() {
            return this.$refs['step' + this.step];
        },
        canAdvance() {
            const panel = this.currentPanel();
            if (!panel) return false;
            return Array.from(panel.querySelectorAll('input, select, textarea')).every((el) => el.checkValidity());
        },
        next() {
            const panel = this.currentPanel();
            if (!panel) return;
            for (const el of panel.querySelectorAll('input, select, textarea')) {
                if (!el.checkValidity()) {
                    el.reportValidity();
                    return;
                }
            }
            this.step = Math.min(3, this.step + 1);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        back() {
            this.step = Math.max(0, this.step - 1);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        onBirthday(value) {
            if (!value) {
                this.birthdayNote = '';
                return;
            }
            const birth = new Date(value);
            const today = new Date();
            if (birth.getMonth() === today.getMonth() && birth.getDate() === today.getDate()) {
                this.birthdayNote = 'Happy birthday. Welcome to God\'s Family.';
            } else {
                this.birthdayNote = '';
            }
        },
        previewPhoto(input) {
            const box = this.$refs.photoPreview;
            const image = this.$refs.previewImage;
            if (!box || !image) return;
            if (input.files && input.files[0]) {
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
        onSubmit() {
            this.submitting = true;
        },
        init() {
            this.$nextTick(() => {
                const form = this.$el.querySelector('form');
                if (!form) return;
                form.addEventListener('invalid', (event) => {
                    for (let i = 0; i <= 3; i++) {
                        const panel = this.$refs['step' + i];
                        if (panel && panel.contains(event.target)) {
                            this.step = i;
                            break;
                        }
                    }
                }, true);
            });
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
              class="space-y-5" @submit="onSubmit()">
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
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            @error('first_name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Last name <span class="text-rose-500">*</span></span>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            @error('last_name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Email <span class="text-rose-500">*</span></span>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Phone <span class="text-rose-500">*</span></span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+250 XXX XXX XXX"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            @error('phone') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
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
                                @change="onBirthday($event.target.value)"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            @error('birthdate') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                            <p x-show="birthdayNote" x-cloak class="mt-2 text-sm text-emerald-700" x-text="birthdayNote"></p>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Gender <span class="text-rose-500">*</span></span>
                            <select name="gender" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                <option value="">Select</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Year you joined the choir</span>
                        <input type="number" name="joining_year" value="{{ old('joining_year') }}" min="1998" max="{{ date('Y') }}"
                            placeholder="{{ date('Y') }}"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                        <p class="mt-1 text-xs text-slate-500">Leave blank if you are joining now.</p>
                        @error('joining_year') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </label>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Address <span class="text-rose-500">*</span></span>
                        <textarea name="address" rows="2" required
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('address') }}</textarea>
                        @error('address') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
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
                        <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="Student, teacher, engineer"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Workplace or school</span>
                        <input type="text" name="workplace" value="{{ old('workplace') }}"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Church or congregation</span>
                        <input type="text" name="church" value="{{ old('church') }}" placeholder="ASA UR Nyarugenge"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Education</span>
                        <select name="education_level"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            <option value="">Select</option>
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
                            <select name="voice" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                <option value="">Select voice</option>
                                <option value="soprano" {{ old('voice') == 'soprano' ? 'selected' : '' }}>Soprano</option>
                                <option value="alto" {{ old('voice') == 'alto' ? 'selected' : '' }}>Alto</option>
                                <option value="tenor" {{ old('voice') == 'tenor' ? 'selected' : '' }}>Tenor</option>
                                <option value="bass" {{ old('voice') == 'bass' ? 'selected' : '' }}>Bass</option>
                                <option value="unsure" {{ old('voice') == 'unsure' ? 'selected' : '' }}>Not sure</option>
                            </select>
                            @error('voice') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Primary talent</span>
                            <select name="talent"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                <option value="">Select</option>
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
                        <input type="text" name="instruments" value="{{ old('instruments') }}" placeholder="Piano, guitar, drums"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Musical experience</span>
                        <textarea name="musical_experience" rows="3" placeholder="Training, years singing, or anything useful"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('musical_experience') }}</textarea>
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Previous choir experience</span>
                        <textarea name="choir_experience" rows="3" placeholder="Choirs you have sung with"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('choir_experience') }}</textarea>
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Why do you want to join?</span>
                        <textarea name="why_join" rows="3" placeholder="A few words about your heart for this ministry"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('why_join') }}</textarea>
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
                        <input type="text" name="hobbies" value="{{ old('hobbies') }}"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Other skills</span>
                        <input type="text" name="skills" value="{{ old('skills') }}" placeholder="Photography, video, design"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Availability</span>
                        <textarea name="availability" rows="3" placeholder="Evenings, Saturdays, or rehearsal days you can keep"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('availability') }}</textarea>
                    </label>

                    <div>
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Profile photo</span>
                        <div class="flex items-start gap-4">
                            <div x-ref="photoPreview" class="hidden h-20 w-20 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
                                <img x-ref="previewImage" src="" alt="Preview" class="h-full w-full object-cover">
                            </div>
                            <label class="flex-1">
                                <input type="file" name="profile_photo" accept="image/*" @change="previewPhoto($event.target)"
                                    class="block w-full text-sm text-slate-600 file:mr-3 file:rounded-full file:border-0 file:bg-emerald-50 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-emerald-800">
                                <p class="mt-1 text-xs text-slate-500">Optional. JPG or PNG, up to 2MB.</p>
                                @error('profile_photo') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                            </label>
                        </div>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Anything else</span>
                        <textarea name="message" rows="3"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('message') }}</textarea>
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
                <button type="button" @click="next()" x-show="step < 3" x-cloak
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
