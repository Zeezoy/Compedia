<div class="bg-[#18181B] border border-white/10 rounded-xl p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-semibold text-[#DEB8FF] text-2xl">
            {{ $title }}
        </h2>

        @if(isset($action))
            <button type="button" class="text-[#DEB8FF] font-medium" id="{{ $actionId ?? '' }}">
                {{ $action }}
            </button>
        @endif
    </div>
    {{ $slot }}
</div>