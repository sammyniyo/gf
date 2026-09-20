@props(['album', 'featured' => false])

<article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
    <a href="{{ route('shop.show', $album->id) }}" class="relative block aspect-square bg-slate-100">
        <img src="{{ $album->cover_image_url }}" alt="{{ $album->title }}" class="h-full w-full object-cover">
        @if($featured)
            <span class="absolute left-3 top-3 rounded-full bg-emerald-700 px-3 py-1 text-xs font-semibold text-white">Featured</span>
        @endif
    </a>

    <div class="p-5">
        <h3 class="text-lg font-semibold text-slate-900">
            <a href="{{ route('shop.show', $album->id) }}" class="hover:text-emerald-700">{{ $album->title }}</a>
        </h3>

        @if($album->description)
            <p class="mt-2 line-clamp-2 text-sm text-slate-600">{{ $album->description }}</p>
        @endif

        <p class="mt-3 text-xs text-slate-500">
            @if($album->track_count > 0)
                {{ $album->track_count }} {{ Str::plural('track', $album->track_count) }}
            @endif
            @if($album->track_count > 0 && $album->release_date)
                ·
            @endif
            @if($album->release_date)
                {{ $album->release_date->format('Y') }}
            @endif
        </p>

        <div class="mt-5 flex items-center justify-between gap-3 border-t border-slate-100 pt-4">
            <span class="text-sm font-semibold {{ $album->isFree() ? 'text-emerald-700' : 'text-slate-900' }}">
                {{ $album->isFree() ? 'Free' : '$' . number_format($album->price, 2) }}
            </span>
            <a href="{{ route('shop.show', $album->id) }}"
               class="inline-flex rounded-full bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-600">
                {{ $album->isFree() ? 'Listen' : 'View' }}
            </a>
        </div>
    </div>
</article>
