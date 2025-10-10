@extends('layouts.app')

@section('content')
    <section class="relative bg-emerald-950 py-20 lg:py-28 overflow-hidden">
        {{-- Background + overlays (same vibe as hero) --}}
        <div class="absolute inset-0">
            <img src="{{ asset('images/gf-2.jpg') }}" alt="Choir background"
                class="w-full h-full object-cover object-center opacity-25" />
            <div class="absolute inset-0 bg-emerald-950/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/80 to-transparent"></div>
        </div>
        {{-- Grid texture --}}
        <div class="absolute inset-0 bg-[url('/images/grid-bg.svg')] bg-cover opacity-20 mix-blend-soft-light"></div>
        {{-- Gradient blobs --}}
        <div class="absolute top-20 -left-10 w-40 h-40 bg-amber-400 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-20 -right-10 w-40 h-40 bg-teal-400 rounded-full blur-3xl opacity-20"></div>
        {{-- Floating musical notes (uses classes from hero.css) --}}
        <div class="absolute top-24 right-10 w-6 h-8 text-white/10 animate-float-slow">♩</div>
        <div class="absolute top-64 left-24 w-8 h-10 text-white/10 animate-float-medium">♪</div>
        <div class="absolute bottom-36 right-32 w-10 h-12 text-white/10 animate-float-fast">♫</div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Card --}}
            <div
                class="rounded-2xl border border-emerald-800/30 bg-white/80 dark:bg-emerald-900/60 backdrop-blur p-8 shadow-2xl">
                {{-- Badge --}}
                <div class="flex justify-center mb-4">
                    <div
                        class="inline-flex items-center gap-2 bg-emerald-900/70 backdrop-blur-sm text-amber-300 py-1.5 px-3.5 rounded-full border border-emerald-800/60">
                        <span class="inline-block w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
                        <span class="text-[13px] font-medium">Registration Complete</span>
                    </div>
                </div>

                {{-- Success header --}}
                <div class="mx-auto w-14 h-14 rounded-2xl bg-emerald-600/10 flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-emerald-600" viewBox="0 0 24 24" fill="none">
                        <path d="M20 7L9 18l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-center text-emerald-50">Thank you for registering!</h1>

                @if (session('success'))
                    <p class="mt-3 text-center text-emerald-100/80">
                        {{ session('success') }}
                    </p>
                @endif

                {{-- WhatsApp invite actions --}}
                @if (session('whatsapp_invite'))
                    @php $invite = session('whatsapp_invite'); @endphp
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a href="{{ $invite }}" target="_blank" rel="noopener"
                            class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.86 7.86 0 008.002.137C3.614.137.02 3.73.02 8.118c0 1.43.377 2.796 1.092 4.012L0 16l3.98-1.087a7.882 7.882 0 004.02 1.095h.003c4.388 0 7.98-3.594 7.98-7.98a7.94 7.94 0 00-2.382-5.702z" />
                            </svg>
                            Join our WhatsApp group
                        </a>

                        <button id="copyInvite" data-link="{{ $invite }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-emerald-800/30 px-5 py-3 hover:bg-emerald-50/20 text-emerald-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                <path d="M8 7h8a2 2 0 012 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2V9a2 2 0 012-2z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M16 7V5a2 2 0 00-2-2H8a2 2 0 00-2 2v2" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Copy invite link
                        </button>

                        <button id="shareInvite" data-link="{{ $invite }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-emerald-800/30 px-5 py-3 hover:bg-emerald-50/20 text-emerald-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                <path d="M4 12v7a1 1 0 001 1h14a1 1 0 001-1v-7" stroke="currentColor" stroke-width="2" />
                                <path d="M12 3v14m0 0l-4-4m4 4l4-4" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Share
                        </button>
                    </div>

                    <p class="mt-4 text-center text-sm text-emerald-100/70">
                        Tip: if the link doesn’t open WhatsApp automatically, copy it and paste inside WhatsApp.
                    </p>
                @else
                    <p class="mt-8 text-center text-emerald-100/80">
                        We’ll share the WhatsApp invite soon. Please keep an eye on your email or phone.
                    </p>
                @endif

                {{-- Secondary actions --}}
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center gap-2 rounded-xl px-5 py-3 border border-emerald-800/30 hover:bg-emerald-50/20 text-emerald-50 transition">
                        ← Back to home
                    </a>
                    <a href="{{ route('choir.register.form') }}"
                        class="inline-flex items-center gap-2 rounded-xl px-5 py-3 bg-amber-400 hover:bg-amber-500 text-emerald-950 transition">
                        Register another member
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Minimal JS for copy + share --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const copyBtn = document.getElementById('copyInvite');
            const shareBtn = document.getElementById('shareInvite');

            if (copyBtn) {
                copyBtn.addEventListener('click', async () => {
                    const link = copyBtn.getAttribute('data-link');
                    try {
                        await navigator.clipboard.writeText(link);
                        copyBtn.innerText = 'Copied!';
                        setTimeout(() => copyBtn.innerText = 'Copy invite link', 1500);
                    } catch {
                        const ta = document.createElement('textarea');
                        ta.value = link;
                        document.body.appendChild(ta);
                        ta.select();
                        document.execCommand('copy');
                        document.body.removeChild(ta);
                        copyBtn.innerText = 'Copied!';
                        setTimeout(() => copyBtn.innerText = 'Copy invite link', 1500);
                    }
                });
            }

            if (shareBtn && navigator.share) {
                shareBtn.addEventListener('click', async () => {
                    const url = shareBtn.getAttribute('data-link');
                    try {
                        await navigator.share({
                            title: 'GF Choir WhatsApp Invite',
                            text: 'Join our choir WhatsApp group',
                            url
                        });
                    } catch {}
                });
            } else if (shareBtn) {
                shareBtn.addEventListener('click', () => copyBtn?.click());
                shareBtn.title = 'Share not supported here — copies the link instead';
            }
        });
    </script>
    <x-static.footer />
@endsection
