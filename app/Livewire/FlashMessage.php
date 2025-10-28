<?php

namespace App\Livewire;

use Livewire\Component;

class FlashMessage extends Component
{
    public $message = '';
    public $type = 'success';
    public $show = false;

    #[On('flash')]
    public function showFlash($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;

        $this->dispatch('flash-shown');
    }

    public function hide()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.flash-message');
    }
}
