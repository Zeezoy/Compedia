@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center px-6 py-20">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Create Account</h1>
            <p class="text-white/50">Join Compedia and never miss a competition</p>
        </div>

        <div class="bg-[#1A1128] border border-white/10 rounded-3xl p-8">

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-white/60 mb-2">Full Name</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}"
                        class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition"
                        placeholder="Your full name">
                </div>

                <div>
                    <label class="block text-sm text-white/60 mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}"
                        class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition"
                        placeholder="yourusername">
                </div>

                <div>
                    <label class="block text-sm text-white/60 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition"
                        placeholder="you@example.com">
                </div>

                <div>
                    <label class="block text-sm text-white/60 mb-2">Password</label>
                    <input type="password" name="password"
                        class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition"
                        placeholder="Min. 6 characters">
                </div>

                <div>
                    <label class="block text-sm text-white/60 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition"
                        placeholder="Repeat password">
                </div>

                <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 transition py-3 rounded-xl font-semibold mt-2">
                    Create Account
                </button>

            </form>

            <p class="text-center text-white/50 text-sm mt-6">
                Already have an account?
                <a href="/login" class="text-purple-400 hover:underline">Sign In</a>
            </p>

        </div>
    </div>

</section>
@endsection