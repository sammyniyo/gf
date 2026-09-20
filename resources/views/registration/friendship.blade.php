@extends('layouts.app')

@section('title', 'Become a Friend | God\'s Family Choir')
@section('meta_description', 'Register as a friend of God\'s Family Choir. Stay close to concerts, updates, and the ministry without joining as a chorister.')
@section('canonical_url', route('registration.friendship'))
@section('og:title', 'Become a Friend | God\'s Family Choir')
@section('og:description', 'Join God\'s Family as a friend. Receive updates, event news, and a Friend ID.')

@php
    $friendStartStep = 0;
    if (session('show_reminder')) {
        $friendStartStep = 0;
    } elseif ($errors->hasAny(['occupation', 'church', 'message'])) {
        $friendStartStep = 1;
    }
@endphp

@section('content')
<script>
function friendRegister() {
    return {
        step: {{ (int) $friendStartStep }},
        submitting: false,
        photoName: '',
        titles: ['Who you are', 'Stay connected'],
        progress() {
            return ((this.step + 1) / 2) * 100;
        },
        currentPanel() {
            return this.$refs['step' + this.step];
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
            this.step = 1;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        back() {
            this.step = 0;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        previewPhoto(input) {
            const image = this.$refs.previewImage;
            const placeholder = this.$refs.photoPlaceholder;
            const file = input.files && input.files[0];
            if (!file) {
                this.photoName = '';
                if (image) {
                    image.src = '';
                    image.classList.add('hidden');
                }
                if (placeholder) placeholder.classList.remove('hidden');
                return;
            }
            this.photoName = file.name;
            const reader = new FileReader();
            reader.onload = (e) => {
                if (image) {
                    image.src = e.target.result;
                    image.classList.remove('hidden');
                }
                if (placeholder) placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        },
        onSubmit() {
            this.submitting = true;
        },
        init() {
            this.$nextTick(() => {
                const form = this.$el.querySelector('form');
                if (!form) return;
                form.addEventListener('invalid', (event) => {
                    for (let i = 0; i <= 1; i++) {
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

<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32" x-data="friendRegister()">
    <div class="relative mx-auto max-w-2xl px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-amber-100 bg-amber-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-amber-700">
                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                Friend of the choir
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Become a friend</h1>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base">
                Stay close to the ministry without joining as a chorister. You will get a Friend ID and choir updates.
            </p>
        </div>

        <div class="mb-6 flex items-center rounded-full border border-slate-200 bg-slate-50 p-1">
            <a href="{{ route('registration.member') }}"
               class="flex-1 rounded-full px-3 py-2.5 text-center text-sm font-semibold text-slate-500 hover:text-slate-700">
                Choir member
            </a>
            <a href="{{ route('registration.friendship') }}"
               class="flex-1 rounded-full bg-white px-3 py-2.5 text-center text-sm font-semibold text-slate-900 shadow-sm">
                Friend of the choir
            </a>
        </div>

        <div class="mb-5">
            <div class="mb-2 flex items-center justify-between text-xs font-medium text-slate-500">
                <span x-text="'Step ' + (step + 1) + ' of 2 · ' + titles[step]"></span>
                <span x-text="Math.round(progress()) + '%'"></span>
            </div>
            <div class="h-1.5 overflow-hidden rounded-full bg-slate-100">
                <div class="h-full rounded-full bg-amber-500 transition-all duration-500" :style="`width: ${progress()}%`"></div>
            </div>
        </div>

        @if ($errors->any() && ! session('show_reminder'))
            <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                Please check the highlighted fields and try again.
            </div>
        @endif

        @if (session('error'))
            <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('registration.friendship.store') }}" method="POST" enctype="multipart/form-data"
              class="space-y-5" id="friendship-form" @submit="onSubmit()">
            @csrf

            <article x-show="step === 0" x-cloak x-ref="step0"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-amber-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-amber-700">Step 1</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Who you are</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">A clear photo helps us recognize you in the family.</p>
                </header>

                <div class="space-y-5 p-5 sm:p-7">
                    <div>
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Profile photo <span class="text-rose-500">*</span></span>
                        <div class="flex flex-col items-start gap-4 sm:flex-row">
                            <div class="relative h-24 w-24 overflow-hidden rounded-2xl border border-dashed border-slate-300 bg-slate-50">
                                <img x-ref="previewImage" src="" alt="Selected photo" class="hidden h-full w-full object-cover">
                                <div x-ref="photoPlaceholder" class="flex h-full w-full flex-col items-center justify-center text-xs font-medium text-slate-400">
                                    Photo
                                </div>
                            </div>
                            <label class="flex-1">
                                <input type="file" name="profile_photo" accept="image/*" required @change="previewPhoto($event.target)"
                                    class="block w-full text-sm text-slate-600 file:mr-3 file:rounded-full file:border-0 file:bg-amber-50 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-amber-800">
                                <p class="mt-1 text-xs text-slate-500">Clear headshot, JPG or PNG, up to 2MB.</p>
                                <p x-show="photoName" x-cloak class="mt-1 text-xs text-slate-600" x-text="photoName"></p>
                                @error('profile_photo') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                            </label>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">First name <span class="text-rose-500">*</span></span>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                            @error('first_name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Last name <span class="text-rose-500">*</span></span>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                            @error('last_name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Email <span class="text-rose-500">*</span></span>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                            @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Phone <span class="text-rose-500">*</span></span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+250 XXX XXX XXX"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
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
                                        class="min-h-[48px] flex-1 rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                                    <button type="button" id="reminder-send"
                                        class="inline-flex min-h-[48px] items-center justify-center rounded-full bg-amber-500 px-5 text-sm font-semibold text-white">
                                        Email my code
                                    </button>
                                </div>
                            </div>
                            <p class="mt-3 text-xs text-slate-500">
                                Or open the <a href="{{ route('registration.remind-code') }}" class="font-semibold text-amber-700 underline">code reminder page</a>.
                            </p>
                        </div>
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Date of birth</span>
                            <input type="date" name="birthdate" value="{{ old('birthdate') }}"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Gender</span>
                            <select name="gender"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                                <option value="">Select</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </label>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Address</span>
                        <textarea name="address" rows="2" placeholder="Optional"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">{{ old('address') }}</textarea>
                    </label>
                </div>
            </article>

            <article x-show="step === 1" x-cloak x-ref="step1"
                     class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="border-b border-slate-100 bg-gradient-to-br from-amber-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-amber-700">Step 2</p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Stay connected</h2>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600">A few extra details, then we welcome you as a friend.</p>
                </header>

                <div class="space-y-5 p-5 sm:p-7">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Occupation</span>
                            <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="Student, teacher, engineer"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Church or congregation</span>
                            <input type="text" name="church" value="{{ old('church') }}" placeholder="ASA UR Nyarugenge"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">
                        </label>
                    </div>

                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">A short message</span>
                        <textarea name="message" rows="4" placeholder="How you know the choir, or why you want to stay close"
                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-amber-500/20 focus:border-amber-500 focus:ring-4">{{ old('message') }}</textarea>
                    </label>

                    <label class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700">
                        <input type="checkbox" name="newsletter" value="1" id="newsletter" {{ old('newsletter') ? 'checked' : '' }}
                            class="mt-0.5 h-4 w-4 rounded border-slate-300 text-amber-500 focus:ring-amber-500">
                        <span>Send me choir news and event updates.</span>
                    </label>

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm text-slate-600">
                        <p class="font-semibold text-slate-900">What you receive</p>
                        <ul class="mt-2 space-y-1.5 leading-6">
                            <li>Concert and event updates</li>
                            <li>We share the main God's Family WhatsApp group link</li>
                            <li>Your unique Friend ID</li>
                            <li>Ways to support the ministry</li>
                        </ul>
                    </div>
                </div>
            </article>

            <div class="flex items-center gap-3">
                <button type="button" @click="back()" x-show="step > 0" x-cloak
                    class="rounded-full px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                    Back
                </button>
                <button type="button" @click="next()" x-show="step === 0" x-cloak
                    class="ml-auto inline-flex min-h-[48px] flex-1 items-center justify-center rounded-full bg-amber-500 px-5 text-sm font-semibold text-white sm:flex-none">
                    Continue
                </button>
                <button type="submit" x-show="step === 1" x-cloak :disabled="submitting"
                    class="ml-auto inline-flex min-h-[52px] flex-1 items-center justify-center rounded-full bg-amber-500 px-5 text-sm font-semibold text-white disabled:cursor-not-allowed disabled:bg-slate-300">
                    <span x-text="submitting ? 'Sending...' : 'Join as a friend'"></span>
                </button>
            </div>
        </form>

        <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm text-slate-600">
            <p class="font-semibold text-slate-900">Want to sing with us?</p>
            <p class="mt-1 leading-6">
                <a href="{{ route('registration.member') }}" class="font-semibold text-emerald-700 underline">Register as a choir member</a>
                or write to
                <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="font-semibold text-emerald-700 underline">asa.godsfamilychoir2017@gmail.com</a>.
            </p>
        </div>
    </div>
</div>

<x-static.footer />

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('friendship-form');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(function (input) {
        if (!input.name || input.type === 'file') return;

        if (input.type === 'checkbox' || input.type === 'radio') {
            const key = 'friendship_' + input.name + '_checked';
            const saved = localStorage.getItem(key);
            if (saved !== null) input.checked = saved === 'true';
            input.addEventListener('change', function () {
                localStorage.setItem(key, String(input.checked));
            });
            return;
        }

        const key = 'friendship_' + input.name;
        const saved = localStorage.getItem(key);
        if (saved !== null && !input.value) input.value = saved;
        input.addEventListener('input', function () {
            localStorage.setItem(key, input.value);
        });
    });

    form.addEventListener('submit', function () {
        inputs.forEach(function (input) {
            if (!input.name) return;
            localStorage.removeItem('friendship_' + input.name);
            localStorage.removeItem('friendship_' + input.name + '_checked');
        });
    });

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
@endpush
@endsection
