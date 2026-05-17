<div class="flex flex-col xl:flex-row gap-6 items-start">
    <div class="flex-1 w-full space-y-6">
        <x-card-section title="Overview & Description">
            <div class="space-y-5">
                <x-dropdown-filter
                    placeholder="Categories"
                    name="category_id"
                    :options="$categories->pluck('name', 'id')"
                    :selected="old('category_id', $competition->category_id ?? '')"
                    :value="old('category_id', $competition->category_id ?? '')"
                />
                <x-input
                    label="Competition Title"
                    name="title"
                    :value="old('title', $competition->title ?? '')"
                    placeholder="e.g. Hology 8.0"
                />
                <x-input
                    label="Organizer"
                    name="organizer"
                    :value="old('organizer', $competition->organizer ?? '')"
                    placeholder="e.g. FILKOM UB"
                />
                <x-textarea
                    label="Full Description"
                    name="description"
                    :value="old('description', $competition->description ?? '')"
                    placeholder="Detail the challenge, goals, and technical requirements..."
                />
            </div>
        </x-card-section>

        <x-card-section
            title="Rules & Regulations"
            action="+ Add Rule"
            actionId="add-rule-btn"
        >
            <div id="rules-container" class="space-y-3">
                @foreach($competition->rules ?? [] as $index => $rule)
                    <div
                        class="
                            bg-[#1E2021]
                            rounded-lg
                            border border-white/20
                            focus:border-[#9747FF]
                            p-4
                            flex items-start gap-3
                            rule-item
                        "
                    >
                        <span class="text-white rule-number shrink-0">
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
                        >{{ $rule->rule }}</textarea>
                    </div>
                @endforeach
            </div>
        </x-card-section>

        <x-card-section
            title="Timeline Builder"
            action="+ Add Stage"
            actionId="add-stage-btn"
        >
            <div id="timeline-container" class="space-y-4 md:space-y-6">
                @forelse($competition->stages ?? [] as $stage)
                    <x-timeline-stage
                        :title="$stage->title"
                        :startDate="$stage->start_date"
                        :endDate="$stage->end_date"
                    />
                @empty
                    <x-timeline-stage
                        title=""
                        startDate=""
                        endDate=""
                    />
                @endforelse
            </div>
        </x-card-section>
    </div>

    <div
        class="
            w-full
            xl:w-[320px]
            space-y-6
            xl:sticky xl:top-6
        "
    >
        <x-card-section title="Branding">
            <div class="space-y-5">
                <input
                    type="file"
                    id="competition-image"
                    accept="image/*"
                    name="photo_url"
                    class="hidden"
                >
                <label
                    for="competition-image"
                    class="
                        h-40 sm:h-48
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
                    @if($competition->photo_url)
                        <img
                            src="{{ Str::startsWith($competition->photo_url, ['http://', 'https://'])
                                ? $competition->photo_url
                                : asset('storage/' . $competition->photo_url)
                            }}"
                            class="absolute inset-0 w-full h-full object-cover"
                        />
                    @else
                        <p id="upload-placeholder" class="text-white">
                            Upload Image
                        </p>
                    @endif
                </label>
            </div>
        </x-card-section>

        <x-card-section
            title="Prize Pool"
            action="+ Add Prize"
            actionId="add-prize-btn"
        >
            <div id="prize-container" class="space-y-3">
                @foreach($competition->prizes ?? [] as $prize)
                    <div class="flex flex-col sm:flex-row gap-3 prize-item">
                        <input
                            type="text"
                            name="prize_title[]"
                            value="{{ old('prize_title.' . $loop->index, $prize->title ?? '') }}"
                            placeholder="1st"
                            class="
                                w-full sm:w-20
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
                            value="{{ old('prize_amount.' . $loop->index, $prize->amount ?? '') }}"
                            class="
                                w-full sm:flex-1
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
            <div class="grid grid-cols-1 gap-4 sm:gap-5">
                <x-input
                    label="Registration Link"
                    name="registration_link"
                    :value="old('registration_link', $competition->registration_link ?? '')"
                    type="url"
                    placeholder="https://..."
                />
                <x-input
                    label="Guidebook Link"
                    name="guidebook_link"
                    type="url"
                    :value="old('guidebook_link', $competition->guidebook_link ?? '')"
                    placeholder="https://..."
                />
                <x-input
                    label="Registration Fee (Rp)"
                    name="registration_fee"
                    type="number"
                    :value="old('registration_fee', $competition->registration_fee ?? '')"
                    placeholder="50000"
                />
            </div>
        </x-card-section>

        <x-card-section title="Settings">
            <div class="space-y-5">
                <x-toggle
                    label="Public Visibility"
                    name="is_public"
                    :checked="old('is_public', $competition->is_public ?? true)"
                />
            </div>
        </x-card-section>
    </div>
</div>

<template id="rule-template">
    <div
        class="
            bg-[#1E2021]
            rounded-lg
            border border-white/20
            focus:border-[#9747FF]
            p-4
            flex items-start gap-3
            rule-item
        "
    >
        <span class="text-white rule-number shrink-0">
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
    <div class="flex flex-col sm:flex-row gap-3 prize-item">
        <input
            type="text"
            name="prize_title[]"
            placeholder="1st"
            class="
                w-full sm:w-20
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
            class="
                w-full sm:flex-1
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