<div class="bg-[#18181B] border border-white/10 rounded-xl p-4 md:p-6 flex flex-col">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        @if (isset($title))
            <h2 class="font-semibold text-[#DEB8FF] text-xl md:text-2xl">
                {{ $title }}
            </h2>
        @endif

        @if(isset($action))
            <a
                href="{{ url('admin/competitions') }}"
                class="text-[#DEB8FF] font-medium text-sm md:text-base"
            >
                {{ $action }}
            </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-[700px] w-full text-sm text-left text-white">
            {{ $slot }}
        </table>
    </div>
</div>