<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMovies extends Component
{
    use WithPagination;

    public $yearFilter = null;

    public $countryFilter = null;

    protected function queryString()
    {
        return [
            'yearFilter' => [
                'except' => null,
            ],
            'countryFilter' => [
                'except' => null,
            ],
        ];
    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function updated($key)
    {
        if ($key === 'yearFilter') {
            $this->resetPage();
        }

        if ($key === 'countryFilter') {
            $this->resetPage();
        }
    }

    public function refresh()
    {
        $this->reset(['yearFilter', 'countryFilter']);
    }

    public function render()
    {
        $moviesQuery = Movies::whereNull('deleted_at')
            ->where('status', true)
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count', 'poster_cloudinary_url']);

        if ($this->yearFilter) {
            $moviesQuery->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $moviesQuery->where('country', $this->countryFilter);
        }

        $movies = $moviesQuery->paginate('24');

        $country = Movies::pluck('country')
            ->unique()
            ->values();

        $year = Movies::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->where('status', '!=', 'pending')
            ->sortDesc()
            ->values();

        return view('livewire.media.show-movies', compact('movies', 'year', 'country'));
    }
}
