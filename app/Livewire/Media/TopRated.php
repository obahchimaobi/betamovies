<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TopRated extends Component
{
    use WithoutUrlPagination, WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $top_rated_movies = Movies::where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->get();
        $top_rated_series = Series::where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->get();

        $top_rated = $top_rated_movies->concat($top_rated_series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $top_rated->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($top_rated), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('livewire.media.top-rated', compact('paginatedResults'));
    }
}
