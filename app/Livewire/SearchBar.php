<?php

namespace App\Livewire;

use App\Models\Movies;
use App\Models\Series;
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
            $movies_results = Movies::where('name', 'like', '%'.$this->searchBar.'%')
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
                ->select(['name', 'formatted_name', 'poster_path', 'release_year', 'poster_cloudinary_url']);

            $results = Series::where('name', 'like', '%'.$this->searchBar.'%')
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
                ->select(['name', 'formatted_name', 'poster_path', 'release_year', 'poster_cloudinary_url'])->union($movies_results->getQuery())->simplePaginate('20');
        }

        $error = '';

        if (count($results) == 0) {
            // code...
            $error = 'No result found';
        }

        return view('livewire.search-bar', compact('results', 'error'));
    }
}
