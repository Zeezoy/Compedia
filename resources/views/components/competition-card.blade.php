<div class="bg-[#12091D] border border-white/10 rounded-3xl overflow-hidden hover:border-purple-500/40 hover:shadow-[0_0_30px_rgba(168,85,247,0.15)] transition duration-300 hover:-translate-y-1 h-full">

    <div class="h-44 bg-gradient-to-br from-purple-700 to-black }}"></div>

    <div class="p-6 flex flex-col gap-5">

        <div class="flex items-center justify-between">

            <span class="bg-purple-500/20 text-purple-300 text-xs px-3 py-2 rounded-lg">
                {{ $competition->category->name }}
            </span>

            <span class="text-white/50 text-sm">
                {{ $competition->days_left }} Days Left
            </span>

        </div>

        <h3 class="text-3xl font-bold leading-tight min-h-[96px]">
            {{ $competition->title }}
        </h3>

        <p class="text-white/50 min-h-[32px]">
            {{ $competition->organizer }}
        </p>

        <div class="flex items-center justify-between mt-8">

            <div>
                <div class="text-white/40 text-xs mb-1">
                    PRIZE POOL
                </div>

                <div class="text-2xl font-bold">
                    {{ $competition->prize }}
                </div>
            </div>

            <button class="bg-purple-600 hover:bg-purple-700 transition px-5 py-3 rounded-xl text-sm font-medium">
                View Details
            </button>

        </div>

    </div>

</div>