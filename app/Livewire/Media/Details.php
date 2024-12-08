<?php

namespace App\Livewire\Media;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Details extends Component
{
    public $name;
    public function render($this->name)
    {
        $cache = 'recommend_'.$this->name;
        $recom = Cache::get($cache);

        if (! $recom) {
            // Fetch recommendations from series and movies and merge them
            $recommend = DB::table('series')
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $this->name)
                ->whereNull('deleted_at')
                ->inRandomOrder()
                ->limit(4)
                ->get();

            $recommend2 = DB::table('movies')
                ->where('vote_count', '>', 6)
                ->where('formatted_name', '<>', $this->name)
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
            ->where('formatted_name', $this->name)
            // ->where('titleType', $type)
            ->get();

        $media2 = DB::table('movies')
            ->where('formatted_name', $this->name)
            // ->where('titleType', $type)
            ->get();

        $all = $media->union($media2);

        /*
        the below code uses the same structure as above
        read it and understand it's workings
        */
        $cacheKey = 'moreSeries_'.$this->name;

        $merged = Cache::get($cacheKey);

        if (! $merged) {
            $mergedSeries = DB::table('series')
                ->where('formatted_name', '<>', $this->name)
                // ->where('status', '!=', 'pending')
                ->inRandomOrder()
                ->limit($seriesLimit ?? 2) // Use dynamic limit if provided
                ->get();

            $mergedMovies = DB::table('movies')
                ->where('formatted_name', '<>', $this->name)
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

        $comments = Comment::where('title', $this->name)->with('replies')->orderByDesc('id')->get();
        $all_comments = Comment::where('title', $this->name)->count();

        return view('livewire.media.detail', compact('all', 'merged', 'recom', 'comments', 'all_comments'));
    }
}
