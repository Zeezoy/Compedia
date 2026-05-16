@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center px-6 py-20">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Welcome Back</h1>
            <p class="text-white/50">Sign in to your Compedia account</p>
        </div>

        <div class="bg-[#1A1128] border border-white/10 rounded-3xl p-8">

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-5">
                @csrf

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
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 transition py-3 rounded-xl font-semibold mt-2">
                    Sign In
                </button>

            </form>

            <p class="text-center text-white/50 text-sm mt-6">
                Don't have an account?
                <a href="/register" class="text-purple-400 hover:underline">Register</a>
            </p>

        </div>
    </div>

</section>
@endsection