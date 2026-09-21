@extends('admin.layout')

@section('page-title', 'Active Choristers')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Active Chorister commitments</h1>
            <p class="mt-1 text-sm text-slate-500">People who read the terms and asked to join the WhatsApp group.</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <form action="{{ route('admin.active-choristers.registration') }}" method="POST"
                  onsubmit="return confirm(@json($registrationOpen ? 'Close Active Choristers registration? People will not be able to sign or join the WhatsApp group from the site.' : 'Open Active Choristers registration again?'));">
                @csrf
                @if($registrationOpen)
                    <button type="submit" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-rose-600 px-4 text-sm font-semibold text-white hover:bg-rose-500">
                        Close registration
                    </button>
                @else
                    <button type="submit" class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white hover:bg-emerald-500">
                        Open registration
                    </button>
                @endif
            </form>
            <a href="{{ route('active-choristers') }}" target="_blank" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                Open public page
            </a>
        </div>
    </div>

    @if(! $registrationOpen)
        <div class="rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-900">
            Registration is closed. The public page still opens, but people cannot sign or join the group.
        </div>
    @endif

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="glass-card p-5">
            <p class="text-sm font-medium text-slate-500">Signed</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $total }}</p>
        </div>
        <div class="glass-card p-5">
            <p class="text-sm font-medium text-slate-500">Matched to a member</p>
            <p class="mt-1 text-2xl font-bold text-slate-900">{{ $linked }}</p>
        </div>
    </div>

    <form method="GET" class="flex flex-col gap-3 sm:flex-row">
        <input type="search" name="search" value="{{ request('search') }}"
            placeholder="Search name, phone, email, or member ID"
            class="min-h-[44px] w-full rounded-xl border border-slate-200 bg-white px-4 text-sm">
        <button type="submit" class="min-h-[44px] rounded-xl bg-indigo-600 px-4 text-sm font-semibold text-white">
            Search
        </button>
    </form>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Name</th>
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
                        <tr>
                            <td class="px-4 py-3">
                                <p class="font-semibold text-slate-900">{{ $commitment->name }}</p>
                                @if($commitment->email)
                                    <p class="text-xs text-slate-500">{{ $commitment->email }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-slate-700">{{ $commitment->phone }}</td>
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
                            <td class="px-4 py-3 text-slate-600">{{ $commitment->sections_read }}/5 · {{ $commitment->read_seconds }}s</td>
                            <td class="px-4 py-3 text-slate-600">{{ $commitment->accepted_at?->format('d M Y H:i') }}</td>
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
