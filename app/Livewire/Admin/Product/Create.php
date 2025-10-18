<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public $name = '';
    public $price = '';
    public $categories = [];
    public $category_id;

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id
        ]);

        $this->reset(['name', 'price', 'category_id']);
        session()->flash('success', 'Product created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.product.create')
            ->layout('layouts.app');
    }
}
