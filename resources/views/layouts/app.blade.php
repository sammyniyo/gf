<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        // Get section values with proper fallbacks
        $pageTitle = view()->hasSection('title') ? trim(e(view()->yieldContent('title'))) : 'God's Family Choir - ASA UR Nyarugenge SDA';
        $metaDescription = view()->hasSection('meta_description') ? trim(e(view()->yieldContent('meta_description'))) : 'God\'s Family Choir is a vibrant worship ministry serving the words of life to the world through gospel messages. Join our family of over 300 worshippers, musicians, and storytellers.';
        $ogTitle = view()->hasSection('og:title') ? trim(e(view()->yieldContent('og:title'))) : $pageTitle;
        $ogDescription = view()->hasSection('og:description') ? trim(e(view()->yieldContent('og:description'))) : $metaDescription;
    @endphp

    <title>{{ $pageTitle }}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="@yield('meta_keywords', 'God\'s Family Choir, ASA UR Nyarugenge SDA, Choir, Music, Worship, Jesus, Gospel, Christian, Church, Rwanda, Kigali, Adventist, Seventh-day Adventist, Worship Music, Gospel Music, Christian Music, Choir Ministry')">
    <meta name="author" content="@yield('meta_author', 'God\'s Family Choir')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <meta name="googlebot" content="index, follow">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og:type', 'website')">
    <meta property="og:url" content="@yield('og:url', url()->current())">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:image" content="@yield('og:image', asset('images/hero.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="@yield('og:locale', 'en_US')">
    <meta property="og:site_name" content="God's Family Choir">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('og:url', url()->current())">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="@yield('og:image', asset('images/hero.jpg'))">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/hero.css', 'resources/js/app.js', 'resources/js/hero.js'])

    <!-- Custom Scrollbar Styles -->
    <style>
        /* Webkit browsers (Chrome, Safari, Edge) */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #1d4ed8);
            border-radius: 6px;
            border: 2px solid #f1f5f9;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #1e40af);
        }

        /* Firefox */
        html {
            scrollbar-width: thin;
            scrollbar-color: #3b82f6 #f1f5f9;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-static.navbar />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Floating Action Buttons -->
        <x-landing.floating-action-button />
    </div>

    <!-- Cookie Consent Banner -->
    <x-cookie-consent />
</body>
<script src="//unpkg.com/alpinejs" defer></script>
@stack('scripts')

</html>
