<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class KoreanMovies extends Component
{
    use WithPagination;

    public $yearFilter;

    public function updated($key)
    {
        if ($key === 'yearFilter') {
            $this->resetPage();
        }
    }

    public function refresh()
    {
        $this->reset(['yearFilter', 'countryFilter']);
    }

    public function render()
    {
        // Define the country mapping array
        $countryMapping = [
            'KR' => 'Korea',
            'KP' => 'Korea',
            // Add other Korean-related codes as necessary
        ];

        $korean_movies_query = Movies::select(['name', 'formatted_name', 'poster_path', 'release_year', 'vote_count', 'id'])
            ->where('status', '!=', 'pending')
            ->whereIn('origin_country', array_keys(array_filter($countryMapping, fn($val) => $val === 'Korea')))
            ->orderByDesc('release_year')
            ->whereNull('deleted_at')
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $korean_movies_query->where('release_year', $this->yearFilter);
        }

        $korean_movies = $korean_movies_query->paginate(24);

        $year = Movies::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        return view('livewire.media.korean-movies', [
            'korean_movies' => $korean_movies,
            'year' => $year
        ]);
    }
}
