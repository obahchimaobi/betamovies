<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
    public function render(Request $request)
    {

        return view('livewire.search');
    }
}
