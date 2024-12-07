<?php

namespace App\Livewire;

use App\Models\Movies;
use Livewire\Component;
use Illuminate\Support\Str;

class Search extends Component
{
    public $search = "";
    public function mount()
    {
        $this->search;
    }

    public function render()
    {
        $results = [];

        if(Str::length($this->search) >= 1) {
            $results = Movies::where('name', 'like', '%'.$this->search.'%')->limit(7)->get();
        }
        return view('livewire.search', compact('results'));
    }
}
