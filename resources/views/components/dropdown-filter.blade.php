@props([
    'options' => [],
    'placeholder' => '',
    'name' => '',
    'selected' => '',
])

@php
    $selectedLabel = $options[$selected] ?? $placeholder;
@endphp

<div class="relative dropdown-filter">
    <button type="button"
        class="dropdown-trigger w-full bg-[#1E2021] border border-white/5 rounded-xl px-4 py-3 flex justify-between text-white"
    >
        <span class="dropdown-selected">
            {{ $selectedLabel }}
        </span>
        <x-bx-chevron-down class="w-6 h-6 text-white"/>
    </button>

    <div class="dropdown-menu hidden absolute w-full bg-[#1E2021] rounded-xl mt-2 z-50">
        @foreach($options as $value => $label)
            <button type="button"
                class="dropdown-option w-full px-4 py-3 text-white text-left hover:bg-[#343637]"
                data-value="{{ $value }}"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    <input type="hidden" name="{{ $name }}" value="{{ $selected }}" class="dropdown-input">
</div>