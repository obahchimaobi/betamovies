<?php

namespace App\Console\Commands;

use App\Models\Movies;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;

class UpdateMoviesTrailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-movies-trailer';

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
        $getMovies = Movies::whereNull('trailer_url')->get();

        if (count($getMovies) > 0) {
            foreach ($getMovies as $movie) {
                $movie_id = $movie->movieId;

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.themoviedb.org/3/movie/{$movie_id}/videos",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 300,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . config('services.tmdb.key'),
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
                        if (! empty($data['items']) && isset($data['items'][0]['id']['videoId'])) {
                            // If videoId is available, set the trailer link
                            $videoTrailer = 'https://www.youtube.com/embed/'.$data['items'][0]['id']['videoId'];
                        } else {
                            // If videoId is not available or items are empty, set a default value
                            $videoTrailer = 'Trailer not available'; // Or a placeholder link like 'https://example.com/placeholder-trailer'
                        }
                    }
                }
            }
        } else {
            // echo '😙No missing movie trailer found😙'."\n";
            info('😙No missing movie trailer found😙');
        }

        echo "\n";

        $apiKey = 'AIzaSyCUoGQhYzTPCkjEpYZvgyoFHqngLwibFiI';

        // Fetch movies that don't have trailers
        $noTrailer = Movies::whereNull('trailer_url')->get();

        if (count($noTrailer) > 0) {
            foreach ($noTrailer as $nonTrailer) {
                $movieName = $nonTrailer->name;
                $id = $nonTrailer['id'];

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

                    // echo 'Trailer updated for '.$nonTrailer->name."\n";
                    $this->info('Trailer updated for '.$nonTrailer->name);
                }
            }
        } else {
            // echo '😙No missing movie trailer found😙'."\n";
            $this->info('😙No missing movie trailer found😙');
        }
    }
}
