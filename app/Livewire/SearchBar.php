<?php

namespace App\Livewire;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class SearchBar extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $searchBar = '';

    public function render()
    {
        // dump($this->search);
        $results = [];

        if (strlen($this->searchBar) >= 1) {
            $movies_results = Movies::search($this->searchBar)->get()->whereNull('deleted_at');

            $series_results = Series::search($this->searchBar)->get()->whereNull('deleted_at');
            // dump($results);

            $allResults = $movies_results->merge($series_results);

            $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

            // Items per page
            $perPage = 24;

            // Slice the collection to get the items to display in current page
            $currentPageResults = $allResults->slice(($page * $perPage) - $perPage, $perPage)->values();

            // Create our paginator and add it to the view
            $results = new LengthAwarePaginator($currentPageResults, count($allResults), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        }

        $error = '';

        if (count($results) == 0) {
            // code...
            $error = 'No result found';
        }

        return view('livewire.search-bar', compact('results', 'error'));
    }
}
