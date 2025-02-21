<?php

namespace App\Console\Commands;

use App\Models\Series;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GetSeriesBackdropImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-series-backdrop';

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
        $get_image_names = Series::all();

        foreach ($get_image_names as $get_image_name) {
            $directory = 'public/backdrop/';

            // add the path of the image
            $image_storage_path = $directory . $get_image_name->backdrop_path;

            // check if the image exists and update it if not
            if (!Storage::exists($image_storage_path)) {

                $img_file_name = pathinfo($get_image_name->backdrop_path, PATHINFO_FILENAME);

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
}
