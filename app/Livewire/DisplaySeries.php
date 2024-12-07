<?php

namespace App\Livewire;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class DisplaySeries extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $series = Series::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])->paginate('24');

        return view('livewire.display-series', compact('series'));
    }
}
