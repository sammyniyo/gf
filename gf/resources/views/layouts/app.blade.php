<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'God\'s Family Choir - ASA UR Nyarugenge SDA')</title>

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
</body>
<script src="//unpkg.com/alpinejs" defer></script>
@stack('scripts')

</html>
