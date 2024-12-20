<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMovies extends Component
{
    use WithPagination;

    public $yearFilter = null;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function updated($key)
    {
        if ($key === 'yearFilter') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $moviesQuery = Movies::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $moviesQuery->where('release_year', $this->yearFilter);
        }

        $movies = $moviesQuery->paginate('24');

        $year = Movies::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        return view('livewire.media.show-movies', compact('movies', 'year'));
    }
}
