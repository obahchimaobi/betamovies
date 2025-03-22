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

        $trending_movies = Movies::where('popularity', '>=', 100)
            ->select(['name', 'formatted_name', 'vote_count', 'poster_path', 'release_year', 'poster_cloudinary_url'])
            ->where('status', true)
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->paginate('12');

        $trending_series = Series::where('popularity', '>=', 100)
            ->select(['name', 'formatted_name', 'vote_count', 'poster_path', 'release_year', 'poster_cloudinary_url'])
            ->where('status', true)
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->paginate('12');

        $movies = Movies::whereNull('deleted_at')
            ->where('status', true)
            ->orderByDesc('approved_at')
            ->select(['name', 'formatted_name', 'release_year', 'vote_count', 'poster_path', 'poster_cloudinary_url'])
            ->orderByDesc('id')
            ->paginate('24');

        $series = Series::whereNull('deleted_at')
            ->where('status', true)
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->select(['name', 'formatted_name', 'release_year', 'vote_count', 'poster_path', 'poster_cloudinary_url'])
            ->orderByDesc('id')
            ->paginate('24');

        $seasons = DB::table('seasons as s1')
            ->select('s1.*')
            ->join(DB::raw('(SELECT MAX(id) as id, movieId FROM seasons WHERE status != 0 GROUP BY movieId) as s2'), function ($join) {
                $join->on('s1.id', '=', 's2.id');
                $join->on('s1.movieId', '=', 's2.movieId');
            })
            ->orderBy('s1.approved_at', 'desc')
            ->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(24);

        return view('livewire.home.home-page', [
            'trending_movies' => $trending_movies,
            'trending_series' => $trending_series,
            'movies_section' => $movies,
            'series_section' => $series,
            'seasons' => $seasons,
        ]);
    }
}
