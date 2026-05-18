<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compedia Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    x-data="{ sidebarOpen: false }"
    class="bg-[#121415] font-sans"
>
    <div class="flex min-h-screen">
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            class="fixed inset-0 bg-black/50 z-40 md:hidden"
            @click="sidebarOpen = false"
        ></div>
        <x-sidebar />

        <main
            class="
                flex-1 flex flex-col
                px-4 md:px-8 lg:px-16
                py-6 md:py-8
                gap-8 md:gap-12
                overflow-x-hidden
                w-full
            "
        >

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <button
                        class="md:hidden text-white"
                        @click="sidebarOpen = true"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>
                    <h1 class="text-2xl md:text-3xl font-semibold text-[#DEB8FF]">
                        @yield('title')
                    </h1>
                </div>

                <div class="flex items-center gap-3 md:gap-5">
                    <div class="relative w-full md:w-auto">
                        <form method="GET" action="{{ url('/admin/competitions') }}">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search competition..."
                                class="
                                    w-full md:w-72
                                    bg-transparent
                                    border border-white/10
                                    rounded-xl
                                    px-4 py-2
                                    text-sm
                                    outline-none
                                    focus:border-[#A855F7]
                                    text-white
                                    placeholder:text-white/50
                                "
                            >
                        </form>
                    </div>

                    <div class="w-10 h-10 rounded-full bg-white shrink-0"></div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>