@extends('admin.layout')

@section('page-title', 'Contribution Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Contribution Details</h1>
            <p class="mt-1 text-sm text-slate-500">View contribution information</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.contributions.edit', $contribution) }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.contributions.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to List
            </a>
        </div>
    </div>

    <!-- Contribution Info -->
    <div class="grid gap-6 lg:grid-cols-3">
        <!-- Main Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Member Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Member Information</h2>

                <div class="flex items-center gap-4 mb-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-xl font-semibold text-emerald-600">
                        {{ substr($contribution->member->first_name ?? 'U', 0, 1) }}{{ substr($contribution->member->last_name ?? 'N', 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">
                            {{ $contribution->member->first_name ?? 'Unknown' }} {{ $contribution->member->last_name ?? 'Member' }}
                        </h3>
                        <p class="text-sm text-slate-500">{{ $contribution->member->email ?? 'No email' }}</p>
                        <p class="text-sm text-slate-500">{{ $contribution->member->phone ?? 'No phone' }}</p>
                    </div>
                </div>

                @if($contribution->member->member_type)
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-slate-600">Member Type:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                            {{ $contribution->member->member_type === 'student' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $contribution->member->member_type === 'alumni' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $contribution->member->member_type === 'general' ? 'bg-slate-100 text-slate-800' : '' }}">
                            {{ ucfirst($contribution->member->member_type) }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- Contribution Details -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Contribution Details</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Amount</p>
                        <p class="text-2xl font-bold text-emerald-600">{{ number_format($contribution->amount, 0) }} RWF</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600">Month</p>
                        <p class="text-lg font-semibold text-slate-900">{{ \Carbon\Carbon::parse($contribution->month . '-01')->format('F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600">Payment Type</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                            {{ $contribution->payment_type === 'monthly' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ ucfirst(str_replace('_', ' ', $contribution->payment_type ?? 'monthly')) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600">Payment Status</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                            {{ $contribution->has_paid ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $contribution->has_paid ? 'Paid' : 'Pending' }}
                        </span>
                    </div>
                    @if($contribution->payment_method)
                        <div>
                            <p class="text-sm font-medium text-slate-600">Payment Method</p>
                            <p class="text-sm text-slate-900">{{ ucfirst(str_replace('_', ' ', $contribution->payment_method)) }}</p>
                        </div>
                    @endif
                    @if($contribution->payment_date)
                        <div>
                            <p class="text-sm font-medium text-slate-600">Payment Date</p>
                            <p class="text-sm text-slate-900">{{ $contribution->payment_date->format('M d, Y') }}</p>
                        </div>
                    @endif
                    @if($contribution->target)
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-slate-600">Target</p>
                            <p class="text-sm text-slate-900">{{ $contribution->target->name }}</p>
                        </div>
                    @endif
                </div>

                @if($contribution->notes)
                    <div class="mt-4 pt-4 border-t border-slate-200">
                        <p class="text-sm font-medium text-slate-600 mb-2">Notes</p>
                        <p class="text-sm text-slate-700">{{ $contribution->notes }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Stats -->
            <div class="glass-card p-6">
                <h3 class="text-sm font-semibold text-slate-900 mb-4">Quick Info</h3>

                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-slate-500">Contribution ID</p>
                        <p class="text-sm font-semibold text-slate-900">#{{ $contribution->id }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Created At</p>
                        <p class="text-sm font-semibold text-slate-900">{{ $contribution->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Last Updated</p>
                        <p class="text-sm font-semibold text-slate-900">{{ $contribution->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                    @if($contribution->is_recurring)
                        <div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800">
                                🔄 Recurring Payment
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="glass-card p-6">
                <h3 class="text-sm font-semibold text-slate-900 mb-4">Actions</h3>

                <div class="space-y-2">
                    <a href="{{ route('admin.contributions.edit', $contribution) }}"
                       class="flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Contribution
                    </a>

                    <a href="{{ route('admin.members.show', $contribution->member) }}"
                       class="flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        View Member
                    </a>

                    <form method="POST" action="{{ route('admin.contributions.destroy', $contribution) }}"
                          onsubmit="return confirm('Are you sure you want to delete this contribution?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 py-2 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Contribution
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
