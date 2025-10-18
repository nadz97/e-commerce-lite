<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $menuItems = [];

    public function mount()
    {
        $this->menuItems = [
            [
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-home',
            ],
            [
                'label' => 'Products',
                'route' => '#',
                'icon' => 'fas fa-box',
                'children' => [
                    ['label' => 'All Products', 'route' => 'admin.products'],
                    ['label' => 'Add New', 'route' => 'admin.product.create'],
                    ['label' => 'Categories', 'route' => 'admin.categories'],
                ],
            ],
            [
                'label' => 'Orders',
                'route' => '#',
                'icon' => 'fas fa-shopping-cart',
            ],
        ];
    }


    public function render()
    {
        return view('livewire.sidebar');
    }
}
