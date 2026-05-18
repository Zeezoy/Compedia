<nav class="border-b border-white/10 sticky top-0 z-50 backdrop-blur-xl bg-[#16111B] shadow-[0_4px_30px_rgba(0,0,0,0.2)]">
    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <img
                src="{{ asset('images/compedia-logo.svg') }}"
                alt="Compedia Logo"
                class="w-36"
            >
        </a>

        <div class="hidden md:flex items-center gap-10 text-sm text-white/70">
            <a href="/" class="hover:text-purple-400 transition {{ request()->is('/') ? 'text-[#DEB8FF] border-b-2 border-[#DEB8FF] pb-1' : 'hover:text-purple-400 transition' }}">
                Discover
            </a>
            <a href="/competitions" class="{{ request()->is('competitions*') ? 'text-[#DEB8FF] border-b-2 border-[#DEB8FF] pb-1' : 'hover:text-purple-400 transition' }}">
                Competitions
            </a>
        </div>

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