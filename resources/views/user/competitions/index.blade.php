<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Competitions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-[#16111B] text-[#EADFED] min-h-screen font-[Inter]">
<header class="h-[78px] border-b border-white/10 bg-[#16111B] flex items-center px-6 md:px-8 lg:sticky lg:top-0 lg:z-50">
    <div class="w-full flex items-center justify-between">
        <a href="/" class="flex items-center gap-3">
            <svg class="w-6 h-6 text-[#DEB8FF]" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7 3h10v3h4v2.5A5.5 5.5 0 0 1 15.5 14H15v2h3v2H6v-2h3v-2h-.5A5.5 5.5 0 0 1 3 8.5V6h4V3Zm2 2v5a3 3 0 0 0 6 0V5H9ZM5 8v.5A3.5 3.5 0 0 0 8.5 12h.1A5.4 5.4 0 0 1 7 8V8H5Zm12 0a5.4 5.4 0 0 1-1.6 4h.1A3.5 3.5 0 0 0 19 8.5V8h-2Zm-6 6v2h2v-2h-2Z"/>
            </svg>
            <h1 class="text-3xl font-extrabold text-[#EADFED]">Compedia</h1>
        </a>

        <nav class="hidden md:flex items-center gap-14 text-sm">
            <a href="/" class="text-[#CFC2D6]">Discover</a>
            <a href="{{ route('public.competitions.index') }}" class="text-[#DEB8FF] border-b-2 border-[#DEB8FF] pb-2">Competitions</a>
        </nav>

    @auth
    <div class="flex items-center gap-4">
        <a href="{{ route('profile') }}" class="w-11 h-11 rounded-full overflow-hidden bg-[#9747FF] flex items-center justify-center">
            @if(Auth::user()->avatar_url)
                <img 
                    src="{{ Storage::url(Auth::user()->avatar_url) }}" 
                    alt="Profile"
                    class="w-full h-full object-cover"
                >
            @else
                <span class="text-white font-extrabold">
                    {{ strtoupper(substr(Auth::user()->full_name ?? Auth::user()->name ?? 'U', 0, 1)) }}
                </span>
            @endif
        </a>

        <span class="hidden md:block text-[#CFC2D6]">
            {{ Auth::user()->username ?? Auth::user()->full_name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-[#CFC2D6] hover:text-[#EADFED]">
                Logout
            </button>
        </form>
    </div>
@endauth

@guest
    <a href="{{ route('login') }}" class="bg-[#9747FF] px-6 md:px-7 py-3 rounded-xl text-sm font-bold text-[#400071]">
        Sign In
    </a>
@endguest
    </div>
</header>

<main class="flex flex-col lg:flex-row">    <aside class="w-full lg:w-[320px] bg-[#1F1A23] border-r border-white/10 px-6 py-8 shrink-0 lg:sticky lg:top-[78px] lg:h-[calc(100vh-78px)] lg:overflow-y-auto">
        <form method="GET">
            <div class="relative mb-10">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#CFC2D6]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="M20 20l-3.5-3.5"></path>
                    </svg>
                </span>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search competitions..."
                    class="w-full bg-[#16111B] border border-[#424354] rounded-lg pl-12 pr-4 py-3 text-sm text-[#EADFED] placeholder:text-[#CFC2D6]/70 outline-none"
                >
            </div>

            <p class="text-xs font-bold tracking-[0.2em] text-[#CFC2D6] mb-4">CATEGORY</p>

            @php
                $fixedCategories = [
                    'Competitive Programming',
                    'UI/UX Design',
                    'Software Development',
                    'Game Development',
                    'Business Case',
                    'Data Science',
                    'IoT',
                    'Hackathon'
                ];

                $selectedCategories = request('categories', []);
                if (!is_array($selectedCategories)) {
                    $selectedCategories = [$selectedCategories];
                }
            @endphp

            <div class="space-y-4">
                @foreach ($fixedCategories as $category)
                    <label class="flex items-center gap-3 cursor-pointer text-[#EADFED]">
                        <input
                            type="checkbox"
                            name="categories[]"
                            value="{{ $category }}"
                            onchange="this.form.submit()"
                            class="peer hidden"
                            {{ in_array($category, $selectedCategories) ? 'checked' : '' }}
                        >
                        <span class="w-5 h-5 rounded border border-[#424354] bg-transparent peer-checked:bg-[#B76DFF] peer-checked:border-[#B76DFF] flex items-center justify-center">
                            @if(in_array($category, $selectedCategories))
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                                    <path d="M5 13l4 4L19 7"></path>
                                </svg>
    @endif
</span>
                        </span>
                        <span>{{ $category }}</span>
                    </label>
                @endforeach
            </div>

        <div class="mt-12">
    <p class="text-xs font-bold tracking-[0.2em] text-[#CFC2D6] mb-4">PRIZE RANGE</p>

    <input
        type="range"
        min="0"
        max="1000000"
        step="50000"
        value="{{ request('prize', 0) }}"
        name="prize"
        onchange="this.form.submit()"
        oninput="document.getElementById('prizeValue').innerText = 'Rp' + Number(this.value).toLocaleString('id-ID')"
        class="w-full accent-[#B76DFF] cursor-pointer"
    >

    <div class="flex justify-between text-xs text-[#CFC2D6] mt-2">
        <span>Rp0</span>
        <span>Rp1.000.000+</span>
    </div>

    <p class="mt-3 text-sm text-[#EADFED]">
        Selected:
        <span id="prizeValue" class="font-bold text-[#DEB8FF]">
            Rp{{ number_format(request('prize', 0), 0, ',', '.') }}
        </span>
    </p>
</div>
        </form>
    </aside>

<section class="flex-1 px-6 md:px-10 lg:px-12 py-8 md:py-10 bg-[#16111B]">
        <div class="w-full max-w-none">
            <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-[#EADFED]">
                Explore Competitions
            </h2>

            <p class="mt-4 max-w-[780px] text-[#CFC2D6] text-base md:text-lg leading-relaxed">
                Discover your next challenge. From global hackathons to academic olympiads, find the stage to showcase your excellence.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
                @foreach ($competitions as $competition)
                    @php
                        $daysLeft = max(0, (int) now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($competition->deadline)->startOfDay(), false));
                        $isNearDeadline = $daysLeft <= 14;
                        $daysColor = $isNearDeadline ? 'text-[#FFBABA]' : 'text-[#CFC2D6]';
                    @endphp

                    <article class="bg-white/[0.03] border border-white/10 rounded-xl overflow-hidden min-h-[430px] flex flex-col">
                        <div class="relative h-[190px] bg-[#39323D]">
                            @if(isset($competition->poster_url))
                                <img src="{{ $competition->poster_url }}" class="w-full h-full object-cover" alt="{{ $competition->title }}">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#391433] via-[#84301A] to-[#F97316]"></div>
                            @endif

                            <span class="absolute top-3 right-3 bg-[#39323D]/60 text-[#EADFED] text-[11px] font-extrabold tracking-wide px-3 py-1 rounded">
                                {{ strtoupper($competition->category->name) }}
                            </span>
                        </div>

                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex justify-between gap-4">
                                <div class="pr-4">
                                    <h3 class="text-2xl md:text-3xl font-extrabold leading-tight text-[#D9D9D9]">
                                        {{ $competition->title }}
                                    </h3>
                                    <p class="mt-2 text-[#CFC2D6]">
                                        {{ $competition->organizer }}
                                    </p>
                                </div>

                                <p class="text-sm w-[76px] shrink-0 {{ $daysColor }}">
                                    ⏱ {{ $daysLeft }} Days<br>Left
                                </p>
                            </div>

                            <div class="mt-auto flex items-end justify-between gap-4 pt-10">
                                <div>
                                    <p class="text-[11px] tracking-[0.18em] font-bold text-[#CFC2D6]">PRIZE POOL</p>
                                    <p class="text-[#DEB8FF]">
                                        {{ $competition->prize }}
                                    </p>
                                </div>

                                <a href="{{ route('public.competitions.show', $competition->id) }}"
                                   class="bg-[#9747FF] hover:bg-[#8b35ff] transition w-[190px] text-center py-3 rounded-lg font-extrabold text-[#400071]">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($competitions->hasPages())
    <div class="flex justify-center items-center gap-3 mt-12">
        @if ($competitions->onFirstPage())
            <span class="w-10 h-10 border border-[#424354] rounded-lg flex items-center justify-center opacity-40">‹</span>
        @else
            <a href="{{ $competitions->previousPageUrl() }}" class="w-10 h-10 border border-[#424354] rounded-lg flex items-center justify-center">‹</a>
        @endif

        @foreach ($competitions->getUrlRange(1, $competitions->lastPage()) as $page => $url)
            <a href="{{ $url }}"
               class="w-10 h-10 rounded-lg flex items-center justify-center {{ $page == $competitions->currentPage() ? 'bg-[#B76DFF] text-[#400071] font-bold' : 'border border-[#424354]' }}">
                {{ $page }}
            </a>
        @endforeach

        @if ($competitions->hasMorePages())
            <a href="{{ $competitions->nextPageUrl() }}" class="w-10 h-10 border border-[#424354] rounded-lg flex items-center justify-center">›</a>
        @else
            <span class="w-10 h-10 border border-[#424354] rounded-lg flex items-center justify-center opacity-40">›</span>
        @endif
    </div>
@endif
        </div>
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