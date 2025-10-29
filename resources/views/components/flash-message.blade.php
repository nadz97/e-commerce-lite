<div>
    @if (session()->has('flash'))
        @php
            $isSuccess = session('flash.type') === 'success';
            $bgGradient = $isSuccess
                ? 'bg-gradient-to-r from-greenStart to-greenEnd'
                : 'bg-gradient-to-r from-orangeStart to-orangeEnd';
        @endphp

        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition.opacity.duration.500ms
            class="px-4 py-3 rounded-2xl text-sm font-medium text-white shadow-popout border border-white/30 {{ $bgGradient }}">
            <div class="flex items-center justify-between">
                <span>{{ session('flash.message') }}</span>
                <button type="button" class="text-white/80 hover:text-white transition" @click="show = false">
                    ✕
                </button>
            </div>
        </div>
    @endif
</div>
