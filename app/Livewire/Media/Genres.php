<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Genres extends Component
{
    use WithPagination;

    public $genre;

    public $yearFilter = null; // For real-time filtering by year

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

    public function mount(Genres|string $genre)
    {
        $this->genre = $genre;
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
        // Fetch movies and series based on genre and year filter
        $moviesQuery = Movies::where('genres', 'LIKE', "%{$this->genre}%")
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending');

        $seriesQuery = Series::where('genres', 'LIKE', "%{$this->genre}%")
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending');

        // Apply year filter if selected
        if ($this->yearFilter) {
            $moviesQuery->where('release_year', $this->yearFilter);
            $seriesQuery->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $moviesQuery->where('country', $this->countryFilter);
            $seriesQuery->where('country', $this->countryFilter);
        }

        $movies = $moviesQuery->get();
        $series = $seriesQuery->get();

        // Merge movies and series
        $merge_them = $movies->merge($series);

        // Pagination logic
        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;
        $perPage = 24;
        $currentPageResults = $merge_them->slice(($page * $perPage) - $perPage, $perPage)->values();
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($merge_them), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        // Fetch all years for the dropdown
        $year = Movies::pluck('release_year')
            ->concat(Series::pluck('release_year'))
            ->filter(fn ($year) => ! empty($year)) // Remove empty years
            ->unique()
            ->sortDesc() // Sort by latest year (descending)
            ->values();

        $country = Movies::pluck('country')
            ->concat(Series::pluck('country'))
            ->unique()
            ->values();

        return view('livewire.media.genres', [
            'paginatedResults' => $paginatedResults,
            'page' => $page,
            'genre' => $this->genre,
            'year' => $year, // Pass years for dropdown
            'country' => $country,
            'yearFilter' => $this->yearFilter, // Keep track of the selected year
        ]);
    }
}
