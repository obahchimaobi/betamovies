<?php

namespace App\Livewire\Media;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;

class TrendingMovies extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $trending_movies = Movies::where('popularity', '>=', 100)
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->paginate('24');

        return view('livewire.media.trending-movies', compact('trending_movies'));
    }
}
