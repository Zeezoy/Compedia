<!DOCTYPE html>
<html>
<head>
    <title>Compedia Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#121415] font-sans">
    <div class="flex">
        <x-sidebar></x-sidebar>
        <main class="flex flex-col px-16 py-8 overflow-y-auto gap-12 w-full">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-semibold text-[#DEB8FF]">
                    @yield('title')
                </h1>
                <div class="flex items-center gap-5">
                    <div class="relative">
                        <form method="GET" action="{{ url('/admin/competitions') }}">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search competition . . ."
                                class="bg-transparent border border-white/10 rounded-xl px-4 py-2 text-sm outline-none focus:border-[#A855F7] text-white placeholder:text-white/50"
                            >
                        </form>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white"></div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>