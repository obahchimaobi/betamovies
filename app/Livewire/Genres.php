<?php

namespace App\Livewire;

use Livewire\Component;

class Genres extends Component
{
    public $genre;

    public function mount($genre)
    {
        $this->genre = $genre;
    }

    public function render()
    {
        return view('livewire.genres', [
            'genre' => $this->genre,
        ]);
    }
}
