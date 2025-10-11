@extends('admin.layout')

@section('page-title', 'Contribution Targets')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Contribution Targets</h1>
            <p class="mt-1 text-sm text-slate-500">Manage financial goals for different member groups</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('contribution-targets.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Target
            </a>
        </div>
    </div>

    <!-- Targets Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($targets as $target)
            <div class="glass-card p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-900">{{ $target->name }}</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                        {{ $target->type === 'student' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $target->type === 'alumni' ? 'bg-purple-100 text-purple-800' : '' }}
                        {{ $target->type === 'general' ? 'bg-slate-100 text-slate-800' : '' }}">
                        {{ ucfirst($target->type) }}
                    </span>
                </div>

                @if($target->description)
                    <p class="text-sm text-slate-600 mb-4">{{ $target->description }}</p>
                @endif

                <!-- Progress Bar -->
                <div class="mb-4">
                    <div class="flex items-center justify-between text-sm mb-2">
                        <span class="text-slate-600">Progress</span>
                        <span class="font-semibold text-slate-900">{{ $target->progress_percentage }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-3">
                        <div class="h-3 rounded-full transition-all duration-300
                            {{ $target->is_completed ? 'bg-emerald-500' : 'bg-indigo-500' }}"
                             style="width: {{ min($target->progress_percentage, 100) }}%"></div>
                    </div>
                </div>

                <!-- Amounts -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-xs text-slate-500">Target Amount</p>
                        <p class="text-sm font-semibold text-slate-900">{{ number_format($target->target_amount, 0) }} RWF</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Current Amount</p>
                        <p class="text-sm font-semibold text-emerald-600">{{ number_format($target->current_amount, 0) }} RWF</p>
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-2 gap-4 mb-4 text-xs">
                    <div>
                        <p class="text-slate-500">Start Date</p>
                        <p class="text-slate-900">{{ $target->start_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">End Date</p>
                        <p class="text-slate-900">{{ $target->end_date->format('M d, Y') }}</p>
                    </div>
                </div>

                <!-- Status Badges -->
                <div class="flex items-center gap-2 mb-4">
                    @if($target->is_active)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                            ✓ Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-800">
                            Inactive
                        </span>
                    @endif

                    @if($target->is_monthly)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                            Monthly
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                            One-time
                        </span>
                    @endif

                    @if($target->is_completed)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                            🏆 Completed
                        </span>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 pt-4 border-t border-slate-200">
                    <a href="{{ route('contribution-targets.show', $target) }}"
                       class="flex-1 text-center px-3 py-2 text-xs font-medium text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100">
                        View
                    </a>
                    <a href="{{ route('contribution-targets.edit', $target) }}"
                       class="flex-1 text-center px-3 py-2 text-xs font-medium text-slate-600 bg-slate-50 rounded-lg hover:bg-slate-100">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('contribution-targets.destroy', $target) }}"
                          class="flex-1" onsubmit="return confirm('Are you sure you want to delete this target?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-3 py-2 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="glass-card py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 mb-4">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-slate-900 mb-1">No targets found</h3>
                        <p class="text-sm text-slate-500">Create your first contribution target</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($targets->hasPages())
        <div class="glass-card px-6 py-4">
            {{ $targets->links('pagination.tailwind') }}
        </div>
    @endif
</div>
@endsection
