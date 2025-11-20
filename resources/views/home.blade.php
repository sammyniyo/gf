@extends('layouts.app')

@section('title', 'Welcome to Gods Family Choir | ASA UR Nyarugenge SDA')
@section('meta_description', 'Experience God\'s Family Choir from Kigali, Rwanda—over 300 worshippers serving the words of life to the world through gospel music, ministry, and community.')
@section('meta_keywords', 'Gods Family Choir, ASA UR Nyarugenge, Adventist choir Rwanda, gospel music Kigali, worship ministry, Seventh-day Adventist choir')
@section('meta_author', 'Gods Family Choir')
@section('og:title', 'Welcome to Gods Family Choir | ASA UR Nyarugenge SDA')
@section('og:description', 'Gods Family Choir is a choir that sings for God. It is a choir that sings for the people. It is a choir that sings for the community. It is a choir that sings for the world.')
@section('og:image', asset('images/hero.jpg'))
@section('og:url', url('/'))
@section('og:type', 'website')
@section('og:locale', 'en_US')
@section('content')
    <!-- Include Transition Styles & Scripts -->
    <x-landing.section-transitions />

    <!-- Hero Section -->
    <div class="fade-in-section"><x-landing.hero /></div>

    <!-- Audio Player Section -->
    <div class="fade-in-section mt-0"><x-landing.audio-player /></div>

    <!-- Interactive Photo Gallery -->
    <div class="fade-in-section mt-0"><x-landing.interactive-gallery :galleries="$galleryImages ?? collect([])" /></div>

    <!-- Upcoming Events -->
    <div class="fade-in-section mt-0"><x-landing.upcoming-events-dynamic :nextEvent="$nextEvent ?? null" /></div>

    <!-- Spotify Albums -->
    <div class="fade-in-section mt-0"><x-landing.spotify-dynamic :spotifyTracks="$spotifyTracks ?? null" /></div>

    <!-- Unlock Power Section -->

    <!-- Testimonials -->
    <div class="fade-in-section mt-0"><x-landing.testimonials-redesigned /></div>

    <!-- Final CTA -->
    <div class="fade-in-section mt-0"><x-landing.final-cta /></div>

    <!-- Footer -->
    <x-static.footer />
@endsection
