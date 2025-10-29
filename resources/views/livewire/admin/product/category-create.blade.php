<div class="space-y-6">
    {{-- @if (session()->has('flash'))
        <div
            class="p-4 rounded-lg text-sm {{ session('flash.type') === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
            {{ session('flash.message') }}
        </div>
    @endif --}}
    <x-flash-message />

    <!-- Page Title -->
    <div class="bg-teal p-6 rounded-2xl shadow-popout border border-white/30">
        <h1 class="text-2xl font-semibold text-brand">Add New Category</h1>
        <p class="text-brand/70 text-sm mt-1">Fill in the details below to add a new Category.</p>
    </div>

    <!-- Category Form -->
    <form wire:submit.prevent="save" class="bg-teal p-6 rounded-2xl shadow-popout border border-white/30 space-y-4">

        <div class="grid grid-cols-2 gap-2">
            <!-- Name -->
            <div>
                <label class="block text-brand/80 mb-1 font-medium">Category Name</label>
                <input type="text" wire:model="category" placeholder="Enter category name"
                    class="w-full bg-white/10 text-brand placeholder-brand/60 rounded-lg px-4 py-2
                       border border-white/20 hover:border-white/40 focus:border-white/60
                       focus:bg-white/15 hover:bg-white/15 shadow-insetpop outline-none transition-all duration-200">
            </div>
        </div>


        <!-- Actions -->
        <div class="flex justify-end space-x-4 pt-4 gap-2">
            <button type="button"
                class="bg-white/10 text-brand border border-white/20 px-4 py-2 rounded-lg shadow-popout transition-all duration-200 ease-in-out
                   hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                   active:translate-y-[1px] active:shadow-insetpop">
                Cancel
            </button>
            <button type="submit"
                class=" font-semibold px-4 py-2 rounded-lg shadow-popout hover:shadow-insetpop transition-all duration-200 ease-in-out
                   hover:-translate-y-[1px] hover:shadow-[0_4px_6px_rgba(0,0,0,0.1)]
                   active:translate-y-[1px] active:shadow-insetpop text-white bg-gradient-to-r from-greenStart to-greenEnd">
                Save Category
            </button>
        </div>

    </form>

</div>
