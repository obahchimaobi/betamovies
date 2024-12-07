<?php

namespace App\Livewire;

use App\Models\Movies;
use App\Models\Series;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class TopRated extends Component
{
    public function placeholder()
    {
        return view('placeholder');
    }
    public function render()
    {
        $top_rated_movies = Movies::where('vote_count', '>', '7')->get();
        $top_rated_series = Series::where('vote_count', '>', '7')->get();

        $top_rated = $top_rated_movies->concat($top_rated_series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $top_rated->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($top_rated), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        return view('livewire.top-rated', compact('paginatedResults'));
    }
}
