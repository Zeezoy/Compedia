@extends('layouts.admin')
@section('content')

<div class="flex justify-between">
    <h1 class="text-3xl font-semibold text-[#DEB8FF]">New Competitions</h1>
    <x-button href="">    
        Publish
    </x-button>
</div>
<div class="flex gap-6 items-start">
    <div class="flex-1 space-y-6">
        <x-card-section title="Overview & Description">
            <div class="space-y-5">
                <x-dropdown-filter
                    placeholder="Categories"
                    :options="[
                        'Web Dev',
                        'Mobile Dev',
                        'UI/UX',
                        'Data Science',
                        'Cyber Security'
                    ]"
                />
                <x-input
                    label="Competition Title"
                    name="title"
                    :value="$competition['title'] ?? ''"
                    placeholder="e.g. Hology 8.0"
                />
                <x-input
                    label="Organizer"
                    name="organizer"
                    :value="$competition['organizer'] ?? ''"
                    placeholder="e.g. FILKOM UB"
                />
                <x-textarea
                    label="Full Description"
                    name="description"
                    :value="$competition['description'] ?? ''"
                    placeholder="Detail the challenge, goals, and technical requirements..."
                />
            </div>
        </x-card-section>

        <x-card-section title="Rules & Regulations" action="+ Add Rule" actionId="add-rule-btn">
            <div id="rules-container" class="space-y-3">
                @foreach($competition['rules'] ?? [] as $index => $rule)    
                    <div class="bg-[#1E2021] rounded-lg border border-white/20 focus:border-[#9747FF] p-4 flex gap-4 rule-item">
                        <span class="text-white rule-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <textarea
                            name="rules[]"
                            placeholder="Write competition rule..."
                            class="
                                w-full
                                bg-[#1E2021]
                                text-white
                                outline-none
                                resize-y
                            "
                        >{{ $rule }}</textarea>
                    </div>
                @endforeach
            </div>
        </x-card-section>

        <x-card-section title="Timeline Builder" action="+ Add Stage" actionId="add-stage-btn">
            <div id="timeline-container" class="space-y-6">
                <x-timeline-stage
                    title="Registration Open"
                    startDate="10/01/2024"
                    endDate="10/30/2024"
                />
            </div>
        </x-card-section>
    </div>

    {{-- RIGHT --}}
    <div class="w-[320px] space-y-6 sticky top-6">
        <x-card-section title="Branding">
            <div class="space-y-5">
                <input
                    type="file"
                    id="competition-image"
                    accept="image/*"
                    class="hidden"
                >
                <label
                    for="competition-image"
                    class="
                        h-36
                        rounded-xl
                        border border-dashed border-white/10
                        bg-[#18191D]
                        flex items-center justify-center
                        cursor-pointer
                        overflow-hidden
                        relative
                    "
                >
                    <img
                        id="image-preview"
                        class="hidden absolute inset-0 w-full h-full object-cover"
                    >
                    <p
                        id="upload-placeholder"
                        class="text-sm text-white/40"
                    >
                        Upload Image
                    </p>
                </label>
            </div>
        </x-card-section>

        <x-card-section title="Prize Pool" action="+ Add Prize" actionId="add-prize-btn">
            <div id="prize-container" class="space-y-3">
                @foreach($competition['prizes'] ?? [] as $prize)
                    <div class="flex gap-3 prize-item">
                        <input
                            type="text"
                            name="prize_title[]"
                            value="{{ $prize['title'] }}"
                            placeholder="1st"
                            class="
                                w-20
                                bg-[#1E2021]
                                border border-white/20
                                rounded-lg
                                p-4
                                text-white
                                outline-none
                                focus:border-[#9747FF]
                            "
                        >
                        <input
                            type="number"
                            name="prize_amount[]"
                            placeholder="Amount (Rp)"
                            value="{{ $prize['amount'] }}"
                            class="
                                w-40
                                bg-[#1E2021]
                                border border-white/20
                                rounded-lg
                                p-4
                                text-white
                                outline-none
                                focus:border-[#9747FF]
                            "
                        >
                    </div>
                @endforeach
            </div>
        </x-card-section>

        <x-card-section title="Registration Details">
            <div class="grid grid-cols-1 gap-5">
                <x-input
                    label="Registration Link"
                    name="registration_link"
                    type="url"
                    placeholder="https://..."
                />
                <x-input
                    label="Guidebook Link"
                    name="guidebook_link"
                    type="url"
                    placeholder="https://..."
                />
                <x-input
                    label="Registration Fee (Rp)"
                    name="registration_fee"
                    type="number"
                    placeholder="50000"
                />
            </div>
        </x-card-section>

        <x-card-section title="Settings">
            <div class="space-y-5">
                <x-toggle
                    label="Public Visibility"
                    name="is_public"
                    checked="true"
                />
            </div>
        </x-card-section>
    </div>
</div>

<template id="rule-template">
    <div class="bg-[#1E2021] rounded-lg border border-white/20 focus:border-[#9747FF] p-4 flex gap-4 rule-item">
        <span class="text-white rule-number">
            0
        </span>

        <textarea
            name="rules[]"
            placeholder="Write competition rule..."
            class="
                w-full
                bg-[#1E2021]
                text-white
                outline-none
                resize-y
            "
        ></textarea>
    </div>
</template>

<template id="prize-template">
    <div class="flex gap-3 prize-item">
        <input
            type="text"
            name="prize_title[]"
            placeholder="1st"
            class="
                w-20
                bg-[#1E2021]
                border border-white/20
                rounded-lg
                p-4
                text-white
                outline-none
                focus:border-[#9747FF]"
        >
        <input
            type="number"
            name="prize_amount[]"
            placeholder="Amount (Rp)"
            class="
                w-40
                bg-[#1E2021]
                border border-white/20
                rounded-lg
                p-4
                text-white
                outline-none
                focus:border-[#9747FF]"
        >
    </div>
</template>

<template id="timeline-template">
    <div class="timeline-item">
        <x-timeline-stage
            title="Submission Deadline"
            startDate=""
            endDate=""
        />
    </div>
</template>

@endsection