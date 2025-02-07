<?php

namespace App\Console\Commands;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Console\Command;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates sitemap for betamovies.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $movies = Movies::all();
        $series = Series::all();

        $urls = $movies->merge($series)->map(function ($item) {
            return route('movie.details', ['name' => $item->formatted_name]);
        });

        SitemapGenerator::create('http://127.0.0.1:8000/')
            ->shouldCrawl(function (UriInterface $url) {
                // All pages will be crawled, except for the /download and /download-season pages.
                $excludedPaths = ['/auth/google/redirect', '/reset-password', '/sign-in', '/sign-up', '/logout'];

                // Check if the current URL path matches any of the excluded paths
                foreach ($excludedPaths as $path) {
                    if (strpos($url->getPath(), $path) === 0) {
                        return false; // Do not crawl these paths
                    }
                }

                return true; // Allow crawling for all other pages
            })
            ->getSitemap()
            ->add($urls)
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');

        return 0;
    }
}
