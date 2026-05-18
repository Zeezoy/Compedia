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

<x-navbar/>

<main class="flex flex-col lg:flex-row">    
    <aside class="w-full lg:w-[320px] bg-[#1F1A23] border-r border-white/10 px-6 py-8 shrink-0 lg:sticky lg:top-[78px] lg:h-[calc(100vh-78px)] lg:overflow-y-auto">
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
                            @if(isset($competition->photo_url))
                                <img src="{{
                                    Str::startsWith($competition->photo_url, ['http://', 'https://'])
                                        ? $competition->photo_url
                                        : asset('storage/' . $competition->photo_url)
                                }}" class="w-full h-full object-cover" alt="{{ $competition->title }}">
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
                                        Rp {{ number_format($competition->prizes->sum('amount'), 0, ',', '.') }}
                                    </p>
                                </div>

                                <x-button onclick="window.location.href='/competitions/{{ $competition->id }}'">
                                    View Details
                                </x-button>
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

<x-footer/>

</body>
</html>