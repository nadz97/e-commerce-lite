<x-app-layout>
    <div>
        <h1 class="text-2xl text-brand font-bold mb-4">Categories</h1>

        {{-- EXPORT / IMPORT / ADD NEW --}}
        <div class="flex justify-between items-center w-full bg-teal rounded-2xl p-4 mb-2 shadow-popout">
            <div class="flex gap-4">
                <a href="#"
                    class="px-4 py-2 rounded-lg bg-teal text-brand shadow-popout
                  transition-all duration-200 ease-in-out
                  hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                  active:translate-y-[1px] active:shadow-insetpop">
                    EXPORT
                </a>

                <a href="#"
                    class="px-4 py-2 rounded-lg bg-teal text-brand shadow-popout
                  transition-all duration-200 ease-in-out
                  hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                  active:translate-y-[1px] active:shadow-insetpop">
                    IMPORT
                </a>
            </div>

            <a href="{{ route('admin.product.category-create') }}"
                class="px-4 py-2 rounded-lg text-white bg-gradient-to-r from-greenStart to-greenEnd
              shadow-popout transition-all duration-200 ease-in-out
              hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
              active:translate-y-[1px] active:shadow-insetpop">
                ADD NEW +
            </a>
        </div>
        <x-flash-message />
        <livewire:categories-table />
    </div>
</x-app-layout>
