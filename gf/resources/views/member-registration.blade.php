@extends('layouts.app')

@section('content')
    <section class="relative bg-white py-20">
        <div class="absolute -right-32 -top-32 w-64 h-64 rounded-full bg-lime-400 opacity-20 blur-3xl"></div>
        <div class="absolute -left-32 -bottom-32 w-64 h-64 rounded-full bg-emerald-500 opacity-20 blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-emerald-800 mb-4">Join the Choir Family</h2>
                <p class="text-lg text-gray-600">We are excited to welcome new voices, talents, and hearts. Fill out the form
                    below to be part of God's Family Choir.</p>
            </div>

            <form method="POST" action="{{ route('choir.register') }}" enctype="multipart/form-data"
                class="bg-white shadow-xl rounded-3xl p-8 border border-gray-200 grid gap-6">
                @csrf

                <x-form.input name="name" label="Full Name" required />

                <x-form.input name="email" label="Email Address" type="email" required />

                <x-form.input name="phone" label="Phone Number" type="tel" required />

                <x-form.input name="birthdate" label="Birthday" type="date" required />

                <x-form.input name="address" label="Physical Address" required />

                <x-form.input name="occupation" label="Occupation / Job Title" />

                <x-form.input name="workplace" label="Workplace" />

                <x-form.input name="church" label="Your Church" />

                <x-form.select name="voice" label="Voice" :options="['Soprano', 'Alto', 'Tenor', 'Bass', 'Other']" required />

                <x-form.select name="talent" label="Musical Talent" :options="['Singer', 'Instrumentalist', 'Composer', 'Technician', 'Other']" />

                <x-form.input name="hobbies" label="Hobbies / Interests" />

                <x-form.select name="status" label="Membership Status" :options="['Active', 'Inactive', 'Guest']" required />

                <x-form.input name="joined_at" label="Join Date" type="date" />

                <x-form.input name="roles" label="Choir / Church Roles"
                    placeholder="e.g., Conductor, Pianist, Organizer" />

                <x-form.file name="photo" label="Upload Your Picture" />

                <x-form.textarea name="message" label="Message to Us" rows="4" />

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-6 rounded-xl shadow-xl transition-all duration-300 flex items-center justify-center transform hover:scale-105">
                        <span>Submit Registration</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <x-static.footer />
@endsection
