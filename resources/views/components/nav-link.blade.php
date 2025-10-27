<!-- components/nav-link.blade.php -->
@props(['href', 'active' => false])

<a href="{{ $href }}"
    {{ $attributes->class([
        'px-4 py-2 text-sm font-medium transition-colors duration-200 rounded-lg',
        'bg-emerald-800 text-emerald-100' => $active,
        'text-white hover:text-emerald-200' => !$active,
    ]) }}>
    {{ $slot }}
</a>
