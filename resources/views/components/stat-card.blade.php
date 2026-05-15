<div class="bg-[#18181B] border border-white/10 rounded-xl p-6 w-[300px] h-44">
    <div class="flex flex-col justify-between gap-1">
        <div class="flex justify-between">
            <h1 class="uppercase font-medium text-[#D9D9D9]">
                {{ $title }}
            </h1>
            <div class="text-[#9747FF]">
                {{ $slot }}
            </div>
        </div>
        <h2 class="text-5xl font-semibold text-[#D9D9D9]">
            {{ $value }}
        </h2>
        <p class="text-[#9747FF] font-extralight mt-2">
            {{ $growth }}
        </p>
    </div>
</div>