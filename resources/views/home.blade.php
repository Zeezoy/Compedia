@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="max-w-7xl mx-auto px-6 pt-10 pb-24">

    <div class="grid lg:grid-cols-2 gap-16 items-center">

        {{-- Left --}}
        <div>

            <div class="inline-block mb-6 px-4 py-2 rounded-full border border-purple-500/30 bg-purple-500/10 text-purple-300 text-sm">
                Find Your Next Competition
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold leading-tight mb-6">
                Discover <span class="text-purple-500">Competitions</span><br>
                Without Missing Deadlines
            </h1>

            <p class="text-white/60 text-lg leading-relaxed mb-10 max-w-xl">
                Compedia helps students discover verified competitions,
                hackathons, olympiads, and challenges in one centralized platform.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">

            <a href="{{ route('public.competitions.index') }}" class="bg-purple-600 hover:bg-purple-700 transition px-8 py-4 rounded-2xl font-semibold">
                Explore Now
            </a>

                <button class="border border-white/10 hover:border-purple-500 transition px-8 py-4 rounded-2xl font-semibold">
                    Learn More
                </button>

            </div>

            {{-- STATS --}}
            <div class="flex flex-wrap items-center gap-8">

                <div>
                    <div class="text-3xl font-bold text-purple-400">
                        500+
                    </div>

                    <div class="text-white/50 text-sm mt-1">
                        Competitions
                    </div>
                </div>

                <div>
                    <div class="text-3xl font-bold text-purple-400">
                        120+
                    </div>

                    <div class="text-white/50 text-sm mt-1">
                        Universities
                    </div>
                </div>

                <div>
                    <div class="text-3xl font-bold text-purple-400">
                        20k+
                    </div>

                    <div class="text-white/50 text-sm mt-1">
                        Students
                    </div>
                </div>

            </div>

        </div>

        {{-- Right --}}
        <div class="relative">

            <div class="absolute inset-0 bg-purple-600 blur-[120px] opacity-20"></div>

            <div class="relative bg-gradient-to-br from-[#1A1128] to-[#0E0717] border border-white/10 rounded-3xl p-8">

                <div class="mb-8">
                    <span class="bg-purple-500/20 text-purple-300 px-4 py-2 rounded-lg text-sm">
                        DATA SCIENCE
                    </span>
                </div>

                <h2 class="text-4xl font-bold mb-4">
                    Global Cyber Shield 2024
                </h2>

                <p class="text-white/60 leading-relaxed mb-10">
                    Forge the ultimate digital defense. Test your skills
                    against global threats in this high-stakes cybersecurity challenge.
                </p>

                <div class="grid grid-cols-3 gap-4">

                    {{-- DAYS --}}
                    <div class="bg-black/20 border border-white/10 rounded-2xl p-5 text-center">

                        <div id="days" class="text-3xl font-bold text-purple-400">
                            00
                        </div>

                        <div class="text-xs text-white/50 mt-1">
                            DAYS
                        </div>

                    </div>

                    {{-- HOURS --}}
                    <div class="bg-black/20 border border-white/10 rounded-2xl p-5 text-center">

                        <div id="hours" class="text-3xl font-bold text-purple-400">
                            00
                        </div>

                        <div class="text-xs text-white/50 mt-1">
                            HRS
                        </div>

                    </div>

                    {{-- MINUTES --}}
                    <div class="bg-black/20 border border-white/10 rounded-2xl p-5 text-center">

                        <div id="minutes" class="text-3xl font-bold text-purple-400">
                            00
                        </div>

                        <div class="text-xs text-white/50 mt-1">
                            MIN
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- FEATURED COMPETITIONS --}}
<section class="max-w-7xl mx-auto px-6 pb-24">

    <div class="flex items-center justify-between mb-12">

        <div>

            <h2 class="text-4xl font-bold mb-3">
                Featured Competitions
            </h2>

            <p class="text-white/50">
                Discover the latest verified competitions.
            </p>

        </div>

        <a href="{{ route('public.competitions.index') }}" class="border border-white/10 hover:border-purple-500 transition px-5 py-3 rounded-xl">
            View All
        </a>

    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($competitions as $competition)

            <x-competition-card :competition="$competition" />

        @endforeach

    </div>

</section>

{{-- CATEGORIES --}}
<section class="max-w-7xl mx-auto px-6 pb-28">

    <h2 class="text-4xl font-bold mb-12">
        Explore Categories
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @foreach($categories as $category)

        <div class="bg-[#12091D] border border-white/10 hover:border-purple-500/30 transition rounded-2xl py-8 px-6 text-center">

            <h3 class="font-semibold text-white">
                {{ $category }}
            </h3>

        </div>

        @endforeach

    </div>

</section>

{{-- HOW IT WORKS --}}
<section class="max-w-7xl mx-auto px-6 pb-28">

    <div class="text-center mb-16">

        <h2 class="text-4xl font-bold mb-4">
            How It Works
        </h2>

        <p class="text-white/50 max-w-2xl mx-auto">
            Find and join competitions in just a few simple steps.
        </p>

    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-[#12091D] border border-white/10 rounded-3xl p-8">

            <div class="w-16 h-16 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 text-5xl font-bold mb-6">
                01
            </div>

            <h3 class="text-2xl font-semibold mb-4">
                Discover Competitions
            </h3>

            <p class="text-white/50">
                Browse hundreds of verified competitions from multiple categories.
            </p>

        </div>

        <div class="bg-[#12091D] border border-white/10 rounded-3xl p-8 hover:border-purple-500/30 transition">

            <div class="text-purple-400 text-5xl font-bold mb-6">
                02
            </div>

            <h3 class="text-2xl font-semibold mb-4">
                Save Your Favorites
            </h3>

            <p class="text-white/50">
                Bookmark competitions and keep track of important deadlines.
            </p>

        </div>

        <div class="bg-[#12091D] border border-white/10 rounded-3xl p-8">

            <div class="text-purple-400 text-5xl font-bold mb-6">
                03
            </div>

            <h3 class="text-2xl font-semibold mb-4">
                Join & Compete
            </h3>

            <p class="text-white/50">
                Participate and showcase your skills on global stages.
            </p>

        </div>

    </div>

</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-6 pb-32">

    <div class="relative overflow-hidden bg-gradient-to-r from-purple-700 to-fuchsia-600 rounded-[40px] p-12 text-center">

        <div class="absolute inset-0 bg-black/10"></div>

        <div class="relative">

            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Join Your Next Competition?
            </h2>

            <p class="text-white/80 max-w-2xl mx-auto mb-10">
                Discover competitions, hackathons, olympiads, and opportunities from one centralized platform.
            </p>

            <a href="{{ route('public.competitions.index') }}" class="bg-black text-white hover:bg-black/80 transition px-8 py-4 rounded-2xl font-semibold">
                Explore Competitions
            </a>

        </div>

    </div>

</section>

@endsection