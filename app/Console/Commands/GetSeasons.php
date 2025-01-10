<?php

namespace App\Console\Commands;

use App\Models\Seasons;
use App\Models\Series;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetSeasons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-seasons';

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
        $fetch = Series::where('type', 'series')->get();

        if (count($fetch) > 0) {
            foreach ($fetch as $data_info) {
                $movie_id = $data_info->movieId;
                $movie_name = $data_info->formatted_name;
                $movie_type = $data_info->type;
                $full_name = $data_info->name;
                $country = $data_info->origin_country;
                $imageUrl = $data_info->poster_path;

                $series_response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                    ->accept('application/json')
                    ->get("https://api.themoviedb.org/3/tv/{$movie_id}?language=en-US");

                if ($series_response->failed()) {
                    echo 'Http Error: '.$response->body()."\n";

                    continue;
                }

                $series_data = $series_response->json();

                if (! isset($series_data['number_of_seasons'])) {
                    echo 'Could not determine the number of seasons for '.$full_name."\n";

                    continue;
                }

                // Get the number of seasons from the series details
                $total_seasons = $series_data['number_of_seasons'];

                // Fetch existing seasons and episodes for the series in advance
                $existingSeasonsEpisodes = Seasons::where('formatted_name', $movie_name)
                    ->get(['season_number', 'episode_number'])
                    ->groupBy('season_number')
                    ->map(function ($episodes) {
                        return $episodes->pluck('episode_number')->toArray();
                    });

                // Fetch new seasons and episodes
                for ($season = 1; $season <= $total_seasons; $season++) {

                    // Check if there are already more than 10 "pending" episodes in this season
                    $pendingEpisodesCount = Seasons::where('formatted_name', $movie_name)
                        ->where('season_number', $season)
                        ->where('status', 'pending')
                        ->count();

                    if ($pendingEpisodesCount >= 10) {
                        $this->info('Skipping Season '.$season.' for '.$full_name.' - More than 10 episodes pending');
                        break;
                    }

                    $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                        ->accept('application/json')
                        ->get("https://api.themoviedb.org/3/tv/{$movie_id}/season/{$season}?language=en-US");

                    if ($response->failed()) {
                        $this->info('Failed to fetch season '.$season.' for '.$full_name);

                        continue;
                    }

                    $data = $response->json();

                    if (isset($data['episodes']) && is_array($data['episodes']) && count($data['episodes']) > 0) {
                        $poster_path = $data['poster_path'] ?? '/'.pathinfo($imageUrl, PATHINFO_FILENAME).'.jpg';
                        $base_url = 'https://image.tmdb.org/t/p/w500'.$poster_path;

                        // Download and save the image
                        $url = $base_url;

                        // Get the contents of the image from the URL
                        $contents = file_get_contents($url);

                        // Get the image name from the URL (removing the extension)
                        $image_name = pathinfo($url, PATHINFO_FILENAME).'.webp';

                        // Define the path to save the WebP image
                        $directory = 'public/uploads/';
                        $path = $directory.$image_name;

                        if (! is_dir(storage_path('app/'.$directory))) {
                            mkdir(storage_path('app/'.$directory), 0755, true);
                        }

                        // Check if the WebP image already exists in storage, if not, save it
                        if (! Storage::exists($path)) {
                            // Save the image to a temporary path first
                            $tempPath = 'temp/'.basename($url);
                            Storage::put($tempPath, $contents);

                            // Get the full temporary path
                            $fullTempPath = storage_path('app/'.$tempPath);

                            // Create an image resource from the temporary file (assume it's a JPG)
                            $image = imagecreatefromjpeg($fullTempPath);

                            if ($image !== false) {
                                // Convert and save the image as WebP
                                $webpPath = storage_path('app/'.$path);

                                // Quality: 0 (lowest file size) to 100 (highest quality)
                                imagewebp($image, $webpPath);

                                // Free up memory
                                imagedestroy($image);
                            }

                            // Delete the temporary file
                            Storage::delete($tempPath);
                        }

                        foreach ($data['episodes'] as $episode) {
                            $air_date = $episode['air_date'] ?? 0;
                            $episode_number = $episode['episode_number'];
                            $season_number = $episode['season_number'];
                            $episode_name = isset($episode['name']) ? $episode['name'] : null;
                            $overview = isset($episode['overview']) ? $episode['overview'] : null;

                            if (isset($existingSeasonsEpisodes[$season_number]) && in_array($episode_number, $existingSeasonsEpisodes[$season_number])) {
                                $this->info('Season for '.$full_name.' already in database');

                                continue;
                            }

                            // Create new season and episode entry
                            Seasons::create([
                                'movieId' => $movie_id,
                                'name' => $full_name,
                                'formatted_name' => $movie_name,
                                'type' => $movie_type,
                                'origin_country' => $country,
                                'season_number' => $season_number,
                                'episode_number' => $episode_number,
                                'episode_name' => $episode_name,
                                'overview' => $overview,
                                'air_date' => $air_date,
                                'poster_path' => $image_name,
                                'status' => 'pending',
                                'download_url' => '',
                            ]);

                            $this->info($full_name.' Season '.$season_number.' Episode '.$episode_number.' added successfully');
                        }
                    } else {
                        // No more episodes, stop the loop
                        break;
                    }
                }
            }
        } else {
            $this->info('No approved series found in the database');
        }
    }
}
