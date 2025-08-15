<!-- resources/views/songs/music.blade.php -->
@extends('layouts.app')

@section('content')
    <section class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-emerald-800 mb-4">The Stories Behind Our Songs</h1>
                <p class="text-lg text-gray-600">Every melody has a divine inspiration. Discover the testimonies.</p>
            </div>

            <!-- Dynamic Timeline -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 w-1 bg-emerald-200 h-full transform -translate-x-1/2 z-0"></div>

                <!-- Songs from Database -->
                @foreach ($songs as $song)
                    <div class="mb-16 flex justify-center">
                        <div
                            class="w-full md:w-1/2 p-6 bg-white rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition transform hover:-translate-y-1 {{ $loop->iteration % 2 === 0 ? 'md:ml-auto' : 'md:mr-auto' }}">
                            <div class="flex flex-col md:flex-row gap-6">
                                <!-- Song Cover -->
                                <div class="flex-shrink-0 relative group">
                                    <img src="{{ asset('storage/' . $song->cover_image) }}" alt="{{ $song->title }}"
                                        class="w-32 h-32 rounded-lg object-cover shadow">
                                    @if ($song->youtube_link)
                                        <a href="{{ $song->youtube_link }}" target="_blank"
                                            class="absolute inset-0 flex items-center justify-center bg-black/30 rounded-lg opacity-0 group-hover:opacity-100 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                <!-- Song Details -->
                                <div>
                                    <span class="text-sm text-emerald-600 font-bold">{{ $song->release_year }}</span>
                                    <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $song->title }}</h2>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($song->story, 200) }}</p>

                                    @if ($song->scripture_reference)
                                        <div class="flex items-center text-sm text-emerald-700 mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $song->scripture_reference }}
                                        </div>
                                    @endif

                                    <a href="{{ route('songs.show', $song->slug) }}"
                                        class="inline-flex items-center text-emerald-600 hover:text-emerald-800 font-medium">
                                        Read Full Story
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Featured Song Writers Section -->
            @if ($featuredWriters->count())
                <div class="my-20">
                    <h2 class="text-3xl font-bold text-center text-emerald-800 mb-12">Meet the Songwriters</h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        @foreach ($featuredWriters as $writer)
                            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="relative h-64">
                                    <img src="{{ asset('storage/' . $writer->photo) }}" alt="{{ $writer->name }}"
                                        class="w-full h-full object-cover">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                                        <h3 class="text-white text-2xl font-bold">{{ $writer->name }}</h3>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-600 mb-4 italic">"{{ Str::limit($writer->testimony, 150) }}"</p>
                                    <a href="{{ route('writers.show', $writer->id) }}"
                                        class="text-emerald-600 hover:text-emerald-800 font-medium">
                                        Read Full Testimony →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Audio Testimonies -->
            @if ($audioTestimonies->count())
                <div class="bg-emerald-50 rounded-xl p-8 my-12">
                    <h2 class="text-2xl font-bold text-emerald-800 mb-6 text-center">Listen to the Stories</h2>
                    <div class="space-y-4">
                        @foreach ($audioTestimonies as $audio)
                            <div
                                class="bg-white p-4 rounded-lg shadow-sm flex items-center gap-4 hover:shadow-md transition">
                                <button
                                    class="play-audio bg-emerald-100 text-emerald-600 p-3 rounded-full hover:bg-emerald-200 transition"
                                    data-audio="{{ asset('storage/' . $audio->audio_file) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">{{ $audio->title }}</h4>
                                    <p class="text-sm text-gray-500">{{ gmdate('i:s', $audio->duration_seconds) }} ·
                                        Interview</p>
                                </div>
                                <audio id="audio-{{ $audio->id }}"
                                    src="{{ asset('storage/' . $audio->audio_file) }}"></audio>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Audio player functionality
            document.querySelectorAll('.play-audio').forEach(button => {
                button.addEventListener('click', function() {
                    const audioSrc = this.getAttribute('data-audio');
                    const audio = new Audio(audioSrc);
                    audio.play();
                });
            });
        });
    </script>
@endpush
