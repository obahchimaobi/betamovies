<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search;

    public $movieFilter = null;

    public $countryFilter = null;

    protected function queryString()
    {
        return [
            'movieFilter' => [
                'except' => null,
            ],
            'countryFilter' => [
                'except' => null,
            ],
            'search',
        ];
    }

    public function updated($key)
    {
        if ($key === 'movieFilter') {
            $this->resetPage();
        }

        if ($key === 'countryFilter') {
            $this->resetPage();
        }
    }

    public function refresh()
    {
        $this->reset(['movieFilter', 'countryFilter']);
    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $query = $this->search;

        // dump($query);

        $moviesQuery = Movies::where('name', 'like', '%'.$query.'%')->whereNull('deleted_at')->where('status', '!=', 'pending')->latest();
        $seriesQuery = Series::where('name', 'like', '%'.$query.'%')->whereNull('deleted_at')->where('status', '!=', 'pending')->latest();

        if ($this->movieFilter) {
            $moviesQuery->where('type', $this->movieFilter);
            $seriesQuery->where('type', $this->movieFilter);
        }

        if ($this->countryFilter) {
            $moviesQuery->where('country', $this->countryFilter);
            $seriesQuery->where('country', $this->countryFilter);
        }

        $movies = $moviesQuery->get();
        $series = $seriesQuery->get();

        $allResults = $movies->concat($series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        $perPage = 36;

        $currentPageResults = $allResults->slice(($page * $perPage) - $perPage, $perPage)->values();

        $paginatedResults = new LengthAwarePaginator(
            $currentPageResults,
            count($allResults),
            $perPage,
            $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        $country = Movies::pluck('country')
            ->unique()
            ->values();

        return view('livewire.media.search', compact('paginatedResults', 'query', 'country'));
    }
}
