@extends('admin.layout')

@section('page-title', 'Audit Log Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Audit Log Details</h1>
            <p class="text-sm text-slate-600 mt-1">View detailed information about this activity</p>
        </div>
        <a href="{{ route('admin.audit-logs.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Logs
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Action Details -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-100">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    Action Details
                </h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Action</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $auditLog->action_color === 'green' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $auditLog->action_color === 'blue' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $auditLog->action_color === 'red' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $auditLog->action_color === 'amber' ? 'bg-amber-100 text-amber-800' : '' }}
                            {{ $auditLog->action_color === 'purple' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $auditLog->action_color === 'gray' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ $auditLog->action_label }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Description</label>
                        <p class="text-sm text-slate-900">{{ $auditLog->description }}</p>
                    </div>

                    @if($auditLog->auditable_type)
                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">Model Type</label>
                            <p class="text-sm text-slate-900">{{ $auditLog->model_name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">Model ID</label>
                            <p class="text-sm text-slate-900 font-mono">{{ $auditLog->auditable_id }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Timestamp</label>
                        <p class="text-sm text-slate-900">
                            {{ $auditLog->created_at->format('F j, Y \a\t g:i A') }}
                            <span class="text-slate-500">({{ $auditLog->created_at->diffForHumans() }})</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Changes -->
            @if($auditLog->old_values || $auditLog->new_values)
                <div class="glass-card p-6">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        Changes Made
                    </h2>

                    <div class="space-y-4">
                        @if($auditLog->old_values && $auditLog->new_values)
                            @foreach($auditLog->new_values as $key => $newValue)
                                <div class="border border-slate-200 rounded-lg p-4">
                                    <div class="font-medium text-slate-900 mb-2">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-red-600 mb-1">Old Value</label>
                                            <div class="bg-red-50 border border-red-200 rounded p-2 text-sm text-slate-900 font-mono break-words">
                                                {{ $auditLog->old_values[$key] ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-green-600 mb-1">New Value</label>
                                            <div class="bg-green-50 border border-green-200 rounded p-2 text-sm text-slate-900 font-mono break-words">
                                                {{ $newValue }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-slate-500">No changes recorded</p>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Additional Properties -->
            @if($auditLog->properties)
                <div class="glass-card p-6">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-purple-100">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        Additional Information
                    </h2>

                    <div class="bg-slate-50 rounded-lg p-4">
                        <pre class="text-sm text-slate-900 overflow-x-auto">{{ json_encode($auditLog->properties, JSON_PRETTY_PRINT) }}</pre>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- User Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-100">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    User Information
                </h2>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gradient-to-br from-indigo-100 to-slate-100 flex items-center justify-center">
                            <span class="text-lg font-bold text-indigo-600">
                                {{ substr($auditLog->user_name ?? 'System', 0, 2) }}
                            </span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-slate-900">{{ $auditLog->user_name ?? 'System' }}</p>
                            <p class="text-xs text-slate-500">{{ $auditLog->user_email ?? 'N/A' }}</p>
                        </div>
                    </div>

                    @if($auditLog->user_id)
                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">User ID</label>
                            <p class="text-sm text-slate-900 font-mono">{{ $auditLog->user_id }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Request Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-amber-100">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    Request Details
                </h2>

                <div class="space-y-3">
                    @if($auditLog->ip_address)
                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">IP Address</label>
                            <p class="text-sm text-slate-900 font-mono">{{ $auditLog->ip_address }}</p>
                        </div>
                    @endif

                    @if($auditLog->url)
                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">URL</label>
                            <p class="text-xs text-slate-900 break-all font-mono bg-slate-50 p-2 rounded">{{ $auditLog->url }}</p>
                        </div>
                    @endif

                    @if($auditLog->user_agent)
                        <div>
                            <label class="block text-sm font-medium text-slate-500 mb-1">User Agent</label>
                            <p class="text-xs text-slate-900 break-all bg-slate-50 p-2 rounded">{{ $auditLog->user_agent }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

