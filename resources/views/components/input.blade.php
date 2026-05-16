<div>
    <label class="font-medium text-white mb-3 block">
        {{ $label }}
    </label>

    <input
        type="{{ $type ?? 'text' }}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ $value ?? '' }}"
        {{ $attributes->merge([
                'class' => '
                    w-full
                    bg-[#1E2021]
                    border border-white/20
                    rounded-lg
                    p-4
                    text-white
                    outline-none
                    focus:border-[#9747FF]
                '
        ]) }}
    >
</div>