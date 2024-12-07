<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Movies;
use App\Models\Series;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

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
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->limit(4)
                ->get();

            $recommend2 = DB::table('movies')
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->limit(4)
                ->get();

            // Merge the collections
            $recom = $recommend->merge($recommend2);

            // Optionally shuffle the merged results if needed
            $recom = $recom->shuffle();


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

    public function movies()
    {
        // get movies from database
        $movies = Movies::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])->paginate('24');

        return view('media.movies', compact('movies'));
    }

    public function series()
    {
        $series = Series::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])->paginate('24');

        return view('media.series', compact('series'));
    }

    public function top_rated()
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

        return view('media.top-rated', compact('paginatedResults'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $movies = Movies::where('name', 'LIKE', "%{$query}%")
            ->orWhere('formatted_name', 'LIKE', "%{$query}%")
            ->get();

        $series = Series::where('name', 'LIKE', "%{$query}%")
            ->orWhere('formatted_name', 'LIKE', "%{$query}%")
            ->get();

            $allResults = $movies->concat($series);

            $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

            // Items per page
            $perPage = 36;

            // Slice the collection to get the items to display in current page
            $currentPageResults = $allResults->slice(($page * $perPage) - $perPage, $perPage)->values();

            // Create our paginator and add it to the view
            $paginatedResults = new LengthAwarePaginator($currentPageResults, count($allResults), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('media.search', compact('paginatedResults'));
    }
}
