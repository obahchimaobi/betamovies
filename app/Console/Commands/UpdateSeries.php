<?php

namespace App\Console\Commands;

use App\Models\Series;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateSeries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-series';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fetch = Series::whereNull('genres')->get();

        if (count($fetch) > 0) {
            foreach ($fetch as $movie) {

                $id = $movie->movieId;
                $imageUrl = pathinfo($movie->imageUrl, PATHINFO_FILENAME) . '.jpg';

                $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                    ->accept('application/json')
                    ->get("https://api.themoviedb.org/3/tv/{$id}?language=en-US");

                if ($response->failed()) {
                    echo 'HTTP Error: '.$response->body();

                    continue;
                }

                $data = $response->json();

                $genres = '';

                if (isset($data['genres'][0]['name'])) {
                    $genres = $data['genres'][0]['name'];
                }

                if (isset($data['genres'][1]['name'])) {
                    $genres .= ', '.$data['genres'][1]['name'];
                }

                if (isset($data['genres'][2]['name'])) {
                    $genres .= ', '.$data['genres'][2]['name'];
                }

                // update the movie in the database
                $movie->genres = $genres;

                $movie->save();

                echo '✔ '.$movie->name." updated successfully ✔\n";
            }
        } else {
            echo '✘ No series to update ✘'."\n";
        }
    }
}
