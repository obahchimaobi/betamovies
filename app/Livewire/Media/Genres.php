<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Genres extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $genre;

    public function mount(Genres|string $genre)
    {
        $this->genre = $genre;
    }

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $movies = Movies::where('genres', 'LIKE', "%{$this->genre}%")
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->get();

        $series = Series::where('genres', 'LIKE', "%{$this->genre}%")
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->get();

        $merge_them = $movies->merge($series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $merge_them->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($merge_them), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('livewire.media.genres', [
            'paginatedResults' => $paginatedResults,
            'page' => $page,
            'genre' => $this->genre,
        ]);
    }
}
