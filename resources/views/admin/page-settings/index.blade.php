@extends('admin.layout')

@section('page-title', 'Page Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Page Management</h2>
            <p class="text-slate-600 mt-1">Control page visibility and status</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Page Settings Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($pageSettings as $pageSetting)
            <div class="glass-card p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-100">
                            @if($pageSetting->status === 'active')
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @elseif($pageSetting->status === 'coming_soon')
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            @elseif($pageSetting->status === 'maintenance')
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">{{ $pageSetting->page_name }}</h3>
                            <p class="text-sm text-slate-500">{{ $pageSetting->page_identifier }}</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3 mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-600">Status:</span>
                        @php
                            $statusColors = [
                                'active' => 'bg-emerald-100 text-emerald-700',
                                'coming_soon' => 'bg-blue-100 text-blue-700',
                                'maintenance' => 'bg-amber-100 text-amber-700',
                                'locked' => 'bg-red-100 text-red-700',
                            ];
                            $colorClass = $statusColors[$pageSetting->status] ?? 'bg-slate-100 text-slate-700';
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $colorClass }}">
                            {{ ucfirst(str_replace('_', ' ', $pageSetting->status)) }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-600">Enabled:</span>
                        @if($pageSetting->is_enabled)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Yes
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                No
                            </span>
                        @endif
                    </div>

                    @if($pageSetting->custom_message)
                        <div class="mt-2">
                            <p class="text-xs text-slate-500 italic">"{{ Str::limit($pageSetting->custom_message, 100) }}"</p>
                        </div>
                    @endif
                </div>

                <a href="{{ route('admin.page-settings.edit', $pageSetting) }}"
                   class="inline-flex items-center justify-center w-full px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition">
                    Configure
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        @endforeach
    </div>

    @if($pageSettings->isEmpty())
        <div class="glass-card p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-slate-600">No page settings configured yet.</p>
        </div>
    @endif
</div>
@endsection

