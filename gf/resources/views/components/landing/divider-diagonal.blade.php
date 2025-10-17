@props(['fromColor' => 'emerald', 'toColor' => 'white', 'flip' => false])

@php
    $gradients = [
        'emerald-white' => 'from-emerald-600 to-white',
        'amber-white' => 'from-amber-500 to-white',
        'blue-white' => 'from-blue-600 to-white',
        'white-emerald' => 'from-white to-emerald-600',
        'white-amber' => 'from-white to-amber-500',
        'emerald-amber' => 'from-emerald-600 to-amber-500',
        'gray-white' => 'from-gray-50 to-white',
        'white-gray' => 'from-white to-gray-50',
    ];

    $gradientClass = $gradients[$fromColor . '-' . $toColor] ?? 'from-emerald-600 to-white';
@endphp

<div class="relative h-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br {{ $gradientClass }} {{ $flip ? 'transform rotate-180' : '' }}"
         style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 70%);">
    </div>
</div>

