<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, follow">
    <title>Page not found | God's Family Choir</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white font-sans text-slate-900 antialiased">
    <main class="mx-auto flex min-h-screen max-w-lg flex-col justify-center px-5 py-16 text-center">
        <a href="{{ url('/') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-600">God's Family Choir</a>
        <p class="mt-8 text-sm font-semibold tracking-wide text-slate-400">404</p>
        <h1 class="mt-2 text-3xl font-semibold tracking-tight text-slate-900">This page is not available</h1>
        <p class="mt-3 text-sm leading-6 text-slate-600">The address may be wrong, or the page has been removed.</p>
        <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ url('/') }}"
               class="inline-flex min-h-[44px] items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white hover:bg-emerald-600">
                Home
            </a>
            <button type="button" onclick="history.back()"
                    class="inline-flex min-h-[44px] items-center justify-center rounded-full border border-slate-200 px-5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Go back
            </button>
        </div>
    </main>
</body>
</html>
