<div>
    {{-- FILTER BAR --}}
    <div class="flex justify-between items-center w-full bg-teal rounded-2xl p-4 shadow-popout">

        {{-- 🔍 Search Bar --}}
        <div class="w-[500px] ml-2">
            <div class="relative">
                <input wire:model.live="search" type="text" placeholder="Search products..."
                    class="w-full bg-teal text-brand placeholder:text-brand/60
                        rounded-xl pl-10 pr-4 py-2
                        border border-white/30
                        shadow-insetpop
                        hover:border-white/50 hover:shadow-[inset_2px_2px_5px_rgba(0,0,0,0.2),inset_-2px_-2px_5px_rgba(255,255,255,0.1)]
                        focus:border-white/60 focus:shadow-popout
                        outline-none transition-all duration-300 ease-in-out" />
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-brand/60 pointer-events-none"></i>
            </div>
        </div>

        {{-- ⚙️ Filter Buttons --}}
        <div class="flex gap-4 items-center">
            {{-- Filter Dropdown --}}
            <select wire:model.live="priceRange"
                class="bg-teal text-brand rounded-lg px-3 py-2 border border-white/30 shadow-insetpop
                       focus:border-white/60 focus:shadow-popout transition-all duration-200 ease-in-out outline-none">
                <option value="">All Prices</option>
                <option value="low">Below 100K</option>
                <option value="mid">100K - 500K</option>
                <option value="high">Above 500K</option>
            </select>

            {{-- Reset Button --}}
            <button wire:click="resetFilters"
                class="px-4 py-2 rounded-lg bg-teal text-brand shadow-popout
                       transition-all duration-200 ease-in-out
                       hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                       active:translate-y-[1px] active:shadow-insetpop">
                <i class="fas fa-rotate-right mr-2"></i> RESET
            </button>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="mt-4 rounded-2xl overflow-hidden shadow-popout bg-teal border border-white/40">
        <table class="w-full border-collapse text-brand">
            <thead class="bg-teal/80 text-brand/80 border-b border-white/30">
                <tr>
                    <th class="text-left px-6 py-3 font-semibold">Name</th>
                    <th class="text-left px-6 py-3 font-semibold">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="hover:bg-teal/60 transition">
                        <td class="px-6 py-3 border-b border-white/20">{{ $product->name }}</td>
                        <td class="px-6 py-3 border-b border-white/20">{{ number_format($product->price) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-6 text-center text-brand/60 italic">
                            No products found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $products->links('vendor.pagination.tailwind') }}
    </div>
</div>
