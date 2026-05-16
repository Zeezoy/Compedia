@extends('layouts.app')

@section('content')
<section class="max-w-2xl mx-auto px-6 py-16">

    <div class="mb-8">
        <a href="{{ route('profile') }}" class="text-white/40 hover:text-purple-400 transition text-sm">
            ← Back to Profile
        </a>
        <h1 class="text-3xl font-bold mt-4">Edit Profile</h1>
    </div>

    <div class="bg-[#1A1128] border border-white/10 rounded-3xl p-8">

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Avatar Upload --}}
            <div class="flex flex-col items-center gap-4 mb-4">

                <div id="avatar-preview">
                    @if($user->avatar_url)
                        <img src="{{ Storage::url($user->avatar_url) }}"
                            id="preview-img"
                            class="w-24 h-24 rounded-full object-cover border-4 border-purple-500">
                    @else
                        <div id="preview-initial"
                            class="w-24 h-24 rounded-full bg-purple-600 flex items-center justify-center text-3xl font-bold border-4 border-purple-500">
                            {{ strtoupper(substr($user->full_name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <label class="cursor-pointer bg-white/5 hover:bg-white/10 border border-white/10 px-5 py-2 rounded-xl text-sm transition">
                    Change Photo
                    <input type="file" name="avatar" accept="image/*" class="hidden" id="avatar-input">
                </label>

            </div>

            {{-- Full Name --}}
            <div>
                <label class="block text-sm text-white/60 mb-2">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}"
                    class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition">
            </div>

            {{-- Username --}}
            <div>
                <label class="block text-sm text-white/60 mb-2">Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                    class="w-full bg-black/30 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-purple-500 transition">
            </div>

            {{-- Email (readonly) --}}
            <div>
                <label class="block text-sm text-white/60 mb-2">Email <span class="text-white/30">(cannot be changed)</span></label>
                <input type="email" value="{{ $user->email }}" disabled
                    class="w-full bg-black/10 border border-white/5 rounded-xl px-4 py-3 text-white/40 cursor-not-allowed">
            </div>

            <button type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 transition py-3 rounded-xl font-semibold">
                Save Changes
            </button>

        </form>
    </div>

</section>

<script>
document.getElementById('avatar-input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        const container = document.getElementById('avatar-preview');
        container.innerHTML = `<img src="${ev.target.result}" class="w-24 h-24 rounded-full object-cover border-4 border-purple-500">`;
    };
    reader.readAsDataURL(file);
});
</script>

@endsection