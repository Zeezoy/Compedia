@props(['data'])

<div class="flex items-center justify-center gap-2 mt-8">
    <a
        href="{{ $data->previousPageUrl() ?? '#' }}"
        class="
            w-10 h-10 rounded-lg border border-[#4D4354]
            text-[#CFC2D6]
            hover:bg-white/5 transition
            flex items-center justify-center font-bold

            {{ $data->onFirstPage()
                ? 'opacity-50 pointer-events-none'
                : ''
            }}
        "
    >
        <
    </a>

    @for ($i = 1; $i <= $data->lastPage(); $i++)
        <a
            href="{{ $data->url($i) }}"
            class="
                w-10 h-10 rounded-lg
                font-bold flex items-center justify-center transition

                {{ $data->currentPage() == $i
                    ? 'bg-[#B76DFF] text-[#400071]'
                    : 'border border-[#4D4354] text-[#CFC2D6] hover:bg-white/5'
                }}
            "
        >
            {{ $i }}
        </a>
    @endfor

    <a
        href="{{ $data->nextPageUrl() ?? '#' }}"
        class="
            w-10 h-10 rounded-lg border border-[#4D4354]
            text-[#CFC2D6]
            hover:bg-white/5 transition
            flex items-center justify-center font-bold

            {{ $data->hasMorePages()
                ? ''
                : 'opacity-50 pointer-events-none'
            }}
        "
    >
        >
    </a>
</div>