<button
    type="{{ $type ?? 'button' }}"
    {{ $attributes->except('type')->merge([
        'class' => '
            bg-[#9747FF]
            text-[#400071]
            font-bold
            px-4 py-3
            rounded-xl
            flex items-center justify-center
            gap-2 md:gap-4
            text-sm md:text-base
            hover:bg-[#DEB8FF]
            transition-colors duration-300
            cursor-pointer
            whitespace-nowrap
        '

    ]) }}
>
    {{ $slot }}
</button>