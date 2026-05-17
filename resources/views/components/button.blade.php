<button
    type="{{ $type ?? 'button' }}"
    {{ $attributes->except('type')->merge([

        'class' => '
            bg-[#9747FF]
            text-[#400071]
            font-bold
            px-4 py-3
            rounded-xl
            flex gap-6 items-center justify-center
            hover:bg-[#DEB8FF]
            transition-colors duration-300
            cursor-pointer
        '

    ]) }}
>
    {{ $slot }}
</button>