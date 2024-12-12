<?php

namespace App\Console\Commands;

use App\Models\Series;
use Illuminate\Console\Command;

class UpdateSeriesTrailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-series-trailer';

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
        $getSeries = Series::whereNull('trailer_url')->get();

        if (count($getSeries) > 0) {
            foreach ($getSeries as $movie) {
                $movie_id = $movie->movieId;

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.themoviedb.org/3/tv/{$movie_id}/videos",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 300,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc',
                        'accept: application/json',
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo 'cURL Error #:'.$err;

                    continue;
                }

                $data = json_decode($response, true);

                if (isset($data['results']) && is_array($data['results'])) {
                    foreach ($data['results'] as $video) {
                        if ($video['type'] === 'Trailer' && $video['site'] === 'YouTube') {
                            $trailer = 'https://www.youtube.com/embed/'.$video['key'];

                            $movie->trailer_url = $trailer;
                            $movie->save();

                            echo '✔ Trailer updated successfully for '.$movie->name.' ✔'."\n";
                        }
                    }
                }
            }
        } else {
            echo '😙No missing series trailer found😙';
        }

        echo "\n";

        $apiKey = 'AIzaSyCUoGQhYzTPCkjEpYZvgyoFHqngLwibFiI';

        // Fetch movies that don't have trailers
        $noTrailer = Series::whereNull('trailer_url')->get();

        if (count($noTrailer) > 0) {
            foreach ($noTrailer as $nonTrailer) {
                $movieName = $nonTrailer->name;

                // Set parameters for the API request
                $params = [
                    'q' => $movieName.' trailer',
                    'type' => 'video',
                    'maxResults' => 1, // Ensures only one result is fetched
                    'key' => $apiKey,
                ];

                // Make the API request
                $apiUrl = 'https://www.googleapis.com/youtube/v3/search?'.http_build_query($params);
                $response = file_get_contents($apiUrl);
                $data = json_decode($response, true);

                // Display the results
                if (! empty($data['items'])) {
                    $videoTrailer = 'https://www.youtube.com/embed/'.$data['items'][0]['id']['videoId'];

                    // Update the database with the trailer
                    $nonTrailer->trailer_url = $videoTrailer;
                    $nonTrailer->save();

                    echo 'Trailer updated for '.$nonTrailer->name."\n";
                }
            }
        } else {
            echo '😙No missing series trailer found😙';
        }
    }
}
