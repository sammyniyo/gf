@extends('layouts.app')

@section('title', 'Welcome to Gods Family Choir | ASA UR Nyarugenge SDA')
@section('description', 'Gods Family Choir is a choir that sings for God. It is a choir that sings for the people. It is a choir that sings for the community. It is a choir that sings for the world.')
@section('keywords', 'Gods Family Choir, ASA UR Nyarugenge SDA, Choir, Music, Worship, Jesus, Gospel, Christian, Church')
@section('author', 'Gods Family Choir')
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
    <div class="fade-in-section"><x-landing.audio-player /></div>

    <!-- Interactive Photo Gallery -->
    <div class="fade-in-section"><x-landing.interactive-gallery :galleries="$galleryImages ?? collect([])" /></div>

    <!-- Upcoming Events -->
    <div class="fade-in-section"><x-landing.upcoming-events-dynamic :nextEvent="$nextEvent ?? null" /></div>

    <!-- Spotify Albums -->
    <div class="fade-in-section"><x-landing.spotify-dynamic :spotifyTracks="$spotifyTracks ?? null" /></div>

    <!-- Unlock Power Section -->

    <!-- Testimonials -->
    <div class="fade-in-section"><x-landing.testimonials-redesigned /></div>

    <!-- Final CTA -->
    <div class="fade-in-section"><x-landing.final-cta /></div>

    <!-- Footer -->
    <x-static.footer />
@endsection
