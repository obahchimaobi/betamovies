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

    protected $queryString = ['search'];

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $query = $this->search;

        // dump($query);

        $movies = Movies::search($query)->get()->whereNull('deleted_at')->where('status', '!=', 'pending');
        $series = Series::search($query)->get()->whereNull('deleted_at')->where('status', '!=', 'pending');

        $allResults = $movies->concat($series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        $perPage = 24;

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
