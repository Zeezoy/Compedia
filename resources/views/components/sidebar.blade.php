<aside
    class="
        fixed md:static
        top-0 left-0 z-50
        w-64 lg:w-80
        min-h-screen
        bg-[#1E2021]
        text-white
        px-3 pt-8 pb-12
        flex flex-col
        transform transition-transform duration-300
        md:translate-x-0
        shrink-0
    "
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    <div class="flex items-center md:justify-center justify-between mb-12 px-4">
        <a href="{{ route('home') }}">
            <img
                src="{{ asset('images/compedia-logo.svg') }}"
                alt="Compedia Logo"
                class="w-36"
            >
        </a>

        <button
            class="md:hidden text-white text-2xl"
            @click="sidebarOpen = false"
        >
            ✕
        </button>
    </div>

    <nav class="space-y-2">
        <a
            href="{{ route('admin.dashboard') }}"
            class="
                flex items-center gap-4 lg:gap-8
                px-4 lg:px-12
                h-12 rounded-xl transition
                {{
                    request()->routeIs('admin.dashboard')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-layout class="w-6 h-6"/>

            <span class="font-medium text-base lg:text-xl">
                Dashboard
            </span>
        </a>

        <a
            href="{{ route('competitions.index') }}"
            class="
                flex items-center gap-4 lg:gap-8
                px-4 lg:px-12
                h-12 rounded-xl transition
                {{
                    request()->routeIs('competitions.*')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-bullseye class="w-6 h-6"/>

            <span class="font-medium text-base lg:text-xl">
                Competitions
            </span>
        </a>
    </nav>

    <div class="mt-auto">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                class="
                    w-full flex items-center gap-4 lg:gap-8
                    text-white hover:bg-white/5
                    px-4 lg:px-12
                    h-12 rounded-xl transition
                "
            >
                <x-bx-log-out class="w-6 h-6"/>

                <span class="font-medium text-base lg:text-xl">
                    Logout
                </span>
            </button>
        </form>
    </div>
</aside>