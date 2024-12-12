<?php

namespace App\Livewire;

use Livewire\Component;

class Details extends Component
{
    public $name;
    public $all = [];
    
    // public function mount($name, $all)
    // {
    //     $this->name = $name;
    //     $this->all = $all;
    // }

    public function render()
    {
        return view('livewire.details', [
            'name' => $this->name,
            'all' => $this->all
        ]);
    }
}
