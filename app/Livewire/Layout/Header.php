<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Header extends Component
{
    public string $title = 'Dashboard';
    public string $search = '';

    public function notify()
    {
        session()->flash('message', 'Notifications clicked!');
    }

    public function settings()
    {
        session()->flash('message', 'Settings clicked!');
    }

    public function profile()
    {
        session()->flash('message', 'Profile clicked!');
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
