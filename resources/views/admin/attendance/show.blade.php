@extends('admin.layout')

@section('page-title', $rehearsal->kindLabel())

@section('content')
<div class="space-y-5" x-data="attendanceRoll()">
    <div class="flex flex-col gap-3 lg:flex-row lg:items-start lg:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $rehearsal->held_on->format('l, d M Y') }}</p>
            <h1 class="mt-1 text-xl font-semibold text-slate-900">{{ $rehearsal->kindLabel() }}</h1>
            @if($rehearsal->title)
                <p class="mt-1 text-sm text-slate-600">{{ $rehearsal->title }}</p>
            @endif
            <p class="mt-1 text-sm text-slate-500">{{ $rehearsal->isOpen() ? 'Tap a name to mark them. It saves as you go.' : 'This roll is closed.' }}</p>
            <p class="mt-1 text-sm font-medium text-slate-600" x-text="unmarked() + ' still unmarked'"></p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.attendance.index') }}" class="inline-flex min-h-[44px] items-center rounded-xl px-4 text-sm font-semibold text-slate-600 hover:bg-white">Back</a>
            @if($rehearsal->isOpen())
                <form action="{{ route('admin.attendance.mark-remaining', $rehearsal) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex min-h-[44px] items-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-700">Mark rest present</button>
                </form>
                <form action="{{ route('admin.attendance.close', $rehearsal) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex min-h-[44px] items-center rounded-xl bg-slate-900 px-4 text-sm font-semibold text-white">Close rehearsal</button>
                </form>
            @else
                <form action="{{ route('admin.attendance.reopen', $rehearsal) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex min-h-[44px] items-center rounded-xl bg-emerald-600 px-4 text-sm font-semibold text-white">Reopen</button>
                </form>
            @endif
            <form action="{{ route('admin.attendance.destroy', $rehearsal) }}" method="POST" onsubmit="return confirm('Remove this rehearsal and its marks?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex min-h-[44px] items-center rounded-xl px-4 text-sm font-semibold text-rose-700 hover:bg-rose-50">Delete</button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3">
            <p class="text-xs font-medium text-emerald-700">Present</p>
            <p class="mt-1 text-2xl font-semibold text-emerald-900" x-text="count('present')"></p>
        </div>
        <div class="rounded-2xl border border-sky-100 bg-sky-50 px-4 py-3">
            <p class="text-xs font-medium text-sky-700">Late</p>
            <p class="mt-1 text-2xl font-semibold text-sky-900" x-text="count('late')"></p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
            <p class="text-xs font-medium text-slate-600">Excused</p>
            <p class="mt-1 text-2xl font-semibold text-slate-900" x-text="count('excused')"></p>
        </div>
        <div class="rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3">
            <p class="text-xs font-medium text-rose-700">Absent</p>
            <p class="mt-1 text-2xl font-semibold text-rose-900" x-text="count('absent')"></p>
        </div>
    </div>

    <div class="flex flex-col gap-3 sm:flex-row">
        <input type="search" x-model="query" placeholder="Search a name or member ID"
            class="min-h-[48px] w-full rounded-xl border border-slate-200 bg-white px-4 text-sm">
        <select x-model="voice" class="min-h-[48px] rounded-xl border border-slate-200 bg-white px-4 text-sm sm:w-44">
            <option value="all">All voices</option>
            @foreach($voices as $voice)
                <option value="{{ $voice }}">{{ ucfirst($voice) }}</option>
            @endforeach
        </select>
        <p class="self-center text-xs font-medium text-slate-500" x-text="saving ? 'Saving…' : (savedAt ? 'Saved' : '')"></p>
    </div>

    <div class="space-y-3">
        <template x-for="member in filtered()" :key="member.id">
            <article class="rounded-2xl border border-slate-200 bg-white p-4">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="font-semibold text-slate-900" x-text="member.name"></p>
                        <p class="text-xs text-slate-500">
                            <span x-text="member.member_id"></span>
                            · <span class="capitalize" x-text="member.voice"></span>
                        </p>
                    </div>
                    <span class="rounded-full px-2 py-0.5 text-[11px] font-semibold capitalize"
                          :class="badgeClass(statusOf(member.id))"
                          x-text="statusOf(member.id)"></span>
                </div>
                <div class="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-4">
                    <button type="button" @click="setStatus(member.id, 'present')" :disabled="!open"
                        class="min-h-[44px] rounded-xl text-sm font-semibold"
                        :class="statusOf(member.id) === 'present' ? 'bg-emerald-600 text-white' : 'bg-emerald-50 text-emerald-800'">Present</button>
                    <button type="button" @click="setStatus(member.id, 'late')" :disabled="!open"
                        class="min-h-[44px] rounded-xl text-sm font-semibold"
                        :class="statusOf(member.id) === 'late' ? 'bg-sky-600 text-white' : 'bg-sky-50 text-sky-800'">Late</button>
                    <button type="button" @click="setStatus(member.id, 'excused')" :disabled="!open"
                        class="min-h-[44px] rounded-xl text-sm font-semibold"
                        :class="statusOf(member.id) === 'excused' ? 'bg-slate-700 text-white' : 'bg-slate-100 text-slate-700'">Excused</button>
                    <button type="button" @click="setStatus(member.id, 'absent')" :disabled="!open"
                        class="min-h-[44px] rounded-xl text-sm font-semibold"
                        :class="statusOf(member.id) === 'absent' ? 'bg-rose-600 text-white' : 'bg-rose-50 text-rose-800'">Absent</button>
                </div>
            </article>
        </template>
        <p class="rounded-2xl border border-dashed border-slate-200 px-4 py-8 text-center text-sm text-slate-500" x-show="filtered().length === 0">
            No names match that search.
        </p>
    </div>
</div>

<script>
function attendanceRoll() {
    return {
        query: '',
        voice: 'all',
        open: @json($rehearsal->isOpen()),
        members: @json($members),
        marks: @json($marks),
        saving: false,
        savedAt: null,
        statusOf(id) {
            return (this.marks[id] && this.marks[id].status) ? this.marks[id].status : 'unmarked';
        },
        count(status) {
            return this.members.filter((member) => this.statusOf(member.id) === status).length;
        },
        unmarked() {
            return this.members.filter((member) => this.statusOf(member.id) === 'unmarked').length;
        },
        filtered() {
            const q = this.query.trim().toLowerCase();
            return this.members.filter((member) => {
                const hay = (member.name + ' ' + member.member_id + ' ' + member.voice).toLowerCase();
                return (!q || hay.includes(q)) && (this.voice === 'all' || member.voice === this.voice);
            });
        },
        badgeClass(status) {
            return {
                present: 'bg-emerald-50 text-emerald-800',
                late: 'bg-sky-50 text-sky-800',
                excused: 'bg-slate-100 text-slate-700',
                absent: 'bg-rose-50 text-rose-800',
                unmarked: 'bg-slate-50 text-slate-500',
            }[status] || 'bg-slate-50 text-slate-500';
        },
        async setStatus(id, status) {
            if (!this.open) return;
            if (!this.marks[id]) this.marks[id] = { status: 'unmarked', note: '' };
            this.marks[id].status = status;
            this.saving = true;
            try {
                const res = await fetch(@json(route('admin.attendance.mark', $rehearsal)), {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({ member_id: id, status }),
                });
                if (!res.ok) throw new Error('save failed');
                this.savedAt = new Date();
            } catch (error) {
                this.marks[id].status = 'unmarked';
            } finally {
                this.saving = false;
            }
        },
    };
}
</script>
@endsection
