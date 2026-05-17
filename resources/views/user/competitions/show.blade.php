<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $competition->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-[#16111B] text-[#EADFED] min-h-screen font-[Inter]">
<header class="h-[78px] border-b border-white/10 bg-[#16111B] flex items-center px-6 md:px-8 lg:sticky lg:top-0 lg:z-50">
    <div class="w-full flex items-center justify-between">
        <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-[#DEB8FF]" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7 3h10v3h4v2.5A5.5 5.5 0 0 1 15.5 14H15v2h3v2H6v-2h3v-2h-.5A5.5 5.5 0 0 1 3 8.5V6h4V3Zm2 2v5a3 3 0 0 0 6 0V5H9ZM5 8v.5A3.5 3.5 0 0 0 8.5 12h.1A5.4 5.4 0 0 1 7 8V8H5Zm12 0a5.4 5.4 0 0 1-1.6 4h.1A3.5 3.5 0 0 0 19 8.5V8h-2Zm-6 6v2h2v-2h-2Z"/>
            </svg>
            <h1 class="text-3xl font-extrabold text-[#EADFED]">Compedia</h1>
        </div>

        <nav class="hidden md:flex items-center gap-14 text-sm">
            <a href="#" class="text-[#CFC2D6]">Discover</a>
            <a href="{{ route('public.competitions.index') }}" class="text-[#DEB8FF] border-b-2 border-[#DEB8FF] pb-2">Competitions</a>
            <a href="#" class="text-[#CFC2D6]">Resources</a>
        </nav>

        <button class="bg-[#9747FF] px-6 md:px-7 py-3 rounded-xl text-sm font-bold text-[#400071]">
            Sign In
        </button>
    </div>
</header>

<main class="px-6 md:px-8 py-8 md:py-10">
<div class="max-w-[1210px] mx-auto mb-6">
    <a href="{{ route('public.competitions.index') }}"
       class="inline-flex items-center gap-2 text-[#DEB8FF] font-semibold hover:text-[#EADFED] transition">
        ← Back to Competitions
    </a>
</div>
@php
    $daysLeft = max(0, (int) now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($competition->deadline)->startOfDay(), false));
@endphp

<section class="relative max-w-[1210px] mx-auto min-h-[330px] rounded-2xl overflow-hidden border border-white/10 bg-white/[0.03]">
        @if(isset($competition->poster_url))
            <img src="{{ $competition->poster_url }}" class="absolute inset-0 w-full h-full object-cover opacity-35">
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-[#142033] via-[#16111B] to-[#0D0A11]"></div>
        @endif

        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 min-h-[330px] flex flex-col md:flex-row md:items-center justify-between gap-8 px-8 md:px-20 py-10">
            <div>
                <span class="inline-block bg-[#39323D]/70 text-[#EADFED] text-xs font-extrabold px-3 py-1 rounded">
                    {{ strtoupper($competition->category->name) }}
                </span>

                <h2 class="mt-5 text-4xl md:text-5xl font-extrabold text-[#D9D9D9]">
                    {{ $competition->title }}
                </h2>

                <p class="mt-5 max-w-[560px] text-[#CFC2D6] leading-relaxed">
                    {{ $competition['description'] }}
                </p>
            </div>

            <div class="bg-white/[0.05] border border-white/10 rounded-2xl px-8 md:px-10 py-6 md:py-7 text-center w-full md:w-auto">
                <p class="text-xs tracking-[0.2em] font-bold text-[#CFC2D6]">TIME REMAINING</p>
                <div class="mt-3 flex justify-center items-center gap-4 text-[#EADFED]">
                    <div>
                        <p class="text-3xl font-bold">{{ $daysLeft }}</p>
                        <p class="text-xs text-[#CFC2D6]">DAYS</p>
                    </div>
                    <span class="text-3xl text-[#DEB8FF]">:</span>
                    <div>
                        <p class="text-3xl font-bold">08</p>
                        <p class="text-xs text-[#CFC2D6]">HRS</p>
                    </div>
                    <span class="text-3xl text-[#DEB8FF]">:</span>
                    <div>
                        <p class="text-3xl font-bold">45</p>
                        <p class="text-xs text-[#CFC2D6]">MIN</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-[1210px] mx-auto grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-6 mt-12">
        <div class="space-y-6">
            <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-8 md:p-10">
                <h3 class="flex items-center gap-3 text-3xl font-extrabold text-[#DEB8FF] mb-8">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M6 4h9l3 3v13H6V4Z"/>
                        <path d="M14 4v4h4"/>
                    </svg>
                    Overview
                </h3>
                <p class="text-[#EADFED] leading-relaxed">
                    {{ $competition['description'] }}
                </p>
                <p class="text-[#EADFED] leading-relaxed mt-6">
                    This competition is designed for participants to challenge themselves, build strong projects, and showcase their skills through creative problem solving.
                </p>
            </div>

            <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-8 md:p-10">
                <h3 class="flex items-center gap-3 text-3xl font-extrabold text-[#DEB8FF] mb-8">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M12 3v18"/>
                        <path d="M5 7h14"/>
                        <path d="M6 7l-3 6h6L6 7Z"/>
                        <path d="M18 7l-3 6h6l-3-6Z"/>
                    </svg>
                    Rules & Regulations
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($competition['rules'] as $rule)
                        <div class="flex gap-4 text-[#EADFED]">
                            <svg class="w-5 h-5 mt-1 text-[#DEB8FF] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M8 12l3 3 5-6"/>
                            </svg>
                            <p>{{ $rule }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-8 md:p-10">
                <h3 class="flex items-center gap-3 text-3xl font-extrabold text-[#DEB8FF] mb-8">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M4 17l5-5 4 4 7-8"/>
                        <path d="M15 8h5v5"/>
                    </svg>
                    Timeline
                </h3>

                <div class="relative pl-8 space-y-8 border-l border-white/10">
                    <div>
                        <span class="absolute -left-2 w-4 h-4 bg-[#39323D] rounded-full"></span>
                        <h4 class="text-2xl font-extrabold text-[#D9D9D9]">Registration Opens</h4>
                        <p class="text-sm text-[#CFC2D6]">{{ \Carbon\Carbon::parse($competition['registration_open'] ?? now())->format('F d, Y') }}</p>
                    </div>

                    <div>
                        <span class="absolute -left-2 w-4 h-4 bg-[#DEB8FF] rounded-full shadow-[0_0_18px_#DEB8FF]"></span>
                        <h4 class="text-2xl font-extrabold text-[#D9D9D9]">Registration Closes</h4>
                        <p class="text-sm text-[#CFC2D6]">{{ \Carbon\Carbon::parse($competition->deadline)->format('F d, Y') }}</p>
                    </div>

                    <div>
                        <span class="absolute -left-2 w-4 h-4 bg-[#39323D] rounded-full"></span>
                        <h4 class="text-2xl font-extrabold text-[#D9D9D9]">Competition Begins</h4>
                        <p class="text-sm text-[#CFC2D6]">{{ \Carbon\Carbon::parse($competition->deadline)->format('F d, Y') }} · 09:00 AM</p>
                    </div>

                    <div>
                        <span class="absolute -left-2 w-4 h-4 bg-[#39323D] rounded-full"></span>
                        <h4 class="text-2xl font-extrabold text-[#D9D9D9]">Winner Announcement</h4>
                        <p class="text-sm text-[#CFC2D6]">After judging period</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-8 md:p-10">
                <h3 class="flex items-center gap-3 text-3xl font-extrabold text-[#DEB8FF] mb-8">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path d="M4 21h16"/>
                        <path d="M6 21V10"/>
                        <path d="M18 21V10"/>
                        <path d="M3 10l9-6 9 6H3Z"/>
                        <path d="M9 21v-6h6v6"/>
                    </svg>
                    Host Institution
                </h3>

                <div class="flex flex-col md:flex-row gap-8 md:items-center">
                    <div class="w-24 h-24 rounded-xl bg-[#39323D] flex items-center justify-center">
                        <svg class="w-10 h-10 text-[#CFC2D6]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M4 21h16"/>
                            <path d="M6 21V10"/>
                            <path d="M18 21V10"/>
                            <path d="M3 10l9-6 9 6H3Z"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="text-3xl font-extrabold text-[#D9D9D9]">{{ $competition->organizer }}</h4>
                        <p class="mt-2 text-[#EADFED] max-w-[650px]">
                            A leading institution dedicated to supporting innovation, competition, and student achievement.
                        </p>
                        <a href="#" class="inline-block mt-4 text-[#DEB8FF] font-semibold">View Profile →</a>
                    </div>
                </div>
            </div>
        </div>

        <aside class="space-y-6">
            <div class="bg-[#9747FF] rounded-2xl p-8 md:p-10 text-white">
                <h3 class="text-3xl font-extrabold">Secure Your Spot</h3>
                <p class="mt-6 text-[#F3E8FF] leading-relaxed">
                    Join hundreds of participants in this prestigious competition.
                </p>

                <button class="mt-8 w-full bg-[#400071] py-4 rounded-xl font-extrabold">
                    Register for Competition
                </button>

                <a href="{{ $competition['guidebook_url'] ?? '#' }}"
   class="block text-center mt-5 w-full border border-[#DEB8FF]/40 py-4 rounded-xl font-extrabold">
    Download Guidebook
</a>

                <p class="mt-6 text-xs text-center text-[#F3E8FF]">
                    © Official Compedia Certification
                </p>
            </div>

            <div class="bg-white/[0.03] border-l-4 border-[#DEB8FF] border-y border-r border-white/10 rounded-xl p-6">
                <p class="text-sm text-[#CFC2D6]">Registration Fee</p>
                <p class="text-3xl font-extrabold text-[#D9D9D9]">{{ $competition['registration_fee'] ?? 'Free' }}</p>
            </div>

            <div class="bg-white/[0.03] border-l-4 border-[#FACC15] border-y border-r border-white/10 rounded-xl p-6">
                <p class="text-sm text-[#CFC2D6]">Prize Pool</p>
                <p class="text-3xl font-extrabold text-[#DEB8FF]">
                    Rp{{ number_format($competition['prizes'][0]['amount'] ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <div class="bg-white/[0.03] border-l-4 border-[#CFC2D6] border-y border-r border-white/10 rounded-xl p-6">
                <p class="text-sm text-[#CFC2D6]">Deadline</p>
                <p class="text-3xl font-extrabold text-[#D9D9D9]">
                    {{ \Carbon\Carbon::parse($competition->deadline)->format('M d, Y') }}
                </p>
            </div>
        </aside>
    </section>
</main>

<footer class="bg-[#100B14] border-t border-white/10 px-6 md:px-8 py-8 flex flex-col md:flex-row justify-between gap-6 text-sm text-[#CFC2D6]">
    <div>
        <h3 class="font-bold text-[#EADFED]">Compedia</h3>
        <p>© 2024 Compedia Platform. High-Performance Discovery.</p>
    </div>

    <div class="flex gap-8 flex-wrap">
        <a href="#">About</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Contact Support</a>
    </div>
</footer>

</body>
</html>