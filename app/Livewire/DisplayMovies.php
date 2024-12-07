<?php

namespace App\Livewire;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayMovies extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $movies = Movies::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])->paginate('24');

        return view('livewire.display-movies', compact('movies'));
    }
}
