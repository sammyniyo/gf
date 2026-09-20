@php
    $socials = collect($member->formatted_social_links ?? [])
        ->filter(fn ($social) => filled($social['url'] ?? null));
    $knownIcons = ['facebook', 'instagram', 'youtube', 'tiktok'];
@endphp

<article class="flex gap-4 rounded-[22px] border border-slate-200/80 bg-white p-3.5 sm:p-4">
    <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-2xl bg-emerald-50 sm:h-28 sm:w-28">
        <div class="flex h-full w-full items-center justify-center">
            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-700 text-lg font-semibold text-white">
                {{ strtoupper(substr($member->name, 0, 1)) }}
            </span>
        </div>
        @if($member->photo)
            <img src="{{ Storage::url($member->photo) }}"
                 alt="{{ $member->name }}"
                 class="absolute inset-0 h-full w-full object-cover object-top"
                 onerror="this.style.display='none'">
        @endif
    </div>
    <div class="min-w-0 flex-1 py-0.5">
        <h3 class="text-base font-semibold tracking-tight text-slate-900">{{ $member->name }}</h3>
        @if($member->position)
            <p class="mt-0.5 text-sm font-medium leading-5 text-emerald-700">{{ $member->position }}</p>
        @endif
        @if($member->bio)
            <p class="mt-2 line-clamp-2 text-sm leading-5 text-slate-600">{{ $member->bio }}</p>
        @endif
        @include('committee.partials.socials', ['socials' => $socials, 'knownIcons' => $knownIcons])
    </div>
</article>
