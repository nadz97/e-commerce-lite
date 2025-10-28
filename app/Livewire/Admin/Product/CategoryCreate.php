<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CategoryCreate extends Component
{
    public $category = '';

    public function save()
    {
        $this->validate([
            'category' => 'required',
        ]);

        Category::create([
            'name' => $this->category
        ]);

        $this->reset(['category']);
        $this->dispatch(
            'flash',
            message: 'Category created successfully!',
            type: 'success'
        );
    }

    public function render()
    {
        return view('livewire.admin.product.category-create')->layout('layouts.app');
    }
}
