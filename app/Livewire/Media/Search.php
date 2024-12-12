<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $searchBar = '';

    public function redirectToSearch()
    {
        // Validate the search term
        if (!empty($this->searchBar)) {
            // Redirect to the search page with the query string
            return redirect()->route('search');
        }
    }

    public function placeholder()
    {
        return view('placeholder');
    }


    public function render()
    {
        $query = '';

        dump($this->searchBar);

        $movies = Movies::where('name', 'like', '%' . $this->searchBar . '%')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->get();

        $series = Series::where('name', 'like', '%' . $this->searchBar . '%')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->get();

        $allResults = $movies->merge($series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $allResults->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($allResults), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('livewire.media.search', compact('paginatedResults', 'query'));
    }
}
