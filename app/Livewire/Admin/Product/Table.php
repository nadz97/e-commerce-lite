<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $priceRange = '';
    protected $queryString = ['search', 'priceRange'];
    protected $paginationTheme = 'tailwind';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPriceRange()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'priceRange']);
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%");
        }

        if ($this->priceRange === 'low') {
            $query->where('price', '<', 100000);
        } elseif ($this->priceRange === 'mid') {
            $query->whereBetween('price', [100000, 500000]);
        } elseif ($this->priceRange === 'high') {
            $query->where('price', '>', 500000);
        }

        $products = $query->paginate(10);

        return view('livewire.admin.product.table', compact('products'));
    }
}
