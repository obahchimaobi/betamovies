<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class NewReleases extends Component
{
    use WithPagination;

    public $yearFilter = null;

    public $countryFilter = null;

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
        $this->reset();
        $this->resetPage();
    }

    public function render()
    {
        $new_released_movies_query = Movies::where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id');
        $new_released_series_query = Series::where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $new_released_movies_query->where('release_year', $this->yearFilter);
            $new_released_series_query->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $new_released_movies_query->where('country', $this->countryFilter);
            $new_released_series_query->where('country', $this->countryFilter);
        }

        $new_released_movies = $new_released_movies_query->get();
        $new_released_series = $new_released_series_query->get();

        $new_released = $new_released_movies->concat($new_released_series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $new_released->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($new_released), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

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

        return view('livewire.media.new-releases', compact('paginatedResults', 'year', 'country'));
    }
}
