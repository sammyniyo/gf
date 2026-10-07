@extends('admin.layout')

@section('page-title', 'Attendance analysis')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Attendance analysis</h1>
            <p class="mt-1 text-sm text-slate-500">A quiet picture of Tuesday, Thursday, and special Saturday rehearsals. Use this when you want to see who is keeping the hall full.</p>
        </div>
        <a href="{{ route('admin.attendance.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">Back to rolls</a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="glass-card p-5">
            <p class="text-sm text-slate-500">Rehearsals recorded</p>
            <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $sessionCount }}</p>
        </div>
        <div class="glass-card p-5">
            <p class="text-sm text-slate-500">Average presence</p>
            <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $averageRate !== null ? number_format($averageRate, 0).'%' : '—' }}</p>
        </div>
        <div class="glass-card p-5">
            <p class="text-sm text-slate-500">People on the roll</p>
            <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $memberStats->count() }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        @foreach($byKind as $row)
            <div class="rounded-2xl border border-slate-200 bg-white p-5">
                <p class="text-sm font-semibold text-slate-900">{{ $row['label'] }}</p>
                <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $row['rate'] !== null ? $row['rate'].'%' : '—' }}</p>
                <p class="mt-1 text-sm text-slate-500">{{ $row['sessions'] }} {{ \Illuminate\Support\Str::plural('rehearsal', $row['sessions']) }} · {{ $row['present'] }} present · {{ $row['absent'] }} absent</p>
            </div>
        @endforeach
    </div>

    @if($trend->isNotEmpty())
        <section class="glass-card p-5">
            <p class="text-sm font-semibold text-slate-900">Recent rehearsals</p>
            <p class="mt-1 text-sm text-slate-500">Presence rate for the last sessions we have.</p>
            <div class="mt-4 h-64">
                <canvas id="attendance-trend"></canvas>
            </div>
        </section>
    @endif

    <div class="min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Voice</th>
                        <th class="px-4 py-3">Present</th>
                        <th class="px-4 py-3">Absent</th>
                        <th class="px-4 py-3">Excused</th>
                        <th class="px-4 py-3">Rate</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($memberStats as $row)
                        <tr>
                            <td class="px-4 py-3">
                                <p class="font-semibold text-slate-900">{{ $row['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $row['member_id'] }}</p>
                            </td>
                            <td class="px-4 py-3 capitalize text-slate-600">{{ $row['voice'] }}</td>
                            <td class="px-4 py-3 text-emerald-700">{{ $row['present'] }}</td>
                            <td class="px-4 py-3 text-rose-700">{{ $row['absent'] }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $row['excused'] }}</td>
                            <td class="px-4 py-3 font-semibold text-slate-900">{{ $row['rate'] !== null ? $row['rate'].'%' : '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-slate-500">Mark a few rehearsals and this table will fill.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($trend->isNotEmpty())
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('attendance-trend');
    if (!canvas || typeof Chart === 'undefined') return;
    const trend = @json($trend);
    new Chart(canvas, {
        type: 'line',
        data: {
            labels: trend.map((row) => row.label),
            datasets: [{
                label: 'Present %',
                data: trend.map((row) => row.rate),
                borderColor: '#059669',
                backgroundColor: 'rgba(5, 150, 105, 0.12)',
                fill: true,
                tension: 0.35,
                pointRadius: 4,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { min: 0, max: 100, ticks: { callback: (value) => value + '%' } },
            },
        },
    });
});
</script>
@endif
@endsection
