<?php

namespace App\Console\Commands;

use App\Models\Movies;
use Illuminate\Console\Command;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GetMoviesImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-movies-images';

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
        $get_image_names = Movies::all();

            foreach ($get_image_names as $get_image_name) {
                $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                $base_url = 'https://image.tmdb.org/t/p/w780/' . $img_file_name . '.jpg';

                // Check if the movie already has an image URL stored
                if (!$get_image_name->poster_cloudinary_url) {

                    // Download the image from TMDb
                    $contents = file_get_contents($base_url);

                    if ($contents !== false) {
                        // Save the image temporarily
                        $tempPath = storage_path('app/temp_' . $img_file_name . '.jpg');
                        file_put_contents($tempPath, $contents);

                        // Upload to Cloudinary
                        $cloudinaryResponse = Cloudinary::upload($tempPath, [
                            'folder' => 'betamovies/images',
                            'format' => 'webp', // Convert to WebP automatically
                            'quality' => 'auto', // Optimize quality
                        ]);

                        // Get the Cloudinary secure URL
                        $cloudinaryUrl = $cloudinaryResponse->getSecurePath();

                        // Update movie record in DB
                        $get_image_name->update(['poster_cloudinary_url' => $cloudinaryUrl]);

                        // Delete the temp file
                        unlink($tempPath);

                        echo "✔ Movie Image uploaded to Cloudinary: {$cloudinaryUrl}\n";
                    } else {
                        echo "❌ Failed to fetch image from TMDb: {$base_url}\n";
                    }
                } else {
                    echo "✔ Image already exists in Cloudinary: {$get_image_name->poster_cloudinary_url}\n";
                }
            }

            echo "\n";
    }
}
