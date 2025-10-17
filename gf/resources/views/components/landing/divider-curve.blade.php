@props(['color' => 'white', 'flip' => false])

@php
    $bgColors = [
        'emerald' => 'fill-emerald-600',
        'amber' => 'fill-amber-500',
        'blue' => 'fill-blue-600',
        'purple' => 'fill-purple-600',
        'white' => 'fill-white',
        'gray' => 'fill-gray-50',
        'dark' => 'fill-gray-900',
    ];

    $fillClass = $bgColors[$color] ?? 'fill-white';
@endphp

<div class="relative h-10 md:h-14 overflow-hidden {{ $flip ? 'transform rotate-180' : '' }}">
    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0 C400,60 800,60 1200,0 L1200,120 L0,120 Z"
              class="{{ $fillClass }}">
        </path>
    </svg>
</div>

