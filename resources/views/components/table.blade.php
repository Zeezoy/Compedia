<div class="bg-[#18181B] border border-white/10 rounded-xl p-6 flex flex-col">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        @if (isset($title))
            <h2 class="font-semibold text-[#DEB8FF] text-2xl mb-6">
                {{ $title }}
            </h2>
        @endif

        @if(isset($action))
            <a href="admin/competitions" class="text-[#DEB8FF] font-medium mb-6">
                {{ $action }}
            </a>
        @endif
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-white">
            {{ $slot }}
        </table>
    </div>
</div>