<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Movies;
use App\Models\Series;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class MoviesController extends Controller
{
    //
    public function getMoviesAndSeries()
    {
        $all_series = DB::table('series')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate(24)
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        $all_movies = DB::table('movies')
            ->whereNull('deleted_at')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('24')
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        // dd($all_movies);

        $merge = $all_series->merge($all_movies);

        // dd($merge);

        return view('home', compact('merge'));
    }

    public static function show($name)
    {

        $cache = 'recommend_' . $name;
        $recom = Cache::get($cache);

        if (!$recom) {
            // Fetch recommendations from series and movies and merge them
            $recommend = DB::table('series')
                ->where('vote_count', '>', 7)
                ->where('formatted_name', '<>', $name)
                ->where('status', '!=', 'pending')
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->limit(5)
                ->get();

            $recommend2 = DB::table('movies')
                ->where('vote_count', '>', 1)
                ->where('formatted_name', '<>', $name)
                ->where('status', '!=', 'pending')
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->limit(5)
                ->get();

            // Use merge() for collections instead of union for query builders
            $recom = $recommend->merge($recommend2);

            // dd($recommend2);

            Cache::put($cache, $recom, 360);
        }

        $media = DB::table('series')
            ->where('formatted_name', $name)
            // ->where('titleType', $type)
            ->get();

        $media2 = DB::table('movies')
            ->where('formatted_name', $name)
            // ->where('titleType', $type)
            ->get();

        $all = $media->union($media2);

        /*
        the below code uses the same structure as above
        read it and understand it's workings
        */
        $cacheKey = 'moreSeries_' . $name;

        $merged = Cache::get($cacheKey);

        if (!$merged) {
            $mergedSeries = DB::table('series')
                ->where('formatted_name', '<>', $name)
                // ->where('status', '!=', 'pending')
                ->inRandomOrder()
                ->limit($seriesLimit ?? 2) // Use dynamic limit if provided
                ->get();

            $mergedMovies = DB::table('movies')
                ->where('formatted_name', '<>', $name)
                // ->where('status', '!=', 'pending')
                ->inRandomOrder()
                ->limit($moviesLimit ?? 2) // Use dynamic limit if provided
                ->get();

            // Combine the results and convert to collections for uniform handling
            $merged = $mergedSeries->merge($mergedMovies);

            // Optionally shuffle the merged collection for randomness
            if ($shuffleMerged ?? true) {
                $merged = $merged->shuffle();
            }

            // Cache the results with a dynamic expiration time
            Cache::put($cacheKey, $merged, $cacheDuration ?? 160);
        }


        $comments = Comment::where('title', $name)->with('replies')->orderByDesc('id')->get();
        $all_comments = Comment::where('title', $name)->count();

        return view('media.detail', compact('all', 'merged', 'recom', 'comments', 'all_comments'));
    }
}
