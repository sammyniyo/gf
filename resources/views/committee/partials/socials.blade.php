@if($socials->isNotEmpty())
    <div class="mt-3 flex flex-wrap gap-2">
        @foreach($socials as $social)
            @php
                $icon = strtolower($social['platform'] ?? '');
                $known = in_array($icon, $knownIcons, true);
            @endphp
            <a href="{{ $social['url'] }}"
               target="_blank"
               rel="noopener noreferrer"
               class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition hover:border-emerald-200 hover:text-emerald-700"
               aria-label="{{ $social['platform'] }}">
                @if($known)
                    <x-icon.simple :name="$icon" class="h-4 w-4" />
                @elseif(filled($social['icon'] ?? null))
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="{{ $social['icon'] }}"/>
                    </svg>
                @else
                    <span class="text-[10px] font-semibold uppercase">{{ substr($icon, 0, 2) }}</span>
                @endif
            </a>
        @endforeach
    </div>
@endif
