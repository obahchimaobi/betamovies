<?php

namespace App\Console\Commands;

use App\Models\Movies;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GetMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-movies';

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
        $page = 1;

        do {

            $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                ->accept('applicable/json')
                ->get("https://api.themoviedb.org/3/account/20553054/favorite/movies?language=en-US&page={$page}&sort_by=created_at.desc");

            if ($response->failed()) {
                // Handle error
                echo 'Http Error: ' . $response->body();

                break;
            }

            $data = json_decode($response, true);

            // Check if the results key exists and has more than one item
            // Check if 'results' exists in $data, is an array, and has at least one element
            if (isset($data['results']) && is_array($data['results']) && count($data['results']) > 0) {

                // Iterate over each result in 'results' array
                foreach ($data['results'] as $result) {

                    // Get the release date if it exists, otherwise default to 0
                    $release_date = isset($result['release_date']) ? $result['release_date'] : 0;

                    // Extract the year from the release date
                    $year = substr($release_date, 0, 4);

                    // Get the full name of the movie
                    $full_name = $result['title'];

                    // Get the movie ID
                    $id = $result['id'];

                    // Check if the movie is already in the database
                    $fetch = Movies::where('movieId', $id)->first();

                    // If the movie is not in the database, add it
                    if (!$fetch) {

                        // Extract and prepare movie details
                        $popularity = $result['popularity'] ?? 0;
                        $language = strtoupper($result['original_language']);
                        $overview = $result['overview'];
                        $poster_path = $result['poster_path'];
                        $backdrop_path = $result['backdrop_path'] ?? $poster_path;
                        $vote_average = $result['vote_average'];
                        $base_url = 'https://image.tmdb.org/t/p/w780' . $poster_path;

                        // download the backdrop image
                        $backdrop_url = 'https://image.tmdb.org/t/p/w780' . $backdrop_path;

                        // Get the contents of the image from the URL
                        $backdrop_contents = file_get_contents($backdrop_url);

                        $backdrop_tempPath = storage_path('temp/' . basename($backdrop_url));

                        // Ensure the temp directory exists
                        if (!file_exists(dirname($backdrop_tempPath))) {
                            mkdir(dirname($backdrop_tempPath), 0777, true);
                        }
                        //  dd($backdrop_tempPath . ' Created');

                        file_put_contents($backdrop_tempPath, $backdrop_contents);

                        $backdropCloudinaryResponse = Cloudinary::upload($backdrop_tempPath, [
                            'folder' => 'betamovies/backdrop/movies',
                            'format' => 'webp',
                            'quality' => 'auto',
                        ]);

                        $backdropCloudinaryUrl = $backdropCloudinaryResponse->getSecurePath();

                        unlink($backdrop_tempPath);
                        /*
                            End of the code for downloading backdrop images and uploading to cloudinary
                        */

                        // Format the name for storage
                        $name = $result['title'] . ' ' . $year . ' download movie';
                        $formatted_name = preg_replace('/[^a-zA-Z0-9 ]/', ' ', $name);
                        $formatted_name2 = preg_replace('/\s+/', '-', $formatted_name);
                        $formatted_name3 = trim(Str::lower($formatted_name2), '-');

                        // Round the vote average to one decimal place
                        $rating = floor($vote_average * 10) / 10;

                        // Downloading the movie poster image
                        // This image poster image will be saved to cloudinary
                        $url = $base_url;

                        // Get the contents of the image from the URL
                        $contents = file_get_contents($url);

                        // save to path
                        $tempPath = storage_path('temp/' . basename($url));

                        // Ensure the temp directory exists
                        if (!file_exists(dirname($tempPath))) {
                            mkdir(dirname($tempPath), 0777, true);
                        }

                        file_put_contents($tempPath, $contents);

                        // upload to cloudinary
                        $cloudinaryResponse = Cloudinary::upload($tempPath, [
                            'folder' => 'betamovies/images',
                            'format' => 'webp',
                            'quality' => 'auto',
                        ]);

                        // get the cloudinary url
                        $cloudinaryUrl = $cloudinaryResponse->getSecurePath();

                        unlink($tempPath);
                        /*
                            End of the code for downloading poster images and uploading to cloudinary
                        */

                        // Create a new movie record in the database
                        Movies::create([
                            'movieId' => $id,
                            'name' => $full_name,
                            'formatted_name' => $formatted_name3,
                            'poster_path' => $poster_path,
                            'backdrop_path' => $backdrop_path,
                            'origin_country' => '',
                            'language' => $language,
                            'overview' => $overview,
                            'release_date' => $release_date,
                            'release_year' => $year,
                            'vote_count' => $rating,
                            'type' => 'movie',
                            'status' => 'pending',
                            'popularity' => $popularity,
                            'created_at' => Carbon::now()->format('Y-m-d'),
                            'poster_cloudinary_url' => $cloudinaryUrl,
                            'backdrop_cloudinary_url' => $backdropCloudinaryUrl,
                        ]);

                        // Output a success message
                        $this->info('✔ ' . $full_name . ' - has been added successfully ✔' . '. Cloudinary Url: ' . $cloudinaryUrl);

                        // Optionally, dispatch the UpdateMoviesTrailer job here
                    } else {
                        // Output a message indicating the movie is already in the database
                        $this->info('✘ ' . $full_name . ' - already in database ✘');
                    }
                }
            } else {
                // No more results, stop the loop
                break;
            }

            // Check if there are more pages to fetch
            if (!isset($data['total_pages']) || $page >= $data['total_pages']) {
                break;
            }

            $page++;
        } while (true);
    }
}
