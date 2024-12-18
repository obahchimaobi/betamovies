<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowMovies extends Component
{
    use WithoutUrlPagination, WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $movies = Movies::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('24');

        return view('livewire.media.show-movies', compact('movies'));
    }
}
