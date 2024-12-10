<?php

namespace App\Http\Controllers\Download;

use App\Models\Movies;
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
}
