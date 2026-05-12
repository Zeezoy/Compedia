<button
    {{ $attributes->merge([
        'class' => 'bg-[#DEB8FF] text-black px-4 py-3 rounded-xl'
    ]) }}
>
    {{ $slot }}
</button>