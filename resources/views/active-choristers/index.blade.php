@extends('layouts.app')

@section('title', 'Active Choristers | God\'s Family Choir')
@section('meta_description', 'Read the Active Chorister commitment in English and Kinyarwanda, then join the dedicated WhatsApp group.')
@section('canonical_url', route('active-choristers'))
@section('og:title', 'Active Choristers Commitment | God\'s Family Choir')
@section('og:description', 'Committed choristers: read the terms, confirm who you are, then join the Active Choristers WhatsApp group.')

@section('content')
<script>
function activeChorister() {
    return {
        lang: 'rw',
        step: 0,
        remaining: 8,
        readSeconds: 0,
        read: [false, false, false, false, false],
        scrolled: [false, false, false, false, false],
        openedAt: Date.now(),
        lookupQuery: '',
        lookupMessage: '',
        lookupOk: false,
        looking: false,
        directory: [],
        directoryLoaded: false,
        matches: [],
        matchOpen: false,
        matchIndex: 0,
        picked: false,
        registerUrl: @json(route('registration.member')),
        selecting: false,
        matchedMember: '',
        alreadyCommitted: false,
        honeypot: '',
        submitting: false,
        error: '',
        whatsapp: '',
        timerEndsAt: @json($timerEndsAt ?? null),
        timer: { days: 0, hours: 0, minutes: 0, seconds: 0, ms: 0 },
        form: { name: '', phone: '', email: '', confirmation: '' },
        rehearsals: [
            { short: { rw: 'Lun', en: 'Mon' }, day: { rw: 'Kuwa kabiri w’isabato', en: 'Monday' }, sub: { rw: 'Lundi', en: 'Evening rehearsal' }, time: '17:30 – 20:00' },
            { short: { rw: 'Jeu', en: 'Thu' }, day: { rw: 'Kuwa gatanu w’isabato', en: 'Thursday' }, sub: { rw: 'Jeudi', en: 'Evening rehearsal' }, time: '17:30 – 20:00' },
            { short: { rw: 'Sam', en: 'Sat' }, day: { rw: 'Ku isabato', en: 'Saturday' }, sub: { rw: 'Samedi', en: 'Afternoon rehearsal' }, time: '15:00 – 18:00' },
        ],
        titles: {
            rw: [
                'Ikaze muri korali umuryango w\'Imana',
                'Imyitozo',
                'Ibyerekanwa',
                'Ivugabutumwa',
                'Kwizera',
            ],
            en: [
                'Welcome to God\'s Family Choir',
                'Rehearsals',
                'Presentations',
                'Evangelism',
                'Faith',
            ],
        },
        startClock() {
            this.resetSection();
            this.loadDirectory();
            this.tickTimer();
            setInterval(() => {
                this.readSeconds += 1;
                this.tickTimer();
                if (this.step < 5) {
                    const elapsed = Math.floor((Date.now() - this.openedAt) / 1000);
                    this.remaining = Math.max(0, 8 - elapsed);
                    this.$nextTick(() => this.onScroll());
                }
            }, 1000);
        },
        timerUrgency() {
            const daysLeft = this.timer.ms / 86400000;
            if (daysLeft <= 1) return 'red';
            if (daysLeft <= 3) return 'amber';
            return 'emerald';
        },
        padTime(value) {
            return String(value).padStart(2, '0');
        },
        timerReloaded: false,
        tickTimer() {
            if (!this.timerEndsAt) return;
            const ms = Math.max(0, new Date(this.timerEndsAt).getTime() - Date.now());
            this.timer = {
                days: Math.floor(ms / 86400000),
                hours: Math.floor((ms % 86400000) / 3600000),
                minutes: Math.floor((ms % 3600000) / 60000),
                seconds: Math.floor((ms % 60000) / 1000),
                ms,
            };
            if (ms === 0 && !this.timerReloaded) {
                this.timerReloaded = true;
                window.location.reload();
            }
        },
        resetSection() {
            this.openedAt = Date.now();
            this.remaining = 8;
            this.$nextTick(() => {
                if (this.$refs.reader) this.$refs.reader.scrollTop = 0;
                this.onScroll();
            });
        },
        onScroll() {
            const el = this.$refs.reader;
            if (!el || this.step > 4) return;
            const short = el.scrollHeight <= el.clientHeight + 8;
            const atBottom = el.scrollHeight - el.scrollTop - el.clientHeight < 24;
            if (short || atBottom) this.scrolled[this.step] = true;
        },
        canContinue() {
            return this.remaining === 0 && this.scrolled[this.step];
        },
        continueSection() {
            if (!this.canContinue()) return;
            this.read[this.step] = true;
            this.step += 1;
            if (this.step < 5) this.resetSection();
            if (this.step === 5) this.loadDirectory();
        },
        goBack() {
            if (this.step === 0) return;
            this.step -= 1;
            this.resetSection();
        },
        progress() {
            if (this.step >= 6) return 100;
            const done = this.read.filter(Boolean).length;
            return Math.min(100, (done / 6) * 100 + (this.step === 5 ? 10 : 0));
        },
        progressLabel() {
            if (this.lang === 'rw') {
                if (this.step < 5) return `Igice ${this.step + 1} / 5`;
                if (this.step === 5) return 'Emeza amazina';
                return 'Byarangiye';
            }
            if (this.step < 5) return `Section ${this.step + 1} of 5`;
            if (this.step === 5) return 'Confirm your details';
            return 'Finished';
        },
        sectionKicker() {
            return this.lang === 'rw' ? `Igice ${this.step + 1} / 5` : `Section ${this.step + 1} of 5`;
        },
        sectionTitle() {
            return this.titles[this.lang][this.step];
        },
        waitHint() {
            if (this.remaining > 0) {
                return this.lang === 'rw'
                    ? `Soma iki gice cyose. Ushobora gukomeza nyuma y’amasegonda ${this.remaining}.`
                    : `Read this section. Scroll to the end. Continue unlocks in ${this.remaining}s.`;
            }
            if (!this.scrolled[this.step]) {
                return this.lang === 'rw'
                    ? 'Komeza hasi kugira ngo ukomeze. Ntushobora gusimbuka.'
                    : 'Scroll to the end of this section. Skipping is not allowed.';
            }
            return '';
        },
        continueLabel() {
            if (!this.canContinue()) {
                return this.remaining > 0
                    ? (this.lang === 'rw' ? `Tegereza ${this.remaining}s` : `Wait ${this.remaining}s`)
                    : (this.lang === 'rw' ? 'Komeza hasi' : 'Scroll to the end');
            }
            return this.lang === 'rw' ? 'Nasomye, komeza' : 'I have read this';
        },
        canSubmit() {
            const phrase = this.lang === 'rw' ? 'NDABYEMEYE' : 'I COMMIT';
            return this.picked
                && this.lookupOk
                && this.form.confirmation.trim().toUpperCase() === phrase
                && (this.alreadyCommitted || this.read.every(Boolean));
        },
        csrf() {
            const meta = document.querySelector('meta[name="csrf-token"]')?.content || '';
            const match = document.cookie.match(/(?:^|; )XSRF-TOKEN=([^;]*)/);
            const xsrf = match ? decodeURIComponent(match[1]) : '';
            const headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            };
            if (xsrf) {
                headers['X-XSRF-TOKEN'] = xsrf;
            } else if (meta) {
                headers['X-CSRF-TOKEN'] = meta;
            }
            return headers;
        },
        sessionMessage() {
            return this.lang === 'rw'
                ? 'Ongera usubire kuri iyi paji, noneho hitamo izina ryawe.'
                : 'Refresh the page, then pick your name again.';
        },
        async fetchDirectory() {
            const res = await fetch(@json(route('active-choristers.directory', [], false)), {
                credentials: 'same-origin',
                headers: { 'Accept': 'application/json' },
            });
            const data = await res.json();
            this.directory = data.results || [];
            this.directoryLoaded = true;
            this.filterMembers();
        },
        async loadDirectory() {
            if (this.directoryLoaded || this.looking) return;
            this.looking = true;
            try {
                await this.fetchDirectory();
            } catch (e) {
                this.directory = [];
            } finally {
                this.looking = false;
            }
        },
        normalize(value) {
            return String(value || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/\s+/g, ' ')
                .trim();
        },
        onNameInput() {
            if (this.selecting) return;
            this.picked = false;
            this.lookupOk = false;
            this.matchedMember = '';
            this.alreadyCommitted = false;
            this.lookupMessage = '';
            if (!this.directoryLoaded) {
                this.loadDirectory();
                return;
            }
            this.filterMembers();
        },
        filterMembers() {
            const raw = this.form.name.trim();
            const q = this.normalize(raw);
            const qDigits = raw.replace(/\D+/g, '');

            if (q.length < 2 && qDigits.length < 3) {
                this.matches = [];
                this.matchOpen = false;
                return;
            }

            const scored = [];
            for (const member of this.directory) {
                const name = this.normalize(member.name);
                const words = name.split(' ');
                let score = 99;
                if (q && name.startsWith(q)) score = 0;
                else if (q && words.some((word) => word.startsWith(q))) score = 1;
                else if (q && name.includes(q)) score = 2;
                else if (qDigits.length >= 3 && (member.phone_digits || '').includes(qDigits)) score = 3;
                if (score < 99) scored.push({ score, member });
            }

            scored.sort((a, b) => a.score - b.score || a.member.name.localeCompare(b.member.name));
            this.matches = scored.slice(0, 8).map((row) => row.member);
            this.matchOpen = this.matches.length > 0;
            this.matchIndex = 0;
            this.lookupMessage = this.matches.length
                ? ''
                : (this.lang === 'rw'
                    ? 'Ntabwo ndi kuri uru rutonde?'
                    : 'Not on this list?');
        },
        moveMatch(delta) {
            if (!this.matchOpen || !this.matches.length) return;
            const next = this.matchIndex + delta;
            this.matchIndex = (next + this.matches.length) % this.matches.length;
        },
        highlightName(name) {
            const q = this.form.name.trim();
            const safe = this.escapeHtml(name || '');
            if (q.length < 2) return safe;
            const needle = this.escapeHtml(q).replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            return safe.replace(new RegExp('(' + needle + ')', 'ig'), '<mark class="rounded bg-emerald-100 px-0.5 text-slate-900">$1</mark>');
        },
        escapeHtml(value) {
            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;');
        },
        async pickMember(member, retried) {
            if (!member || !member.token) return;
            this.looking = true;
            this.matchOpen = false;
            try {
                const res = await fetch(@json(route('active-choristers.select', [], false)), {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: this.csrf(),
                    body: JSON.stringify({ token: member.token }),
                });
                const data = await res.json().catch(() => ({}));
                if (res.status === 419 && !retried) {
                    await this.fetchDirectory();
                    return this.pickMember(member, true);
                }
                if (res.status === 419) {
                    this.lookupMessage = this.sessionMessage();
                    return;
                }
                if (!data.found) {
                    this.lookupMessage = data.message && !/csrf/i.test(data.message)
                        ? data.message
                        : (this.lang === 'rw' ? 'Ongera ushake.' : 'Search again.');
                    return;
                }
                this.selecting = true;
                this.form.name = data.member.name || '';
                this.form.phone = data.member.phone || '';
                this.form.email = data.member.email || '';
                this.matchedMember = [data.member.name, data.member.member_id, data.member.voice].filter(Boolean).join(' · ');
                this.alreadyCommitted = !!data.already_committed;
                this.lookupOk = true;
                this.picked = true;
                this.matches = [];
                this.$nextTick(() => { this.selecting = false; });
                this.lookupMessage = this.alreadyCommitted
                    ? (this.lang === 'rw' ? 'Wamaze kwiyemeza gukora umurimo, uwiteka azakubashishe!' : 'You have already committed to do the work. The Lord will strengthen you!')
                    : (this.lang === 'rw' ? 'Twabonye umwirondoro wawe. Reba niba amazina ari yo.' : 'Member found. Check that the details are yours.');
            } catch (e) {
                this.lookupMessage = this.lang === 'rw' ? 'Habaye ikibazo. Ongera ugerageze.' : 'Something went wrong. Please try again.';
            } finally {
                this.looking = false;
            }
        },
        async submitForm() {
            if (!this.canSubmit() || this.submitting) return;
            this.submitting = true;
            this.error = '';
            try {
                const res = await fetch(@json(route('active-choristers.store', [], false)), {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: this.csrf(),
                    body: JSON.stringify({
                        name: this.form.name,
                        phone: this.form.phone,
                        email: this.form.email,
                        language: this.lang,
                        read_seconds: this.readSeconds,
                        sections_read: this.read.filter(Boolean).length,
                        confirmation: this.form.confirmation,
                        website: this.honeypot,
                    }),
                });
                const data = await res.json().catch(() => ({}));
                if (res.status === 419) {
                    this.error = this.sessionMessage();
                    return;
                }
                if (!res.ok || !data.ok) {
                    const raw = data.message || Object.values(data.errors || {})[0]?.[0] || '';
                    this.error = /csrf/i.test(raw) ? this.sessionMessage() : (raw || 'Please check the form.');
                    return;
                }
                this.whatsapp = data.whatsapp;
                this.step = 6;
            } catch (e) {
                this.error = this.lang === 'rw' ? 'Habaye ikibazo. Ongera ugerageze.' : 'Something went wrong. Please try again.';
            } finally {
                this.submitting = false;
            }
        },
    };
}
</script>
<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32"
     @if($registrationOpen)
         x-data="activeChorister()"
         x-init="startClock()"
     @else
         x-data="{ lang: 'rw' }"
     @endif>
    <div class="relative mx-auto max-w-2xl px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                @if($registrationOpen)
                    <span x-show="lang === 'rw'">Itsinda rishya</span>
                    <span x-show="lang === 'en'" x-cloak>New group</span>
                @else
                    <span x-show="lang === 'rw'">Kwiyandikisha byafunze</span>
                    <span x-show="lang === 'en'" x-cloak>Registration closed</span>
                @endif
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">
                Active Choristers
            </h1>
            @if($registrationOpen)
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base" x-show="lang === 'rw'">
                    Soma amabwiriza yose, hanyuma wemeze amazina yawe mbere yo kwinjira mu itsinda rya WhatsApp.
                </p>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base" x-show="lang === 'en'" x-cloak>
                    Read every term, confirm who you are, then the WhatsApp group will open.
                </p>
            @else
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base" x-show="lang === 'rw'">
                    Kwiyandikisha kw’abarinrimbyi bakora umurimo byafunze. Andikira ubuyobozi niba ukeneye ubufasha.
                </p>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600 sm:text-base" x-show="lang === 'en'" x-cloak>
                    Signing for Active Choristers is closed. Write to the choir office if you need help.
                </p>
            @endif
        </div>

        <div class="mb-4 flex items-center rounded-full border border-slate-200 bg-slate-50 p-1">
            <button type="button" @click="lang = 'rw'"
                class="flex-1 rounded-full px-3 py-2.5 text-sm font-semibold transition"
                :class="lang === 'rw' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'">
                Ikinyarwanda
            </button>
            <button type="button" @click="lang = 'en'"
                class="flex-1 rounded-full px-3 py-2.5 text-sm font-semibold transition"
                :class="lang === 'en' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'">
                English
            </button>
        </div>

        @if($registrationOpen)
        <div x-show="timerEndsAt && timer.ms > 0" x-cloak class="mb-5 overflow-hidden rounded-[24px] border p-4 sm:p-5"
             :class="timerUrgency() === 'red' ? 'border-rose-300 bg-rose-50' : (timerUrgency() === 'amber' ? 'border-amber-300 bg-amber-50' : 'border-emerald-200 bg-emerald-50')">
            <div class="flex flex-col items-center text-center">
                <p class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-wider"
                   :class="timerUrgency() === 'red' ? 'text-rose-700' : (timerUrgency() === 'amber' ? 'text-amber-800' : 'text-emerald-700')">
                    <span class="h-1.5 w-1.5 rounded-full"
                          :class="timerUrgency() === 'red' ? 'animate-pulse bg-rose-600' : (timerUrgency() === 'amber' ? 'bg-amber-500' : 'bg-emerald-600')"></span>
                    <span x-show="timerUrgency() === 'red'" x-cloak x-text="lang === 'rw' ? 'Igihe gihuye' : 'Time is running out'"></span>
                    <span x-show="timerUrgency() !== 'red'" x-text="lang === 'rw' ? 'Iyi link izifunga mu' : 'This invitation closes in'"></span>
                </p>
                <p x-show="timerUrgency() === 'red'" x-cloak class="mt-1 text-sm font-semibold text-rose-800"
                   x-text="lang === 'rw' ? 'Injira mbere yuko umurongo usiba.' : 'Join before this link disappears.'"></p>
                <div class="mt-4 grid w-full grid-cols-4 gap-2 sm:gap-3">
                    <div class="rounded-2xl bg-white px-2 py-3 shadow-sm ring-1"
                         :class="timerUrgency() === 'red' ? 'ring-rose-200' : (timerUrgency() === 'amber' ? 'ring-amber-200' : 'ring-emerald-100')">
                        <p class="text-2xl font-semibold tabular-nums tracking-tight sm:text-3xl"
                           :class="timerUrgency() === 'red' ? 'text-rose-700' : (timerUrgency() === 'amber' ? 'text-amber-800' : 'text-slate-900')"
                           x-text="padTime(timer.days)"></p>
                        <p class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500" x-text="lang === 'rw' ? 'Iminsi' : 'Days'"></p>
                    </div>
                    <div class="rounded-2xl bg-white px-2 py-3 shadow-sm ring-1"
                         :class="timerUrgency() === 'red' ? 'ring-rose-200' : (timerUrgency() === 'amber' ? 'ring-amber-200' : 'ring-emerald-100')">
                        <p class="text-2xl font-semibold tabular-nums tracking-tight sm:text-3xl"
                           :class="timerUrgency() === 'red' ? 'text-rose-700' : (timerUrgency() === 'amber' ? 'text-amber-800' : 'text-slate-900')"
                           x-text="padTime(timer.hours)"></p>
                        <p class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500" x-text="lang === 'rw' ? 'Amasaha' : 'Hours'"></p>
                    </div>
                    <div class="rounded-2xl bg-white px-2 py-3 shadow-sm ring-1"
                         :class="timerUrgency() === 'red' ? 'ring-rose-200' : (timerUrgency() === 'amber' ? 'ring-amber-200' : 'ring-emerald-100')">
                        <p class="text-2xl font-semibold tabular-nums tracking-tight sm:text-3xl"
                           :class="timerUrgency() === 'red' ? 'text-rose-700' : (timerUrgency() === 'amber' ? 'text-amber-800' : 'text-slate-900')"
                           x-text="padTime(timer.minutes)"></p>
                        <p class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500" x-text="lang === 'rw' ? 'Iminota' : 'Min'"></p>
                    </div>
                    <div class="rounded-2xl bg-white px-2 py-3 shadow-sm ring-1"
                         :class="timerUrgency() === 'red' ? 'ring-rose-200' : (timerUrgency() === 'amber' ? 'ring-amber-200' : 'ring-emerald-100')">
                        <p class="text-2xl font-semibold tabular-nums tracking-tight sm:text-3xl"
                           :class="timerUrgency() === 'red' ? 'text-rose-700' : (timerUrgency() === 'amber' ? 'text-amber-800' : 'text-slate-900')"
                           x-text="padTime(timer.seconds)"></p>
                        <p class="mt-0.5 text-[10px] font-semibold uppercase tracking-wider text-slate-500" x-text="lang === 'rw' ? 'Amaseg.' : 'Sec'"></p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(! $registrationOpen)
            <article class="rounded-[28px] border border-slate-200/80 bg-white p-8 text-center shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Active Choristers</p>
                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900" x-show="lang === 'rw'">Kwiyandikisha byafunze</h2>
                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900" x-show="lang === 'en'" x-cloak>Registration is closed</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600" x-show="lang === 'rw'">
                    Niba ushaka kwinjira mu itsinda rya WhatsApp, andikira ubuyobozi bwa korali.
                </p>
                <p class="mt-2 text-sm leading-6 text-slate-600" x-show="lang === 'en'" x-cloak>
                    If you need the WhatsApp group, write to the choir office.
                </p>
                <a href="{{ route('contact') }}"
                   class="mt-6 inline-flex min-h-[48px] items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white hover:bg-emerald-600">
                    <span x-show="lang === 'rw'">Andikira ubuyobozi</span>
                    <span x-show="lang === 'en'" x-cloak>Contact the office</span>
                </a>
            </article>
        @else
        <div class="mb-5">
            <div class="mb-2 flex items-center justify-between text-xs font-medium text-slate-500">
                <span x-text="progressLabel()"></span>
                <span x-text="Math.round(progress()) + '%'"></span>
            </div>
            <div class="h-1.5 overflow-hidden rounded-full bg-slate-100">
                <div class="h-full rounded-full bg-emerald-600 transition-all duration-500" :style="`width: ${progress()}%`"></div>
            </div>
        </div>

        <template x-if="step < 5">
            <article class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <div class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-5 sm:px-7">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700" x-text="sectionKicker()"></p>
                    <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900" x-text="sectionTitle()"></h2>
                </div>

                <div class="relative">
                    <div x-ref="reader"
                         @scroll="onScroll()"
                         class="max-h-[58vh] space-y-5 overflow-y-auto px-5 py-5 text-[15px] leading-7 text-slate-700 sm:max-h-[52vh] sm:px-7">
                        <template x-if="step === 0">
                            <div class="space-y-4">
                                <p class="text-sm leading-6 text-slate-600" x-show="lang === 'rw'" x-cloak>Ikaze mu muryango w’abaririmbyi ba God’s Family Choir. Mbere yo kwinjira mu itsinda, soma amabwiriza akurikira kandi wemere kuyakurikiza.</p>
                                <p class="text-sm leading-6 text-slate-600" x-show="lang === 'en'" x-cloak>Welcome to the chorister family of God’s Family Choir. Before you join the group, read the terms below and agree to keep them.</p>
                                <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-5">
                                    <p x-show="lang === 'rw'" x-cloak>Nemeye ko nk’umuririmbyi wa God’s Family Choir (GF Active Chorister) nzajya nitabira uko bikwiriye ibikorwa byose bya chorale nk’uko bisobanurwa hasi; ndetse ngira uruhare mu bikorwa byose by’iterambere rya Chorale.</p>
                                    <p x-show="lang === 'en'" x-cloak>I agree that as a chorister of God’s Family Choir (GF Active Chorister), I will faithfully attend every choir activity as explained below, and take part in all work that builds up the choir.</p>
                                </div>
                            </div>
                        </template>

                        <template x-if="step === 1">
                            <div class="space-y-5">
                                <p x-show="lang === 'rw'" x-cloak>Nemeye ko nzitabira imyitozo ihoraho gatatu mu cyumweru ya God’s Family Choir, ndetse n’iyiyongera bitewe n’impamvu runaka. Iyo myitozo ni iyi ikurikira:</p>
                                <p x-show="lang === 'en'" x-cloak>I agree to attend the three regular weekly rehearsals of God’s Family Choir, and any extra rehearsals added when needed. Those rehearsals are:</p>

                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                    <template x-for="(item, index) in rehearsals" :key="index">
                                        <div class="flex items-center gap-4 px-4 py-4"
                                             :class="index < rehearsals.length - 1 ? 'border-b border-slate-100' : ''">
                                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-700 text-[11px] font-semibold uppercase tracking-wide text-white" x-text="item.short[lang]"></span>
                                            <div class="min-w-0 flex-1">
                                                <p class="font-semibold text-slate-900" x-text="item.day[lang]"></p>
                                                <p class="text-xs text-slate-500" x-text="item.sub[lang]"></p>
                                            </div>
                                            <span class="shrink-0 rounded-full bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-700" x-text="item.time"></span>
                                        </div>
                                    </template>
                                </div>

                                <div class="space-y-3">
                                    <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700" x-text="lang === 'rw' ? 'Icyitonderwa' : 'Please note'"></p>
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                        <p class="text-sm font-semibold text-slate-900" x-text="lang === 'rw' ? 'Umukoro' : 'Homework'"></p>
                                        <p class="mt-1 text-sm leading-6 text-slate-600" x-text="lang === 'rw'
                                            ? 'Nemeye ko, mu gihe abatoza batanze umukoro utegura imyitozo, nzitabira imyitozo nakoreye neza umukoro watanzwe, kugira ngo imyitozo igende neza.'
                                            : 'I agree that when trainers give homework to prepare for rehearsal, I will attend after doing that work well, so rehearsal can move forward.'"></p>
                                    </div>
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                                        <p class="text-sm font-semibold text-slate-900" x-text="lang === 'rw' ? 'Gusiba no gukererwa' : 'Absence and lateness'"></p>
                                        <p class="mt-1 text-sm leading-6 text-slate-600" x-text="lang === 'rw'
                                            ? 'Nemeye ko ntazasiba cyangwa ngo nkererwe, kandi niba bibayeho nzabimenyesha ubuyobozi mbere y’igihe.'
                                            : 'I agree not to be absent or late. If either happens, I will tell leadership in advance.'"></p>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="step === 2">
                            <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-5">
                                <p x-show="lang === 'rw'" x-cloak>Nemeye ko nzitabira amateraniro yose Chorale ifitemo gahunda yo kuririmba, kandi nzaririmba, mu gihe nta kimbuza kuririmba kizwi n’ubuyobozi bwa Chorale.</p>
                                <p x-show="lang === 'en'" x-cloak>I agree to attend every gathering where the choir is scheduled to sing, and to sing, unless leadership already knows a reason that prevents me.</p>
                            </div>
                        </template>

                        <template x-if="step === 3">
                            <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-5">
                                <p x-show="lang === 'rw'" x-cloak>Nemeye ko nzitabira ibikorwa byose by’ivugabutumwa, byaba byateguwe na chorale ubwayo cyangwa n’itorero. Impamvu yose yatuma ntitabira ibi bikorwa nzayimenyesha ubuyobozi mbere y’igihe.</p>
                                <p x-show="lang === 'en'" x-cloak>I agree to attend every evangelism activity, whether it is prepared by the choir or by the church. Any reason I cannot attend, I will report to leadership in advance.</p>
                            </div>
                        </template>

                        <template x-if="step === 4">
                            <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-5">
                                <p x-show="lang === 'rw'" x-cloak>Nemeye kuba umwizera ushimwa n’itorero, nubahiriza amahame yose itorero ry’Abadiventisti b’Umunsi wa Karindwi rigenderaho.</p>
                                <p x-show="lang === 'en'" x-cloak>I agree to be a believer in good standing with the church, keeping the principles of the Seventh-day Adventist Church.</p>
                            </div>
                        </template>

                        <p class="rounded-2xl bg-slate-50 px-4 py-3 text-sm text-slate-600" x-show="!canContinue()"
                           x-text="waitHint()"></p>
                    </div>
                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-white to-transparent"></div>
                </div>

                <div class="flex items-center gap-3 border-t border-slate-100 px-5 py-4 sm:px-7">
                    <button type="button" @click="goBack()" x-show="step > 0"
                        class="rounded-full px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        <span x-text="lang === 'rw' ? 'Inyuma' : 'Back'"></span>
                    </button>
                    <button type="button" @click="continueSection()" :disabled="!canContinue()"
                        class="ml-auto inline-flex min-h-[48px] flex-1 items-center justify-center rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white transition disabled:cursor-not-allowed disabled:bg-slate-300 sm:flex-none">
                        <span x-text="continueLabel()"></span>
                    </button>
                </div>
            </article>
        </template>

        <template x-if="step === 5">
            <article class="rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <header class="overflow-hidden rounded-t-[28px] border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-6 sm:px-7">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-700 text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700" x-text="lang === 'rw' ? 'Intambwe ya 6' : 'Final step'"></p>
                            <h2 class="mt-1 text-2xl font-semibold tracking-tight text-slate-900" x-text="lang === 'rw' ? 'Emeza kuba umuririmbyi' : 'Confirm who you are'"></h2>
                            <p class="mt-1.5 text-sm leading-6 text-slate-600" x-text="lang === 'rw'
                                ? 'Hitamo izina ryawe mu bitabo. Niba utariho, banza wiyandikishe.'
                                : 'Pick your registered name. If you are not on the list, register first.'"></p>
                        </div>
                    </div>
                </header>

                <form @submit.prevent="submitForm()" class="space-y-5 p-5 sm:p-7">
                    <input type="text" name="website" x-model="honeypot" class="hidden" tabindex="-1" autocomplete="off">

                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4 sm:p-5">
                        <div @click.outside="matchOpen = false">
                            <label class="block">
                                <span class="mb-2 block text-sm font-medium text-slate-700" x-text="lang === 'rw' ? 'Amazina' : 'Full name'"></span>
                                <div class="relative">
                                    <input type="text" x-model="form.name" required autocomplete="off"
                                        @input="onNameInput()"
                                        @focus="loadDirectory(); matchOpen = matches.length > 0"
                                        @keydown.arrow-down.prevent="moveMatch(1)"
                                        @keydown.arrow-up.prevent="moveMatch(-1)"
                                        @keydown.enter.prevent="matches[matchIndex] ? pickMember(matches[matchIndex]) : null"
                                        @keydown.escape.prevent="matchOpen = false"
                                        :placeholder="lang === 'rw' ? 'Andika izina ryawe...' : 'Start typing your registered name...'"
                                        class="min-h-[52px] w-full rounded-2xl border border-slate-200 bg-white py-3 pl-12 pr-4 text-sm shadow-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                                    <svg class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                    </svg>
                                </div>
                            </label>
                            <div x-show="looking && !directoryLoaded && form.name.trim().length >= 2" x-cloak
                                 class="mt-3 overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                <p class="border-b border-slate-100 px-4 py-3 text-sm text-slate-500" x-text="lang === 'rw' ? 'Turimo gushaka amazina...' : 'Looking up names...'"></p>
                                <template x-for="i in 2" :key="'skel-' + i">
                                    <div class="flex items-center gap-3 px-4 py-3">
                                        <span class="h-9 w-9 shrink-0 animate-pulse rounded-full bg-slate-100"></span>
                                        <span class="min-w-0 flex-1 space-y-2">
                                            <span class="block h-3 w-2/3 animate-pulse rounded bg-slate-100"></span>
                                            <span class="block h-2.5 w-1/3 animate-pulse rounded bg-slate-100"></span>
                                        </span>
                                    </div>
                                </template>
                            </div>
                            <div x-show="matchOpen" x-cloak
                                 class="mt-3 overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                <template x-for="(member, index) in matches" :key="member.token">
                                    <button type="button" @mousedown.prevent="pickMember(member)"
                                        class="flex w-full items-start gap-3 px-4 py-3 text-left transition"
                                        :class="index === matchIndex ? 'bg-emerald-50' : 'hover:bg-slate-50'">
                                        <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-xs font-semibold text-slate-600 ring-1 ring-slate-200"
                                              x-text="(member.name || '?').slice(0, 1)"></span>
                                        <span class="min-w-0 flex-1">
                                            <span class="block break-words text-sm font-semibold leading-5 text-slate-900" x-html="highlightName(member.name)"></span>
                                            <span class="mt-0.5 block text-xs text-slate-500" x-text="[member.phone_hint, member.voice].filter(Boolean).join(' · ')"></span>
                                        </span>
                                    </button>
                                </template>
                                <a :href="registerUrl"
                                    class="block w-full border-t border-amber-100 bg-amber-50/70 px-4 py-3 text-left text-sm font-medium text-amber-800 hover:bg-amber-50">
                                    <span x-text="lang === 'rw' ? 'Ntabwo ndi kuri uru rutonde?' : 'Not on this list?'"></span>
                                </a>
                            </div>
                            <p class="mt-2 text-sm" :class="lookupOk ? 'text-emerald-700' : 'text-amber-800'" x-text="lookupMessage"></p>
                            <a x-show="!picked && lookupMessage && !matches.length" x-cloak
                               :href="registerUrl"
                               class="mt-3 inline-flex min-h-[44px] items-center justify-center rounded-full bg-emerald-700 px-4 text-sm font-semibold text-white hover:bg-emerald-600"
                               x-text="lang === 'rw' ? 'Iyandikishe nk’umwiririmbyi' : 'Register as a member'"></a>
                        </div>
                    </div>

                    <div x-show="picked" x-cloak class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700" x-text="lang === 'rw' ? 'Telefoni' : 'Phone'"></span>
                            <input type="tel" x-model="form.phone" readonly tabindex="-1"
                                class="min-h-[48px] w-full cursor-default rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700">Email</span>
                            <input type="email" x-model="form.email" readonly tabindex="-1"
                                class="min-h-[48px] w-full cursor-default rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm text-slate-700">
                        </label>
                    </div>

                    <div x-show="matchedMember" x-cloak class="flex items-start gap-3 rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                        <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white text-emerald-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </span>
                        <div>
                            <p class="font-semibold" x-text="lang === 'rw' ? 'Twagushyize mu bitabo' : 'We found you'"></p>
                            <p class="mt-0.5 text-emerald-800/80" x-text="matchedMember"></p>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-4" x-show="picked" x-cloak>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium text-slate-700"
                                  x-text="lang === 'rw' ? 'Andika NDABYEMEYE wemeze' : 'Type I COMMIT to confirm'"></span>
                            <input type="text" x-model="form.confirmation" required autocomplete="off"
                                :placeholder="lang === 'rw' ? 'NDABYEMEYE' : 'I COMMIT'"
                                class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm uppercase tracking-wide outline-none ring-emerald-600/20 focus:border-emerald-600 focus:bg-white focus:ring-4">
                        </label>
                    </div>

                    <p class="text-sm text-rose-600" x-show="error" x-text="error"></p>

                    <button type="submit" x-show="picked" x-cloak :disabled="submitting || !canSubmit()"
                        class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-emerald-700 text-sm font-semibold text-white shadow-sm disabled:cursor-not-allowed disabled:bg-slate-300 disabled:shadow-none">
                        <span x-text="submitting
                            ? (lang === 'rw' ? 'Birimo...' : 'Saving...')
                            : (lang === 'rw' ? 'Emeza kandi injira' : 'Commit and continue')"></span>
                    </button>
                </form>
            </article>
        </template>

        <template x-if="step === 6">
            <article class="rounded-3xl border border-emerald-100 bg-white p-6 text-center shadow-sm">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="mt-4 text-2xl font-semibold text-slate-900" x-text="lang === 'rw' ? 'Urabyemeye' : 'You are committed'"></h2>
                <p class="mt-2 text-sm leading-6 text-slate-600" x-text="lang === 'rw'
                    ? 'Wamaze kwiyemeza gukora umurimo, uwiteka azakubashishe!'
                    : 'You have already committed to do the work. The Lord will strengthen you!'"></p>
                <p class="mt-2 text-sm leading-6 text-slate-500" x-text="lang === 'rw'
                    ? 'Ubu dusangira nawe umurongo w’itsinda rya WhatsApp ry’Active Choristers.'
                    : 'We now share the Active Choristers WhatsApp link with you.'"></p>
                <p class="mt-4 break-all rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-left font-mono text-xs text-slate-700" x-text="whatsapp"></p>
                <div class="mt-3 grid gap-2 sm:grid-cols-2">
                    <button type="button"
                        @click="navigator.clipboard.writeText(whatsapp)"
                        class="inline-flex min-h-[48px] items-center justify-center rounded-full border border-slate-200 px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                        x-text="lang === 'rw' ? 'Koporora umurongo' : 'Copy link'"></button>
                    <a :href="whatsapp" target="_blank" rel="noopener"
                       class="inline-flex min-h-[48px] items-center justify-center gap-2 rounded-full bg-[#25D366] px-4 text-sm font-semibold text-white">
                        <span x-text="lang === 'rw' ? 'Fungura WhatsApp' : 'Open WhatsApp'"></span>
                    </a>
                </div>
            </article>
        </template>
        @endif
    </div>
</div>

<x-static.footer />
@endsection
