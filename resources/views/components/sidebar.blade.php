<aside class="flex flex-col w-80 min-h-screen bg-[#1E2021] text-white px-3 pt-8 pb-12">
    <div class="flex items-center justify-center px-auto mb-12">
        <img src="{{ asset('images/compedia-logo.svg') }}" alt="Compedia Logo">
    </div>
    <div>
        {{-- Menu --}}
        <nav class="space-y-2">
            <a href="/admin" class="flex items-center gap-8 bg-[#343637] text-[#DEB8FF] px-12 rounded-xl h-12">
                <x-bx-layout class="w-6 h-6"/>
                <span class="font-medium text-xl">Dashboard</span>
            </a>
            <a href="/admin/competitions" class="flex items-center gap-8 text-white hover:bg-white/5 px-12 h-12 rounded-xl transition">
                <x-bx-bullseye class="w-6 h-6"/>
                <span class="font-medium text-xl">Competitions</span>
            </a>
            <a href="#" class="flex items-center gap-8 text-white hover:bg-white/5 px-12 h-12 rounded-xl transition">
                <x-bx-user-check class="w-6 h-6"/>
                <span class="font-medium text-xl">Users</span>
            </a>
            <a href="#" class="flex items-center gap-8 text-white hover:bg-white/5 px-12 h-12 rounded-xl transition">
                <x-bx-cog class="w-6 h-6"/>
                <span class="font-medium text-xl">Settings</span>
            </a>
        </nav>
    </div >
        
    <div class="flex bottom-0 mt-auto">
        <button class="w-full flex items-center gap-8 text-white hover:bg-white/5 px-12 h-12 rounded-xl transition">
            <x-bx-log-out class="w-6 h-6"/>
            <span class="font-medium text-xl">Logout</span>
        </button>
    </div>
</aside>