@props(['icon' => 'music', 'color' => 'emerald'])

@php
    $icons = [
        'music' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />',
        'heart' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />',
        'star' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />',
        'sparkles' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />',
    ];

    $iconPath = $icons[$icon] ?? $icons['music'];

    $gradients = [
        'emerald' => 'linear-gradient(135deg, #10b981, #059669)',
        'amber' => 'linear-gradient(135deg, #fbbf24, #f59e0b)',
        'blue' => 'linear-gradient(135deg, #3b82f6, #2563eb)',
        'purple' => 'linear-gradient(135deg, #a855f7, #7c3aed)',
    ];

    $dotColors = [
        'emerald' => '#34d399',
        'amber' => '#fcd34d',
        'blue' => '#60a5fa',
        'purple' => '#c084fc',
    ];

    $gradient = $gradients[$color] ?? $gradients['emerald'];
    $dotColor = $dotColors[$color] ?? $dotColors['emerald'];
@endphp

<div class="relative py-10 flex items-center justify-center">
    <!-- Animated line -->
    <div class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-white/20"></div>
    </div>

    <!-- Icon container -->
    <div class="relative px-4">
        <div class="w-14 h-14 rounded-full flex items-center justify-center shadow-lg shadow-black/20 ring-4 ring-white/10"
             style="background: {{ $gradient }};">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $iconPath !!}
            </svg>
        </div>
    </div>

    <!-- Decorative dots -->
    <div class="absolute left-[22%] transform -translate-x-1/2">
        <div class="flex gap-1">
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }};"></div>
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }}; animation-delay: 0.2s;"></div>
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }}; animation-delay: 0.4s;"></div>
        </div>
    </div>

    <div class="absolute right-[22%] transform translate-x-1/2">
        <div class="flex gap-1">
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }};"></div>
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }}; animation-delay: 0.2s;"></div>
            <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: {{ $dotColor }}; animation-delay: 0.4s;"></div>
        </div>
    </div>
</div>

