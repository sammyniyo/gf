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
    <form method="GET" class="grid gap-3 md:grid-cols-6 items-end">
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
        <div class="flex flex-col gap-2">
            <label class="inline-flex items-center text-sm text-slate-700">
                <input type="checkbox" name="exclude_bots" value="1" {{ request('exclude_bots') ? 'checked' : '' }} class="mr-2 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                Exclude bots
            </label>
            <label class="inline-flex items-center text-sm text-slate-700">
                <input type="checkbox" name="suspicious_only" value="1" {{ request('suspicious_only') ? 'checked' : '' }} class="mr-2 rounded border-slate-300 text-rose-600 focus:ring-rose-500">
                Suspicious only
            </label>
        </div>
        <div>
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-white font-semibold shadow hover:bg-emerald-700">Filter</button>
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 font-semibold">Status</th>
                    <th class="px-4 py-3 font-semibold">When</th>
                    <th class="px-4 py-3 font-semibold">IP</th>
                    <th class="px-4 py-3 font-semibold">URL</th>
                    <th class="px-4 py-3 font-semibold">Referer</th>
                    <th class="px-4 py-3 font-semibold">User Agent</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pageViews as $pv)
                    <tr class="{{ $pv->is_suspicious ? 'bg-rose-50 hover:bg-rose-100' : 'hover:bg-slate-50' }}">
                        <td class="px-4 py-3">
                            @if($pv->is_suspicious)
                                <span class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-2 py-1 text-xs font-semibold text-rose-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Suspicious
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-1 text-xs font-semibold text-emerald-700">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Safe
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-slate-700">{{ $pv->viewed_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 font-mono text-slate-800">{{ $pv->visitor_ip }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ $pv->url }}" class="{{ $pv->is_suspicious ? 'text-rose-700 font-semibold hover:underline' : 'text-indigo-600 hover:underline' }}" target="_blank">{{ Str::limit($pv->url, 80) }}</a>
                        </td>
                        <td class="px-4 py-3 text-slate-600">{{ Str::limit($pv->referer, 60) ?: '—' }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ Str::limit($pv->user_agent, 100) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">No visitors found for the selected filters.</td>
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


