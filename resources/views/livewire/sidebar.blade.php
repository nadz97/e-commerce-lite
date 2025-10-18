<nav class="bg-teal text-brand w-64 h-full rounded-2xl shadow-popout p-8 text-lg border-white/40 border">
    <ul>
        @foreach ($menuItems as $item)
            <li class="mb-3" @if (!empty($item['children'])) x-data="{ open: false }" @endif>

                {{-- ✅ If no children --}}
                @if (empty($item['children']))
                    <a @if ($item['route'] !== '#') wire:navigate href="{{ route($item['route']) }}" @else href="#" @endif
                        class="flex items-center gap-2 w-full text-left text-brand hover:text-brand-20 cursor-pointer transition-all duration-200">
                        <i class="{{ $item['icon'] }}"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @else
                    {{-- 📂 Has children --}}
                    <button @click="open = !open"
                        class="flex items-center gap-2 w-full text-left text-brand hover:text-brand-20 cursor-pointer transition-all duration-200">
                        <i class="{{ $item['icon'] }}"></i>
                        <span>{{ $item['label'] }}</span>
                        <i class="fas fa-chevron-down ml-auto text-sm transition-transform duration-200"
                            :class="{ 'rotate-180': open }"></i>
                    </button>

                    <ul x-show="open" x-collapse x-transition
                        class="ml-6 mt-2 text-sm text-brand-80 space-y-1 shadow-insetpop p-2 rounded-lg overflow-hidden">
                        @foreach ($item['children'] as $child)
                            <li>
                                <a @if ($child['route'] !== '#') wire:navigate href="{{ route($child['route']) }}" @else href="#" @endif
                                    class="hover:text-brand cursor-pointer block transition-all duration-200">
                                    {{ $child['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </li>
        @endforeach
    </ul>
</nav>
