@props(['title' => '', 'startDate' => '', 'endDate' => ''])

<div class="flex gap-4">
    <div class="flex flex-col items-center">
        <div class="w-3 h-3 rounded-full bg-[#DEB8FF]"></div>
        <div class="w-[1px] flex-1 bg-white/10"></div>
    </div>

    <div class="flex-1 bg-[#1E2021] rounded-xl p-4">
        <div class="grid grid-cols-2 gap-4">
            <x-input
                label="Stage Title"
                name="stage_title[]"
                placeholder="Registration 1"
                :value="$title"
            />
            <x-input
                label="Start Date"
                name="stage_start[]"
                type="date"
                :value="$startDate ? \Carbon\Carbon::parse($startDate)->format('Y-m-d') : ''"
            />
        </div>

        <div class="mt-4">
            <x-input
                label="End Date"
                name="stage_end[]"
                type="date"
                :value="$endDate ? \Carbon\Carbon::parse($endDate)->format('Y-m-d') : ''"
            />
        </div>
    </div>
</div>