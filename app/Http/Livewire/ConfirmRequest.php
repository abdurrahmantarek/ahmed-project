<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmRequest extends Component
{
    public $confirmed = false;

    public function render()
    {
        return view('livewire.confirm-request');
    }
}
