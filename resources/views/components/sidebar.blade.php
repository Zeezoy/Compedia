<aside class="flex flex-col w-80 min-h-screen bg-[#1E2021] text-white px-3 pt-8 pb-12">
    <div class="flex items-center justify-center mb-12">
        <img
            src="{{ asset('images/compedia-logo.svg') }}"
            alt="Compedia Logo"
        >
    </div>

    <nav class="space-y-2">
        <a
            href="{{ route('admin.dashboard') }}"
            class="
                flex items-center gap-8 px-12 h-12 rounded-xl transition
                {{
                    request()->routeIs('admin.dashboard')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-layout class="w-6 h-6"/>
            <span class="font-medium text-xl">
                Dashboard
            </span>
        </a>

        <a
            href="{{ route('competitions.index') }}"
            class="
                flex items-center gap-8 px-12 h-12 rounded-xl transition
                {{
                    request()->routeIs('competitions.*')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-bullseye class="w-6 h-6"/>
            <span class="font-medium text-xl">
                Competitions
            </span>
        </a>

        <a
            href="#"
            class="
                flex items-center gap-8 px-12 h-12 rounded-xl transition
                {{
                    request()->routeIs('users.*')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-user-check class="w-6 h-6"/>
            <span class="font-medium text-xl">
                Users
            </span>
        </a>

        <a
            href="#"
            class="
                flex items-center gap-8 px-12 h-12 rounded-xl transition
                {{
                    request()->routeIs('settings.*')
                    ? 'bg-[#343637] text-[#DEB8FF]'
                    : 'text-white hover:bg-white/5'
                }}
            "
        >
            <x-bx-cog class="w-6 h-6"/>
            <span class="font-medium text-xl">
                Settings
            </span>
        </a>
    </nav>

    <div class="mt-auto">
        <button
            class="
                w-full flex items-center gap-8
                text-white hover:bg-white/5
                px-12 h-12 rounded-xl transition
            "
        >
            <x-bx-log-out class="w-6 h-6"/>
            <span class="font-medium text-xl">
                Logout
            </span>
        </button>
    </div>
</aside>