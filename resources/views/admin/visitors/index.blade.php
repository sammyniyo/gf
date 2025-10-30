@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Visitors</h1>
            <p class="text-slate-500 text-sm">Detailed logs of recent page views with IP, referrer and user agent</p>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" class="grid gap-3 md:grid-cols-5 items-end">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-slate-700 mb-1">Search</label>
            <input type="text" name="q" value="{{ request('q') }}" class="w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="URL, IP, referer, user agent">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">From</label>
            <input type="date" name="from" value="{{ request('from') }}" class="w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">To</label>
            <input type="date" name="to" value="{{ request('to') }}" class="w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        </div>
        <div class="flex items-center gap-3">
            <label class="inline-flex items-center text-sm text-slate-700">
                <input type="checkbox" name="exclude_bots" value="1" {{ request('exclude_bots') ? 'checked' : '' }} class="mr-2 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                Exclude bots
            </label>
            <button class="ml-auto inline-flex items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-white font-semibold shadow hover:bg-emerald-700">Filter</button>
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 font-semibold">When</th>
                    <th class="px-4 py-3 font-semibold">IP</th>
                    <th class="px-4 py-3 font-semibold">URL</th>
                    <th class="px-4 py-3 font-semibold">Referer</th>
                    <th class="px-4 py-3 font-semibold">User Agent</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pageViews as $pv)
                    <tr>
                        <td class="px-4 py-3 text-slate-700">{{ $pv->viewed_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 font-mono text-slate-800">{{ $pv->visitor_ip }}</td>
                        <td class="px-4 py-3"><a href="{{ $pv->url }}" class="text-indigo-600 hover:underline" target="_blank">{{ Str::limit($pv->url, 80) }}</a></td>
                        <td class="px-4 py-3 text-slate-600">{{ Str::limit($pv->referer, 60) ?: '—' }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ Str::limit($pv->user_agent, 100) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">No visitors found for the selected filters.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $pageViews->links() }}
    </div>
</div>
@endsection


