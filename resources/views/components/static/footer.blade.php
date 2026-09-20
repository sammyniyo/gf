@php
    $socials = [
        ['label' => 'Facebook', 'href' => 'https://www.facebook.com/FChoirOfGod', 'icon' => 'facebook'],
        ['label' => 'Instagram', 'href' => 'https://www.instagram.com/choir_of_god', 'icon' => 'instagram'],
        ['label' => 'YouTube', 'href' => 'https://www.youtube.com/@godsfamilychoir5583', 'icon' => 'youtube'],
        ['label' => 'TikTok', 'href' => 'https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1', 'icon' => 'tiktok'],
        ['label' => 'Spotify', 'href' => 'https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J', 'icon' => 'spotify'],
        ['label' => 'Apple Music', 'href' => 'https://music.apple.com/us/artist/gods-family-choir/1793673660', 'icon' => 'applemusic'],
    ];
    $links = [
        ['name' => 'About', 'url' => route('about')],
        ['name' => 'Events', 'url' => route('events.index')],
        ['name' => 'Music', 'url' => route('shop.index')],
        ['name' => 'Join', 'url' => route('registration.member')],
        ['name' => 'Contact', 'url' => route('contact')],
    ];
@endphp

<footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-6 pb-24 sm:px-6 sm:pb-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                <img src="{{ asset('adventist-en-tm--denim.png') }}" alt="" class="h-8 w-8 object-contain">
                <span class="text-sm font-semibold text-slate-900">God's Family Choir</span>
            </a>
            <nav class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-slate-600">
                @foreach($links as $link)
                    <a href="{{ $link['url'] }}" class="hover:text-emerald-700">{{ $link['name'] }}</a>
                @endforeach
            </nav>
        </div>
        <div class="flex items-center justify-center gap-2 sm:justify-start">
            @foreach($socials as $social)
                <a href="{{ $social['href'] }}" target="_blank" rel="noopener noreferrer"
                   title="{{ $social['label'] }}" aria-label="{{ $social['label'] }}"
                   class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-700 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700">
                    <x-icon.simple :name="$social['icon']" class="h-[18px] w-[18px]" />
                </a>
            @endforeach
        </div>
        <div class="flex flex-col gap-2 border-t border-slate-100 pt-3 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} God's Family Choir</p>
            <div class="flex flex-wrap items-center gap-x-3">
                <a href="{{ route('privacy-policy') }}" class="hover:text-emerald-700">Privacy</a>
                <a href="{{ route('terms-of-use') }}" class="hover:text-emerald-700">Terms</a>
                <span>Site by GF Social Media Team · Contact developer</span>
            </div>
        </div>
    </div>
</footer>
