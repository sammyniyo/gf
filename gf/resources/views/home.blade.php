@extends('layouts.app')

@section('title', 'Home | God\'s Family Choir')

@section('content')
    <x-landing.hero />
    <x-landing.logo-carousel />
    <x-landing.features />
    <x-landing.spotify-albums />
    <x-landing.stats-strip />
    <x-landing.unlock-power />
    <x-landing.testimonials />
    <x-landing.final-cta />
    <x-static.footer />
@endsection
