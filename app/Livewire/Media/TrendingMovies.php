<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class TrendingMovies extends Component
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
                'except' => null
            ]
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
        $trending_movies_query = Movies::where('popularity', '>=', 100)
            ->select(['name', 'formatted_name', 'poster_path', 'vote_count', 'release_year'])
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity');

        if ($this->yearFilter) {
            $trending_movies_query->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $trending_movies_query->where('country', $this->countryFilter);
        }

        $trending_movies = $trending_movies_query->paginate('24');

        $year = Movies::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        $country = Movies::pluck('country')
            ->unique()
            ->values();

        return view('livewire.media.trending-movies', compact('trending_movies', 'year', 'country'));
    }
}
