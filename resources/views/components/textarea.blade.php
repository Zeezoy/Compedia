@props(['name' => '', 'label' => '', 'value' => '', 'placeholder' => ''])

<div>
    <label class="font-medium text-white mb-3 block">
        {{ $label }}
    </label>

    <textarea
        rows="5"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        class="
            w-full
            bg-[#1E2021]
            border border-white/20
            rounded-lg
            p-4
            text-white
            outline-none
            resize-none
            focus:border-[#9747FF]
        "
    >{{ old($name, $value) }}</textarea>

</div>