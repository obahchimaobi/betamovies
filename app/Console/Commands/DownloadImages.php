<?php

namespace App\Console\Commands;

use App\Models\Movies;
use App\Models\Series;
use App\Models\Seasons;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all backdrop missing image files. You can modify it by replaceing "backdrop_path" with "poster_path" to download all posters missing image files.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        function download_movies_images()
        {
            $get_image_names = Movies::all();

            foreach ($get_image_names as $get_image_name) {
                $img_file_name = pathinfo($get_image_name->backdrop_path, PATHINFO_FILENAME);

                $base_url = 'https://image.tmdb.org/t/p/w780/' . $img_file_name . '.jpg';

                // Check if the movie already has an image URL stored
                if (!$get_image_name->cloudinary_url) {

                    // Download the image from TMDb
                    $contents = file_get_contents($base_url);

                    if ($contents !== false) {
                        // Save the image temporarily
                        $tempPath = storage_path('app/temp_' . $img_file_name . '.jpg');
                        file_put_contents($tempPath, $contents);

                        // Upload to Cloudinary
                        $cloudinaryResponse = Cloudinary::upload($tempPath, [
                            'folder' => 'betamovies/backdrop',
                            'format' => 'webp', // Convert to WebP automatically
                            'quality' => 'auto' // Optimize quality
                        ]);

                        // Get the Cloudinary secure URL
                        $cloudinaryUrl = $cloudinaryResponse->getSecurePath();

                        // Update movie record in DB
                        $get_image_name->update(['cloudinary_url' => $cloudinaryUrl]);

                        // Delete the temp file
                        unlink($tempPath);

                        echo "✔ Movie Image uploaded to Cloudinary: {$cloudinaryUrl}\n";
                    } else {
                        echo "❌ Failed to fetch image from TMDb: {$base_url}\n";
                    }
                } else {
                    echo "✔ Image already exists in Cloudinary: {$get_image_name->cloudinary_url}\n";
                }
            }

            echo "\n";
        }

        function download_series_images()
        {
            $get_image_names = Series::all();

            foreach ($get_image_names as $get_image_name) {
                $directory = 'public/images/';

                // add the path of the image
                $image_storage_path = $directory . $get_image_name->poster_path;

                // check if the image exists and update it if not
                if (!Storage::exists($image_storage_path)) {

                    $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                    $base_url = 'https://image.tmdb.org/t/p/w780/' . $img_file_name . '.jpg';

                    $url = $base_url;

                    // Get the contents of the image from the URL
                    $contents = file_get_contents($url);

                    // Get the image name from the URL (removing the extension)
                    $image_name = pathinfo($url, PATHINFO_FILENAME) . '.webp';

                    // Define the path to save the WebP image
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

                            $quality = 55;

                            imagewebp($image, $webpPath);

                            // Free up memory
                            imagedestroy($image);
                        }

                        // Delete the temporary file
                        Storage::delete($tempPath);
                    }

                    echo '✔ Missing Series Image has been added successfully ✔' . "\n";
                } else {
                    echo 'All images for series are up to date' . "\n";
                }
            }
        }

        function download_seasons_images()
        {
            $get_image_names = Seasons::all();

            foreach ($get_image_names as $get_image_name) {
                $directory = 'public/uploads/';

                // add the path of the image
                $image_storage_path = $directory . $get_image_name->poster_path;

                // check if the image exists and update it if not
                if (!Storage::exists($image_storage_path)) {

                    $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                    $base_url = 'https://image.tmdb.org/t/p/w500/' . $img_file_name . '.jpg';

                    $url = $base_url;

                    // Get the contents of the image from the URL
                    $contents = file_get_contents($url);

                    // Get the image name from the URL (removing the extension)
                    $image_name = pathinfo($url, PATHINFO_FILENAME) . '.webp';

                    // Define the path to save the WebP image
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

                            $quality = 55;

                            imagewebp($image, $webpPath, $quality);

                            // Free up memory
                            imagedestroy($image);
                        }

                        // Delete the temporary file
                        Storage::delete($tempPath);
                    }

                    echo '✔ Missing Season Image has been added successfully ✔' . "\n";
                } else {
                    echo 'All images for season are up to date' . "\n";
                }
            }
        }

        download_movies_images();
        // download_series_images();
        // download_seasons_images();
    }
}
