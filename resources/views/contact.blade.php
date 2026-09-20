@extends('layouts.app')

@section('title', 'Contact | God\'s Family Choir')
@section('meta_description', 'Write to God\'s Family Choir in Kigali. Book an event, ask a question, or say hello.')
@section('canonical_url', route('contact'))

@section('content')
<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32"
     x-data="{
        selectedSubject: @js(old('subject', '')),
        fileName: '',
        get showAttachment() { return this.selectedSubject === 'Event Booking'; }
     }">
    <div class="relative mx-auto max-w-2xl px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                Contact
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900">Write to us</h1>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600">
                Questions, bookings, or a greeting. We reply within a day.
            </p>
        </div>

        <div class="mb-6 flex flex-wrap justify-center gap-x-5 gap-y-2 text-sm text-slate-600">
            <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="hover:text-emerald-700">asa.godsfamilychoir2017@gmail.com</a>
            <a href="https://maps.google.com/?q=Nyamirambo+SDA+Kigali" target="_blank" rel="noopener" class="hover:text-emerald-700">Nyamirambo SDA, Kigali</a>
        </div>

        <article class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
            <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Message</p>
                <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900">Send a note</h2>
            </header>

            <form method="POST" action="{{ route('contact.submit') }}" enctype="multipart/form-data" class="space-y-5 p-5 sm:p-7">
                @csrf
                <div class="hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                </div>

                @if(session('success'))
                    <p class="rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</p>
                @endif

                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Name <span class="text-rose-500">*</span></span>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                        @error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Email <span class="text-rose-500">*</span></span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                        @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </label>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Phone</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+250 XXX XXX XXX"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    </label>
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Subject</span>
                        <select name="subject" x-model="selectedSubject"
                            class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                            <option value="">Select a topic</option>
                            <option value="General Inquiry">General inquiry</option>
                            <option value="Event Booking">Event booking</option>
                            <option value="Join Choir">Join the choir</option>
                            <option value="Prayer Request">Prayer request</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                    </label>
                </div>

                <div x-show="showAttachment" x-cloak>
                    <span class="mb-1.5 block text-sm font-medium text-slate-700">Invitation (optional)</span>
                    <label class="block rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-4 text-sm text-slate-600">
                        <input type="file" name="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                            @change="fileName = $event.target.files[0]?.name || ''"
                            class="block w-full text-sm file:mr-3 file:rounded-full file:border-0 file:bg-white file:px-4 file:py-2 file:font-semibold file:text-slate-700">
                        <span class="mt-2 block text-xs text-slate-500" x-text="fileName || 'PDF, DOC, or image, up to 10MB.'"></span>
                    </label>
                    @error('attachment') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>

                <label class="block">
                    <span class="mb-1.5 block text-sm font-medium text-slate-700">Message <span class="text-rose-500">*</span></span>
                    <textarea name="message" rows="5" required maxlength="1000"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">{{ old('message') }}</textarea>
                    @error('message') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
                </label>

                <button type="submit"
                    class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-emerald-700 text-sm font-semibold text-white hover:bg-emerald-600">
                    Send message
                </button>
            </form>
        </article>

        <p class="mt-6 text-center text-sm text-slate-500">
            Want to sing with us?
            <a href="{{ route('registration.member') }}" class="font-semibold text-emerald-700 underline">Register as a member</a>
            or
            <a href="{{ route('registration.friendship') }}" class="font-semibold text-amber-700 underline">become a friend</a>.
        </p>
    </div>
</div>

<x-static.footer />
@endsection
