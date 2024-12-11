<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movies;
use App\Models\Seasons;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    public static function show($name)
    {

        $cache = 'recommend_'.$name;
        $recom = Cache::get($cache);

        if (! $recom) {
            // Fetch recommendations from series and movies and merge them
            $recommend = DB::table('series')
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
                ->inRandomOrder()
                ->limit(4)
                ->get();

            $recommend2 = DB::table('movies')
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
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
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            // ->where('titleType', $type)
            ->get();

        $media2 = DB::table('movies')
            ->where('formatted_name', $name)
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            // ->where('titleType', $type)
            ->get();

        $all = $media->union($media2);

        /*
        the below code uses the same structure as above
        read it and understand it's workings
        */
        $cacheKey = 'moreSeries_'.$name;

        $merged = Cache::get($cacheKey);

        if (! $merged) {
            $mergedSeries = DB::table('series')
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
                ->inRandomOrder()
                ->limit($seriesLimit ?? 2) // Use dynamic limit if provided
                ->get();

            $mergedMovies = DB::table('movies')
                ->where('formatted_name', '<>', $name)
                ->whereNull('deleted_at')
                ->where('status', '!=', 'pending')
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

        $seasons = Seasons::where('formatted_name', $name)->whereNull('deleted_at')->where('status', '!=', 'pending')->get();
        $totalEpisodes = $seasons->sum('episode_number');

        $comments = Comment::where('title', $name)->with('replies')->whereNull('deleted_at')->orderByDesc('id')->get();
        $all_comments = Comment::where('title', $name)->count();

        return view('media.detail', compact('all', 'merged', 'recom', 'comments', 'all_comments', 'seasons'));
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

    public function genres($genre)
    {
        $movies = Movies::where('genres', 'LIKE', "%{$genre}%")
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->get();

        $series = Series::where('genres', 'LIKE', "%{$genre}%")
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

        return view('media.genres', compact('paginatedResults', 'page', 'genre'));
    }
}
