<?php

namespace App\Console\Commands;

use App\Models\Movies;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\info;

class UpdateMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-movies';

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
        $fetch = Movies::whereNull('origin_country')->orWhereNull('genres')->orWhereNull('runtime')->orWhereNull('popularity')->get();

        if (count($fetch) > 0) {
            foreach ($fetch as $movie) {
                $id = $movie->movieId;

                $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.GaTStrEdn0AWqdlwpzn75h8vo_-X5qoOxVxZEEBYJXc')
                    ->accept('application/json')
                    ->get("https://api.themoviedb.org/3/movie/{$id}?language=en-US");

                // check for http errors
                if ($response->failed()) {
                    echo 'HTTP Error: '.$response->body();

                    continue;
                }

                $data = $response->json();

                // Update country
                $movie->origin_country = $data['origin_country'][0] ?? '';

                // Update genre
                $genres = array_map(fn ($genre) => $genre['name'], $data['genres'] ?? []);
                $movie->genres = implode(', ', $genres);

                // Update runtime
                $runtime = $data['runtime'] ?? 0;
                $hours = intdiv($runtime, 60);
                $minutes = $runtime % 60;
                $runtimeText = ($hours ? "{$hours} hour".($hours > 1 ? 's' : '') : '').($minutes ? " {$minutes} minutes" : '');
                $movie->runtime = $runtimeText;

                // update popularity
                $popularity = $data['popularity'];
                $movie->popularity = $popularity;

                $movie->save();

                // echo '✔ '.$movie->name." - updated successfully ✔ \n";
                $this->info('✔ '.$movie->name.' - updated successfully ✔');
            }
        } else {
            // echo '✘ No movie to update ✘ '."\n";
            $this->info('✘ No movie to update ✘');
        }
    }
}
