<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Search extends Component
{
    use WithPagination;

    public $search;

    public $movieFilter = null;

    public function updated($key)
    {
        if ($key === 'movieFilter') {
            $this->resetPage();
        }
    }

    protected $queryString = ['search'];

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $query = $this->search;

        // dump($query);

        $moviesQuery = Movies::where('name', 'like', '%' . $query . '%')->whereNull('deleted_at')->where('status', '!=', 'pending')->latest();
        $seriesQuery = Series::where('name', 'like', '%' . $query . '%')->whereNull('deleted_at')->where('status', '!=', 'pending')->latest();

        if ($this->movieFilter) {
            $moviesQuery->where('type', $this->movieFilter);
            $seriesQuery->where('type', $this->movieFilter);
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

        return view('livewire.media.search', compact('paginatedResults', 'query'));
    }
}
