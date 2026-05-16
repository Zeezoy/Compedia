@props([
    'options' => [],
    'placeholder' => '',
    'name' => '',
    'selected' => '',
])

<div class="relative dropdown-filter">
    <button
        type="button"
        class="
            dropdown-trigger
            w-full
            bg-[#1E2021]
            border border-white/5
            rounded-xl
            px-4 py-3
            flex items-center justify-between
            text-white
        "
    >
        <span class="dropdown-selected text-white">
            {{ $selected ?: $placeholder }}
        </span>
        <x-bx-chevron-down class="w-6 h-6 text-white"/>
    </button>

    <div
        class="
            dropdown-menu
            hidden
            absolute
            top-full
            left-0
            mt-2
            w-full
            bg-[#1E2021]
            border border-white/5
            rounded-xl
            overflow-hidden
            z-50
        "
    >

        @foreach($options as $option)
            <button
                type="button"
                data-value="{{ $option }}"
                class="
                    dropdown-option
                    w-full
                    px-4 py-3
                    text-left
                    text-white
                    hover:bg-[#343637]
                    transition
                "
            >
                {{ $option }}
            </button>
        @endforeach
    </div>

    <input
        type="hidden"
        name="{{ $name }}"
        value="{{ $selected }}"
        class="dropdown-input"
    >
</div>