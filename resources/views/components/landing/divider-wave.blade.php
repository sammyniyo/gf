@props(['color' => 'emerald', 'flip' => false])

@php
    $colors = [
        'emerald' => ['from' => '#059669', 'to' => '#10b981'],
        'amber' => ['from' => '#f59e0b', 'to' => '#fbbf24'],
        'blue' => ['from' => '#2563eb', 'to' => '#3b82f6'],
        'purple' => ['from' => '#7c3aed', 'to' => '#a855f7'],
        'white' => ['from' => '#ffffff', 'to' => '#f9fafb'],
        'gray' => ['from' => '#f9fafb', 'to' => '#f3f4f6'],
    ];

    $selectedColor = $colors[$color] ?? $colors['emerald'];
@endphp

<div class="relative h-14 md:h-20 overflow-hidden {{ $flip ? 'transform rotate-180' : '' }}">
    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <defs>
            <linearGradient id="wave-gradient-{{ $color }}-{{ $flip ? 'flip' : 'normal' }}" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:{{ $selectedColor['from'] }};stop-opacity:1" />
                <stop offset="100%" style="stop-color:{{ $selectedColor['to'] }};stop-opacity:1" />
            </linearGradient>
        </defs>
        <path d="M0,0 C200,40 400,0 600,25 C800,50 1000,10 1200,30 L1200,120 L0,120 Z"
              fill="url(#wave-gradient-{{ $color }}-{{ $flip ? 'flip' : 'normal' }})"
              class="wave-animation" style="animation-delay: 0s; opacity: .95;">
        </path>
        <path d="M0,10 C220,60 420,10 600,35 C780,60 980,10 1200,40 L1200,120 L0,120 Z"
              fill="url(#wave-gradient-{{ $color }}-{{ $flip ? 'flip' : 'normal' }})"
              opacity="0.35"
              class="wave-animation" style="animation-delay: -5s;">
        </path>
    </svg>
</div>

