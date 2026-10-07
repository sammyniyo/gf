@extends('admin.layout')

@section('page-title', 'Attendance')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Rehearsal attendance</h1>
            <p class="mt-1 text-sm text-slate-500">Tuesdays and Thursdays are regular. Saturdays are special. One person marks the roll; later we can see who is faithful.</p>
        </div>
        <a href="{{ route('admin.attendance.analysis') }}" class="inline-flex min-h-[44px] items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500">
            View analysis
        </a>
    </div>

    @if($open)
        <a href="{{ route('admin.attendance.show', $open) }}" class="block rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Open now</p>
            <p class="mt-1 text-lg font-semibold text-slate-900">{{ $open->kindLabel() }} · {{ $open->held_on->format('l, d M Y') }}</p>
            <p class="mt-1 text-sm text-emerald-800">Continue the roll. {{ $rollSize }} names on the list.</p>
        </a>
    @endif

    <section class="glass-card p-5">
        <p class="text-sm font-semibold text-slate-900">Open a rehearsal</p>
        <p class="mt-1 text-sm text-slate-600">Use today if you are in the hall. The type follows the weekday, and you can change it for a special Saturday.</p>
        <form action="{{ route('admin.attendance.store') }}" method="POST" class="mt-4 grid gap-4 sm:grid-cols-2">
            @csrf
            <label class="block">
                <span class="mb-1.5 block text-sm font-medium text-slate-700">Date</span>
                <input type="date" name="held_on" value="{{ old('held_on', $suggestedDate) }}" required
                    class="min-h-[48px] w-full rounded-xl border border-slate-200 bg-white px-4 text-sm">
            </label>
            <label class="block">
                <span class="mb-1.5 block text-sm font-medium text-slate-700">Type</span>
                <select name="kind" class="min-h-[48px] w-full rounded-xl border border-slate-200 bg-white px-4 text-sm">
                    @foreach($kinds as $value => $label)
                        <option value="{{ $value }}" {{ old('kind', $suggestedKind) === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </label>
            <label class="block sm:col-span-2">
                <span class="mb-1.5 block text-sm font-medium text-slate-700">Title <span class="font-normal text-slate-400">(optional)</span></span>
                <input type="text" name="title" value="{{ old('title') }}" maxlength="120"
                    placeholder="e.g. Concert prep, Easter chorus"
                    class="min-h-[48px] w-full rounded-xl border border-slate-200 bg-white px-4 text-sm">
            </label>
            <label class="block sm:col-span-2">
                <span class="mb-1.5 block text-sm font-medium text-slate-700">Note</span>
                <textarea name="notes" rows="2" maxlength="1000" placeholder="Anything the roll-taker should remember"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm">{{ old('notes') }}</textarea>
            </label>
            <div class="sm:col-span-2">
                <button type="submit" class="inline-flex min-h-[48px] items-center justify-center rounded-xl bg-emerald-600 px-5 text-sm font-semibold text-white hover:bg-emerald-500">
                    Open roll
                </button>
            </div>
        </form>
    </section>

    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Present</th>
                        <th class="px-4 py-3">Absent</th>
                        <th class="px-4 py-3">Taken by</th>
                        <th class="px-4 py-3 text-right">Open</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($rehearsals as $rehearsal)
                        <tr class="bg-white">
                            <td class="whitespace-nowrap px-4 py-3 font-semibold text-slate-900">
                                {{ $rehearsal->held_on->format('d M Y') }}
                                @if($rehearsal->isOpen())
                                    <span class="ml-2 rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">Open</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-slate-700">
                                {{ $rehearsal->kindLabel() }}
                                @if($rehearsal->title)
                                    <p class="text-xs text-slate-500">{{ $rehearsal->title }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-emerald-700">{{ $rehearsal->present_count + $rehearsal->late_count }}</td>
                            <td class="px-4 py-3 text-rose-700">{{ $rehearsal->absent_count }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $rehearsal->takenBy?->name ?: '—' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.attendance.show', $rehearsal) }}" class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    {{ $rehearsal->isOpen() ? 'Continue' : 'View' }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-slate-500">No rehearsals yet. Open today’s roll when choir starts.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $rehearsals->links() }}
</div>
@endsection
