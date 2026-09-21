@extends('admin.layout')

@section('page-title', 'Active Choristers')

@section('content')
<div class="space-y-6">
    <section class="glass-card p-5">
        <div class="flex flex-col gap-4 xl:flex-row xl:items-start xl:justify-between">
            <div class="min-w-0 space-y-1">
                @if($registrationOpen)
                    <p class="text-sm font-semibold text-emerald-800">Public window is open</p>
                    <p class="text-sm text-slate-600">The public link is visible until {{ $timerEndsAtLabel }}. Close it now to hide the page immediately.</p>
                @else
                    <p class="text-sm font-semibold text-slate-900">Public link is hidden</p>
                    <p class="text-sm text-slate-600">Start a 7-day window to show Active Choristers. When the timer ends, the link disappears again.</p>
                @endif
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <form action="{{ route('admin.active-choristers.registration') }}" method="POST"
                      onsubmit="return confirm(@json($registrationOpen ? 'Close now? The public link will disappear immediately.' : 'Start a 7-day window? The public link will appear now and disappear when the timer ends.'));">
                    @csrf
                    @if($registrationOpen)
                        <input type="hidden" name="action" value="close">
                        <button type="submit" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-rose-600 px-4 text-sm font-semibold text-white hover:bg-rose-500">
                            Close now
                        </button>
                    @else
                        <input type="hidden" name="action" value="start">
                        <button type="submit" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white hover:bg-emerald-500">
                            Start 7-day window
                        </button>
                    @endif
                </form>
                @if($registrationOpen)
                    <form action="{{ route('admin.active-choristers.registration') }}" method="POST"
                          onsubmit="return confirm('Start a new 7-day window from now?');">
                        @csrf
                        <input type="hidden" name="action" value="start">
                        <button type="submit" class="inline-flex min-h-[44px] items-center justify-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            Restart 7 days
                        </button>
                    </form>
                @endif
                <a href="{{ route('active-choristers') }}" target="_blank" class="inline-flex min-h-[44px] items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                    Open public page
                </a>
            </div>
        </div>
        @if($registrationOpen)
            <div class="mt-5">
                @include('active-choristers.partials.countdown', ['endsAt' => $timerEndsAt])
            </div>
        @endif
    </section>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="glass-card min-w-0 p-5">
            <p class="text-sm font-medium text-slate-500">Signed</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $total }}</p>
        </div>
        <div class="glass-card min-w-0 p-5">
            <p class="text-sm font-medium text-slate-500">Matched to a member</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $linked }}</p>
        </div>
    </div>

    <form method="GET" class="flex min-w-0 flex-col gap-3 sm:flex-row">
        <input type="search" name="search" value="{{ request('search') }}"
            placeholder="Search name, phone, email, or member ID"
            class="min-h-[44px] w-full min-w-0 rounded-xl border border-slate-200 bg-white px-4 text-sm">
        <button type="submit" class="min-h-[44px] shrink-0 rounded-xl bg-indigo-600 px-4 text-sm font-semibold text-white">
            Search
        </button>
    </form>

    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="sticky left-0 z-10 bg-slate-50 px-4 py-3">Name</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Member</th>
                        <th class="px-4 py-3">Language</th>
                        <th class="px-4 py-3">Read</th>
                        <th class="px-4 py-3">Signed</th>
                        <th class="px-4 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($commitments as $commitment)
                        <tr class="bg-white">
                            <td class="sticky left-0 z-10 bg-white px-4 py-3">
                                <p class="font-semibold text-slate-900">{{ $commitment->name }}</p>
                                @if($commitment->email)
                                    <p class="text-xs text-slate-500">{{ $commitment->email }}</p>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 text-slate-700">{{ $commitment->phone }}</td>
                            <td class="px-4 py-3">
                                @if($commitment->member)
                                    <a href="{{ route('admin.members.show', $commitment->member) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        {{ $commitment->member->member_id }}
                                    </a>
                                    <p class="text-xs text-slate-500">{{ $commitment->voice ?: $commitment->member->voice }}</p>
                                @else
                                    <span class="text-xs text-slate-400">Not linked</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 uppercase text-slate-600">{{ $commitment->language }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-slate-600">{{ $commitment->sections_read }}/5 · {{ $commitment->read_seconds }}s</td>
                            <td class="whitespace-nowrap px-4 py-3 text-slate-600">{{ $commitment->accepted_at?->format('d M Y H:i') }}</td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('admin.active-choristers.destroy', $commitment) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this commitment? They will need to sign again to rejoin the group.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg bg-rose-100 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-500">No one has signed yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $commitments->links() }}
</div>
@endsection
