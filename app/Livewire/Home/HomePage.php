<?php

namespace App\Livewire\Home;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithoutUrlPagination, WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $all_series = DB::table('series')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('12')
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        $all_movies = DB::table('movies')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('12')
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        // dd($all_movies);

        $merge = $all_series->merge($all_movies);

        $trending_movies = Movies::where('popularity', '>=', 100)
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->paginate('12');

        $trending_series = Series::where('popularity', '>=', 100)
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->paginate('12');

        return view('livewire.home.home-page', [
            'merge' => $merge,
            'trending_movies' => $trending_movies,
            'trending_series' => $trending_series,
        ]);
    }
}
