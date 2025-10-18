<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);

        $this->dispatch(
            'notify',
            type: 'success',
            message: 'Category created successfully!'
        );
    }

    public function render()
    {
        return view('livewire.admin.product.create-category')->layout('layouts.app');
    }
}
