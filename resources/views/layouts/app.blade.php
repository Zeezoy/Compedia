<!DOCTYPE html>
<html lang="en">
<head>
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

            <div class="text-3xl font-bold">
                Compedia
            </div>

            <div class="hidden md:flex items-center gap-10 text-sm text-white/70">
                <a href="#" class="hover:text-purple-400 transition">Discover</a>
                <a href="#" class="text-purple-400 border-b border-purple-400 pb-1">
                    Competitions
                </a>
                <a href="#" class="hover:text-purple-400 transition">Resources</a>
            </div>

            <button class="bg-purple-600 hover:bg-purple-700 transition px-5 py-2 rounded-xl text-sm font-medium">
                Sign In
            </button>

        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="border-t border-white/10 mt-20">
    <div class="max-w-7xl mx-auto px-6 py-14 flex flex-col md:flex-row items-center justify-between gap-6">

        <div>
            <h2 class="text-2xl font-bold mb-2">Compedia</h2>
            <p class="text-white/40 text-sm">
                © 2026 Compedia Platform. High-Performance Discovery.
            </p>
        </div>

        <div class="flex items-center gap-8 text-sm text-white/50">
            <a href="#" class="hover:text-purple-400 transition">About</a>
            <a href="#" class="hover:text-purple-400 transition">Privacy Policy</a>
            <a href="#" class="hover:text-purple-400 transition">Terms</a>
            <a href="#" class="hover:text-purple-400 transition">Support</a>
        </div>

    </div>
</footer>
</body>
</html>