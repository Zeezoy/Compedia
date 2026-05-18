@extends('layouts.app')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-8 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Profile Header --}}
    <div class="bg-[#1A1128] border border-white/10 rounded-3xl p-8 mb-6">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">

            {{-- Avatar --}}
            <div class="relative">
                @if($user->avatar_url)
                    <img src="{{ Storage::url($user->avatar_url) }}"
                        class="w-28 h-28 rounded-full object-cover border-4 border-purple-500">
                @else
                    <div class="w-28 h-28 rounded-full bg-purple-600 flex items-center justify-center text-4xl font-bold border-4 border-purple-500">
                        {{ strtoupper(substr($user->full_name, 0, 1)) }}
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-3xl font-bold mb-1">{{ $user->full_name }}</h1>
                <p class="text-purple-400 mb-1">{{ $user->username }}</p>
                <p class="text-white/50 text-sm mb-6">{{ $user->email }}</p>

                <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                    <a href="{{ route('profile.edit') }}"
                        class="bg-purple-600 hover:bg-purple-700 transition px-6 py-2 rounded-xl text-sm font-medium">
                        Edit Profile
                    </a>
                    @if ($user->role === 'admin')
                        <a href ='{{ route('admin.dashboard') }}' class="border border-white/10 px-6 py-2 rounded-xl text-sm text-white/50 capitalize">
                            {{ $user->role }}
                        </a>
                    @else
                        <a class="border border-white/10 px-6 py-2 rounded-xl text-sm text-white/50 capitalize">
                            {{ $user->role }}
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-[#1A1128] border border-white/10 rounded-2xl p-6 text-center">
            <div class="text-3xl font-bold text-purple-400 mb-1">0</div>
            <div class="text-white/50 text-sm">Competitions Joined</div>
        </div>

        <div class="bg-[#1A1128] border border-white/10 rounded-2xl p-6 text-center">
            <div class="text-3xl font-bold text-purple-400 mb-1">0</div>
            <div class="text-white/50 text-sm">Bookmarks</div>
        </div>

        <div class="bg-[#1A1128] border border-white/10 rounded-2xl p-6 text-center">
            <div class="text-3xl font-bold text-purple-400 mb-1">
                {{ $user->created_at->diffForHumans() }}
            </div>
            <div class="text-white/50 text-sm">Member Since</div>
        </div>

    </div>

    {{-- Account Info --}}
    <div class="bg-[#1A1128] border border-white/10 rounded-3xl p-8">
        <h2 class="text-lg font-semibold mb-6 text-white/80">Account Information</h2>

        <div class="space-y-4">

            <div class="flex items-center justify-between py-4 border-b border-white/5">
                <span class="text-white/50 text-sm">Full Name</span>
                <span class="text-white font-medium">{{ $user->full_name }}</span>
            </div>

            <div class="flex items-center justify-between py-4 border-b border-white/5">
                <span class="text-white/50 text-sm">Username</span>
                <span class="text-purple-400 font-medium">{{ $user->username }}</span>
            </div>

            <div class="flex items-center justify-between py-4 border-b border-white/5">
                <span class="text-white/50 text-sm">Email</span>
                <span class="text-white font-medium">{{ $user->email }}</span>
            </div>

            <div class="flex items-center justify-between py-4">
                <span class="text-white/50 text-sm">Role</span>
                <span class="bg-purple-500/20 text-purple-300 px-3 py-1 rounded-lg text-sm capitalize">
                    {{ $user->role }}
                </span>
            </div>

        </div>
    </div>

</section>
@endsection