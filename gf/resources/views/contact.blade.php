@extends('layouts.app')

@section('content')
    <section class="relative bg-white py-20 overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute -right-32 -top-32 w-64 h-64 rounded-full bg-lime-400 opacity-20 blur-3xl"></div>
        <div class="absolute -left-32 -bottom-32 w-64 h-64 rounded-full bg-emerald-500 opacity-20 blur-3xl"></div>

        <!-- Music Notes Canvas -->
        <canvas id="musicNotesCanvas" class="absolute inset-0 pointer-events-none"></canvas>

        <!-- Main Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-6xl font-bold text-emerald-900 mb-6 animate-fade-in">
                    Get In <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-lime-500">Touch</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-6">
                    Reach out to us for any questions, collaborations, or spiritual support. We’d love to hear from you!
                </p>
                <div
                    class="inline-flex items-center bg-emerald-100 px-6 py-3 rounded-full border border-emerald-200 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-emerald-700 font-medium">We respond within 24 hours</span>
                </div>
            </div>

            <!-- Interactive Form Section -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-200">
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-emerald-500 to-lime-500 p-6">
                        <h3 class="text-2xl font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 animate-pulse" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Send a Message
                        </h3>
                    </div>

                    <!-- Form Body -->
                    <form method="POST" action="{{ route('contact.submit') }}" class="p-6 md:p-8 grid gap-6"
                        id="contactForm">
                        @csrf

                        <div class="relative">
                            <input type="text" name="name" required
                                class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]"
                                placeholder="Your Name">
                            <label
                                class="absolute left-4 top-2 text-sm text-emerald-600 peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 transition-all">Your
                                Name</label>
                        </div>

                        <div class="relative">
                            <input type="email" name="email" required
                                class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]"
                                placeholder="Your Email">
                            <label
                                class="absolute left-4 top-2 text-sm text-emerald-600 peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 transition-all">Your
                                Email</label>
                        </div>

                        <div class="relative">
                            <select name="subject" required
                                class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]">
                                <option value="" disabled selected hidden>Choose a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Prayer Request">Prayer Request</option>
                                <option value="Booking">Booking/Invitation</option>
                                <option value="Feedback">Feedback</option>
                            </select>
                            <label class="absolute left-4 top-2 text-sm text-emerald-600 transition-all">Subject</label>
                        </div>

                        <div class="relative">
                            <textarea name="message" rows="5" required
                                class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]"
                                placeholder="Your Message"></textarea>
                            <label
                                class="absolute left-4 top-2 text-sm text-emerald-600 peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 transition-all">Your
                                Message</label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition-all duration-300 flex items-center justify-center transform hover:scale-105">
                                <span>Send Message</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 animate-bounce-x" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Scripture Footer -->
            <div class="text-center mt-20">
                <blockquote class="text-xl italic text-emerald-800 animate-fade-in">“Let your speech always be gracious,
                    seasoned with salt...”</blockquote>
                <p class="text-emerald-600 font-medium mt-2">— Colossians 4:6</p>
            </div>
        </div>
    </section>

    <style>
        @keyframes bounce-x {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(5px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatNote {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.8;
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .animate-bounce-x {
            animation: bounce-x 1s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-out;
        }
    </style>

    <script>
        // Music Notes Animation (reduced frequency)
        const canvas = document.getElementById('musicNotesCanvas');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        const notes = [];
        const noteSymbols = ['♪', '♫'];

        function createNote() {
            if (notes.length < 10) {
                const note = {
                    x: Math.random() * canvas.width,
                    y: canvas.height,
                    speed: 1 + Math.random() * 2,
                    symbol: noteSymbols[Math.floor(Math.random() * noteSymbols.length)],
                    size: 20 + Math.random() * 15,
                    rotation: 0,
                };
                notes.push(note);
            }
        }

        function animateNotes() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            notes.forEach((note, index) => {
                note.y -= note.speed;
                note.rotation += 0.02;
                ctx.save();
                ctx.translate(note.x, note.y);
                ctx.rotate(note.rotation);
                ctx.font = `${note.size}px Arial`;
                ctx.fillStyle = 'rgba(16, 185, 129, 0.5)';
                ctx.fillText(note.symbol, 0, 0);
                ctx.restore();
                if (note.y < -50) notes.splice(index, 1);
            });
            if (Math.random() < 0.05) createNote();
            requestAnimationFrame(animateNotes);
        }

        animateNotes();
    </script>
    <x-static.footer />
@endsection
