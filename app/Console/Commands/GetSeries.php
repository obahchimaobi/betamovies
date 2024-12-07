<?php

namespace App\Console\Commands;

use Http;
use App\Models\Series;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GetSeries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-series';

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
        $pages = 1;

        do {

            $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                ->accept('application/json')
                ->get("https://api.themoviedb.org/3/account/20553054/favorite/tv?language=en-US&page={$pages}&sort_by=created_at.asc");

            if ($response->failed()) {
                // Handle error
                echo 'Http Error: ' . $response->body();

                break;
            }

            $data = $response->json();

            if (isset($data['results']) && is_array($data['results']) && count($data['results']) > 0) {
                foreach ($data['results'] as $result) {
                    $first_air_date = $result['first_air_date'];
                    $year = substr($first_air_date, 0, 4); // Extract the first four characters
                    $full_name = $result['name'];

                    $id = $result['id'];

                    // Check if the series is already in the db
                    $fetch = Series::where('movieId', $id)->first();

                    if (!$fetch) {
                        $backdrop_path = isset($result['backdrop_path']) ? $result['backdrop_path'] : $result['poster_path'];
                        $country = isset($result['origin_country'][0]) ? $result['origin_country'][0] : null;

                        // dd($country);
                        $language = strtoupper($result['original_language']);
                        $name = $result['name'] . ' ' . $year . ' download series';
                        $overview = $result['overview'];
                        $poster_path = $result['poster_path'];
                        $vote_average = $result['vote_average'];

                        $base_url = 'https://image.tmdb.org/t/p/w780' . $poster_path;

                        // download the backdrop image
                        $backdrop_url = 'https://image.tmdb.org/t/p/original' . $backdrop_path;

                        // Get the contents of the image from the URL
                        $backdrop_contents = file_get_contents($backdrop_url);

                        // Get the image name from the URL (removing the extension)
                        $backdrop_image_name = pathinfo($backdrop_url, PATHINFO_FILENAME) . '.webp';

                        // Define the path to save the WebP image
                        $backdrop_directory = '';
                        $backdrop_path = $backdrop_directory . $backdrop_image_name;

                        if (!is_dir(storage_path('app/' . $backdrop_directory))) {
                            mkdir(storage_path('app/' . $backdrop_directory), 0755, true);
                        }

                        // Check if the WebP image already exists in storage, if not, save it
                        if (!Storage::exists($backdrop_path)) {
                            if (!is_dir(storage_path('temp/'))) {
                                mkdir(storage_path('temp/'), 0755, true);
                            }

                            // Save the image to a temporary path first
                            $backdrop_tempPath = 'temp/' . basename($backdrop_url);
                            Storage::put($backdrop_tempPath, $backdrop_contents);

                            // Get the full temporary path
                            $backdrop_fullTempPath = storage_path('app/' . $backdrop_tempPath);

                            // Create an image resource from the temporary file (assume it's a JPG)
                            $backdrop_image = imagecreatefromjpeg($backdrop_fullTempPath);

                            if ($backdrop_image !== false) {
                                // Convert and save the image as WebP
                                $backdrop_webpPath = storage_path('app/' . $backdrop_path);

                                // Quality: 0 (lowest file size) to 100 (highest quality)
                                imagewebp($backdrop_image, $backdrop_webpPath);

                                // Free up memory
                                imagedestroy($backdrop_image);
                            }

                            // Delete the temporary file
                            Storage::delete($backdrop_tempPath);
                        }

                        $formatted_name = preg_replace('/[^a-zA-Z0-9 ]/', ' ', $name);
                        $formatted_name2 = preg_replace('/\s+/', '-', $formatted_name);
                        $formatted_name3 = trim(Str::lower($formatted_name2), '-');
                        $rating = floor($vote_average * 10) / 10;

                        // Downloading the image and saving it to the storage folder
                        $url = $base_url;

                        // Get the contents of the image from the URL
                        $contents = file_get_contents($url);

                        // Get the image name from the URL (removing the extension)
                        $image_name = pathinfo($url, PATHINFO_FILENAME) . '.webp';

                        // Define the path to save the WebP image
                        $directory = 'public/images/';
                        $path = $directory . $image_name;

                        if (!is_dir(storage_path('app/' . $directory))) {
                            mkdir(storage_path('app/' . $directory), 0755, true);
                        }

                        // Check if the WebP image already exists in storage, if not, save it
                        if (!Storage::exists($path)) {
                            // Save the image to a temporary path first
                            $tempPath = 'temp/' . basename($url);
                            Storage::put($tempPath, $contents);

                            // Get the full temporary path
                            $fullTempPath = storage_path('app/' . $tempPath);

                            // Create an image resource from the temporary file (assume it's a JPG)
                            $image = imagecreatefromjpeg($fullTempPath);

                            if ($image !== false) {
                                // Convert and save the image as WebP
                                $webpPath = storage_path('app/' . $path);

                                // Quality: 0 (lowest file size) to 100 (highest quality)
                                $quality = 55;
                                imagewebp($image, $webpPath, $quality);

                                // Free up memory
                                imagedestroy($image);
                            }

                            // Delete the temporary file
                            Storage::delete($tempPath);
                        }

                        Series::create([
                            'movieId' => $id,
                            'name' => $full_name,
                            'formatted_name' => $formatted_name3,
                            'poster_path' => $image_name,
                            'backdrop_path' => $backdrop_path,
                            'origin_country' => $country,
                            'language' => $language,
                            'overview' => $overview,
                            'release_date' => $first_air_date,
                            'release_year' => $year,
                            'vote_count' => $rating,
                            'type' => 'series',
                            'status' => 'pending',
                        ]);

                        echo '✔ ' . $full_name . " - has been added to database ✔ \n";
                    } else {
                        echo '✘ ' . $full_name . " - already in database ✘ \n";
                    }
                }
            } else {
                // No more results, stop the loop
                break;
            }

            // Check if there are more pages to fetch
            if (!isset($data['total_pages']) || $pages >= $data['total_pages']) {
                break;
            }

            $pages++;
        } while (true);
    }
}
