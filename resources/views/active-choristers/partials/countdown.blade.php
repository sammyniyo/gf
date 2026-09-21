@php
    $endsAt = $endsAt ?? null;
    $compact = $compact ?? false;
@endphp

@if($endsAt)
<div data-ends-at="{{ $endsAt }}"
     x-data="activeChoristerCountdown()"
     x-init="bind($el.dataset.endsAt); start()"
     x-show="remainingMs > 0"
     x-cloak
     class="overflow-hidden rounded-[24px] border p-4 sm:p-5"
     :class="urgency === 'red'
        ? 'border-rose-300 bg-rose-50'
        : (urgency === 'amber' ? 'border-amber-300 bg-amber-50' : 'border-emerald-200 bg-emerald-50')">
    <div class="flex flex-col items-center text-center">
        <p class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-wider"
           :class="urgency === 'red' ? 'text-rose-700' : (urgency === 'amber' ? 'text-amber-800' : 'text-emerald-700')">
            <span class="h-1.5 w-1.5 rounded-full"
                  :class="urgency === 'red' ? 'animate-pulse bg-rose-600' : (urgency === 'amber' ? 'bg-amber-500' : 'bg-emerald-600')"></span>
            <span x-show="urgency === 'red'" x-cloak>{{ $warningLabel ?? 'Time is running out' }}</span>
            <span x-show="urgency !== 'red'">{{ $label ?? 'This invitation closes in' }}</span>
        </p>
        <p x-show="urgency === 'red'" x-cloak class="mt-1 text-sm font-semibold text-rose-800">{{ $warningText ?? 'Join before this link disappears.' }}</p>

        <div class="mt-4 grid w-full grid-cols-4 gap-2 sm:gap-3">
            <template x-for="unit in units" :key="unit.key">
                <div class="rounded-2xl bg-white px-2 py-3 shadow-sm ring-1"
                     :class="urgency === 'red' ? 'ring-rose-200' : (urgency === 'amber' ? 'ring-amber-200' : 'ring-emerald-100')">
                    <p class="text-2xl font-semibold tabular-nums tracking-tight sm:text-3xl"
                       :class="urgency === 'red' ? 'text-rose-700' : (urgency === 'amber' ? 'text-amber-800' : 'text-slate-900')"
                       x-text="pad(unit.value)"></p>
                    <p class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500" x-text="unit.label"></p>
                </div>
            </template>
        </div>
    </div>
</div>

@once
<script>
function activeChoristerCountdown() {
    return {
        endsAt: 0,
        remainingMs: 0,
        days: 0,
        hours: 0,
        minutes: 0,
        seconds: 0,
        reloaded: false,
        bind(value) {
            this.endsAt = new Date(value).getTime();
        },
        get urgency() {
            const daysLeft = this.remainingMs / 86400000;
            if (daysLeft <= 1) return 'red';
            if (daysLeft <= 3) return 'amber';
            return 'emerald';
        },
        get units() {
            return [
                { key: 'd', value: this.days, label: 'Days' },
                { key: 'h', value: this.hours, label: 'Hours' },
                { key: 'm', value: this.minutes, label: 'Min' },
                { key: 's', value: this.seconds, label: 'Sec' },
            ];
        },
        pad(value) {
            return String(value).padStart(2, '0');
        },
        tick() {
            this.remainingMs = Math.max(0, this.endsAt - Date.now());
            this.days = Math.floor(this.remainingMs / 86400000);
            this.hours = Math.floor((this.remainingMs % 86400000) / 3600000);
            this.minutes = Math.floor((this.remainingMs % 3600000) / 60000);
            this.seconds = Math.floor((this.remainingMs % 60000) / 1000);
            if (this.remainingMs === 0 && !this.reloaded) {
                this.reloaded = true;
                window.location.reload();
            }
        },
        start() {
            this.reloaded = false;
            this.tick();
            setInterval(() => this.tick(), 1000);
        },
    };
}
</script>
@endonce
@endif
