@props([
    'label',
    'checked' => false,
    'name' => '',
])

<div class="flex items-center justify-between toggle-wrapper">
    <span class="text-sm text-white/70">
        {{ $label }}
    </span>

    <input
        type="hidden"
        name="{{ $name }}"
        value="{{ $checked ? '1' : '0' }}"
        class="toggle-input"
    >

    <button
        type="button"
        class="
            toggle-button
            w-12 h-7 rounded-full relative transition
            {{ $checked ? 'bg-[#9747FF]' : 'bg-[#343637]' }}
        "
    >
        <div
            class="
                toggle-circle
                absolute top-1 w-5 h-5 rounded-full bg-white transition
                {{ $checked ? 'right-1' : 'left-1' }}
            "
        ></div>
    </button>
</div>