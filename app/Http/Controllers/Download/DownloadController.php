<?php

namespace App\Http\Controllers\Download;

use App\Models\Movies;
use App\Models\Series;
use App\Models\Seasons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    //
    public function downloadMovie($name)
    {
        $movie = Movies::where('formatted_name', $name)->firstOrFail();

        if ($movie->download_url) {

            $movie->increment('downloads');

            \Log::info('Download URL: ', ['url' => $movie->download_url]);

            return redirect()->away($movie->download_url);
        }
    }

    public function downloadSeason($name, $season_number, $episode)
    {
        $season = Seasons::where('formatted_name', $name)->where('season_number', $season_number)->where('episode_number', $episode)->firstOrFail();

        if ($season->download_url) {
            // increment in the series table not the seasons table
            $series = Series::where('formatted_name', $name)->firstOrFail();

            $series->increment('downloads');

            // \Log::info('Download URL: ', ['url' => $season->download_url]);

            return redirect()->away($season->download_url);
        } else {
            return redirect()->back();
        }

    }
}
