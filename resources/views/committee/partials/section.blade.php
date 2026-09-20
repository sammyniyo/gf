<section id="{{ \Illuminate\Support\Str::slug($department) }}" class="scroll-mt-52">
    <div class="mb-4 flex items-end justify-between gap-3 border-b border-slate-100 pb-2.5">
        <h2 class="text-xl font-semibold tracking-tight text-slate-900">{{ $department }}</h2>
        <p class="shrink-0 text-sm text-slate-500">{{ $members->count() }} {{ \Illuminate\Support\Str::plural('person', $members->count()) }}</p>
    </div>

    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
        @foreach($members as $member)
            @include('committee.partials.card', ['member' => $member])
        @endforeach
    </div>
</section>
