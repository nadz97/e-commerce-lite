<header class="text-brand p-2 flex items-center gap-4 bg-inputbg/60 w-full bg-teal ">
    <!-- Left: Logo -->
    <div class="flex items-center justify-center gap-3 w-64 shrink-0">
        <img src="{{ asset('images/logo-ecomlite.png') }}" alt="Logo" class="h-14 w-auto" />
    </div>


    <div class="px-6 flex justify-between w-full">
        <!-- Middle: Search bar -->
        <div class="w-[500px] ml-2 ">
            <div class="relative">
                <input wire:model.defer="search" type="text" placeholder="Search..."
                    class="w-full bg-white/10 text-brand placeholder-brand/60 rounded-lg pl-10 pr-4 py-2
                   border border-white/20 hover:border-white/40 focus:border-white/60
                   focus:bg-white/15 hover:bg-white/15
                   shadow-insetpop focus:shadow-popout
                   outline-none transition-all duration-200" />
                <i
                    class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-brand/60 transition-colors duration-200 peer-focus:text-brand"></i>
            </div>
        </div>



        <!-- Right: Action buttons (pushed to far right) -->
        <div class="flex items-center gap-4 ml-auto">
            @foreach ([['icon' => 'fa-bell', 'action' => 'notify'], ['icon' => 'fa-cog', 'action' => 'settings'], ['icon' => 'fa-user', 'action' => 'profile']] as $item)
                <button wire:click="{{ $item['action'] }}"
                    class="p-2 rounded-full bg-teal text-brand border border-white/40
                   shadow-popout transition-all duration-200 ease-in-out
                   hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                   active:translate-y-[1px] active:shadow-insetpop">
                    <i class="fas {{ $item['icon'] }}"></i>
                </button>
            @endforeach
        </div>

    </div>
</header>
