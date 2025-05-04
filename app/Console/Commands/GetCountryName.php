<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Intl\Countries;

class GetCountryName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-country-name';

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
        // $movies = \App\Models\Series::all(); // Fetch all movie records

        // foreach ($movies as $movie) {
        //     // Get the country code from the 'country' field
        //     $countryCode = $movie->origin_country;

        //     // Fetch the full country name using the country code
        //     $country = country($countryCode);
        //     $countryName = $country ? $country->getName() : $countryCode; // Use code if name not found

        //     // Update the country_name column
        //     $movie->country = $countryName;
        //     $movie->save();
        // }

        $movies = \App\Models\Movies::all(); // Fetch all movie records

        foreach ($movies as $movie) {
            // Get the country code from the 'country' field
            $countryCode = $movie->origin_country;

            // Fetch the full country name using the country code
            $country = Countries::getName($countryCode);
            $countryName = $country ? $country : $countryCode; // Use code if name not found

            // Update the country_name column
            $movie->country = $countryName;
            $movie->save();
        }
    }
}
