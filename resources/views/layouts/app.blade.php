<!DOCTYPE html>
<html lang="en">
<head>
    @php
        use Illuminate\Support\Facades\Storage;
        use Illuminate\Support\Facades\Auth;
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compedia</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-[#07010F] text-white font-[Inter] min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="border-b border-white/10 sticky top-0 z-50 backdrop-blur-xl bg-[#07010F]/90 shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2">
                <span class="text-purple-400 text-xl drop-shadow-[0_0_8px_rgba(168,85,247,0.8)]">🏆</span>

                <span class="text-xl font-bold">
                    Compedia
                </span>
            </a>

            {{-- Menu --}}
            <div class="hidden md:flex items-center gap-10 text-sm text-white/70">
                <a href="/" class="hover:text-purple-400 transition {{ request()->is('/') ? 'text-purple-400' : '' }}">
                    Discover
                </a>
                <a href="/competitions" class="{{ request()->is('competitions*') ? 'text-purple-400 border-b border-purple-400 pb-1' : 'hover:text-purple-400 transition' }}">
                    Competitions
                </a>

            </div>

            {{-- Navbar Right --}}
            @auth
                <div class="flex items-center gap-4">

                    <a href="{{ route('profile') }}"
                        class="flex items-center gap-3 hover:opacity-80 transition">

                        @if(Auth::user()->avatar_url)
                            <img
                                src="{{ Storage::url(Auth::user()->avatar_url) }}"
                                class="w-9 h-9 rounded-full object-cover border border-purple-500"
                            >
                        @else
                            <div class="w-9 h-9 rounded-full bg-purple-600 flex items-center justify-center text-sm font-bold">
                                {{ strtoupper(substr(Auth::user()->full_name, 0, 1)) }}
                            </div>
                        @endif

                        <span class="text-sm text-white/70">
                            {{ Auth::user()->username }}
                        </span>

                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            class="text-sm text-white/40 hover:text-red-400 transition">
                            Logout
                        </button>
                    </form>

                </div>
            @else

                <a href="{{ route('login') }}"
                    class="bg-purple-600 hover:bg-purple-700 transition px-5 py-2 rounded-xl text-sm font-medium">
                    Sign In
                </a>

            @endauth

        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-white/10 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-14 flex flex-col md:flex-row items-center justify-between gap-6">

            <div>
                <h2 class="text-2xl font-bold mb-2">
                    Compedia
                </h2>

                <p class="text-white/40 text-sm">
                    © 2026 Compedia Platform. High-Performance Discovery.
                </p>
            </div>

            <div class="flex items-center gap-8 text-sm text-white/50">

                <a href="#" class="hover:text-purple-400 transition">
                    About
                </a>

                <a href="#" class="hover:text-purple-400 transition">
                    Privacy Policy
                </a>

                <a href="#" class="hover:text-purple-400 transition">
                    Terms
                </a>

                <a href="#" class="hover:text-purple-400 transition">
                    Support
                </a>

            </div>

        </div>
    </footer>

</body>
</html>