<?php

namespace App\Console\Commands;

use App\Models\Movies;
use App\Models\Seasons;
use App\Models\Series;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

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
    protected $description = 'Download all poster missing image files. You can modify it by replaceing "poster_path" with "poster_path" to download all posters missing image files.';

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
                $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                $base_url = 'https://image.tmdb.org/t/p/w780/'.$img_file_name.'.jpg';

                // Check if the movie already has an image URL stored
                if (! $get_image_name->poster_cloudinary_url) {

                    // Download the image from TMDb
                    $contents = file_get_contents($base_url);

                    if ($contents !== false) {
                        // Save the image temporarily
                        $tempPath = storage_path('app/temp_'.$img_file_name.'.jpg');
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

        function download_series_images()
        {
            $get_image_names = Series::all();

            foreach ($get_image_names as $get_image_name) {
                $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                $base_url = 'https://image.tmdb.org/t/p/w780/'.$img_file_name.'.jpg';

                // Check if the movie already has an image URL stored
                if (! $get_image_name->poster_cloudinary_url) {

                    // Download the image from TMDb
                    $contents = file_get_contents($base_url);

                    if ($contents !== false) {
                        // Save the image temporarily
                        $tempPath = storage_path('app/temp_'.$img_file_name.'.jpg');
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

                        echo "✔ Series Image uploaded to Cloudinary: {$cloudinaryUrl}\n";
                    } else {
                        echo "❌ Failed to fetch image from TMDb: {$base_url}\n";
                    }
                } else {
                    echo "✔ Image already exists in Cloudinary: {$get_image_name->poster_cloudinary_url}\n";
                }
            }
        }

        function download_seasons_images()
        {
            $get_image_names = Seasons::all();

            foreach ($get_image_names as $get_image_name) {
                $img_file_name = pathinfo($get_image_name->poster_path, PATHINFO_FILENAME);

                $base_url = 'https://image.tmdb.org/t/p/w780/'.$img_file_name.'.jpg';

                // Check if the movie already has an image URL stored
                if (! $get_image_name->poster_cloudinary_url) {

                    // Download the image from TMDb
                    $contents = file_get_contents($base_url);

                    if ($contents !== false) {
                        // Save the image temporarily
                        $tempPath = storage_path('app/temp_'.$img_file_name.'.jpg');
                        file_put_contents($tempPath, $contents);

                        // Upload to Cloudinary
                        $cloudinaryResponse = Cloudinary::upload($tempPath, [
                            'folder' => 'betamovies/uploads',
                            'format' => 'webp', // Convert to WebP automatically
                            'quality' => 'auto', // Optimize quality
                        ]);

                        // Get the Cloudinary secure URL
                        $cloudinaryUrl = $cloudinaryResponse->getSecurePath();

                        // Update movie record in DB
                        $get_image_name->update(['poster_cloudinary_url' => $cloudinaryUrl]);

                        // Delete the temp file
                        unlink($tempPath);

                        echo "✔ Season Image uploaded to Cloudinary: {$cloudinaryUrl}\n";
                    } else {
                        echo "❌ Failed to fetch image from TMDb: {$base_url}\n";
                    }
                } else {
                    echo "✔ Image already exists in Cloudinary: {$get_image_name->poster_cloudinary_url}\n";
                }
            }
        }

        // download_movies_images();
        // download_series_images();
        download_seasons_images();
    }
}
