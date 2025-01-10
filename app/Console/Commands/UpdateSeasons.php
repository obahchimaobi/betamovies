<?php

namespace App\Console\Commands;

use App\Models\Seasons;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateSeasons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-seasons';

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

        // Fetch all episodes that need updating
        $episodes = Seasons::where(function ($query) {
            $query->whereNull('overview')
                ->orWhere('overview', '')
                ->orWhereNull('episode_title')
                ->orWhere('episode_title', '');
        })
            ->whereNull('deleted_at')
            ->get();

        if (count($episodes) > 0) {
            foreach ($episodes as $episode) {

                $response = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTg4ZDY3NDI1ZmJiN2VhYjIzNWViMDM4NTQyYjY0ZiIsIm5iZiI6MTY5Njk1NTU2Mi40MjMsInN1YiI6IjY1MjU3Y2FhMDcyMTY2NDViNDAwMTVhOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ojZOyMvyWH8MfSpUVSUEFiFAiJcnRXtNevFiQs84eQE')
                    ->accept('application/json')
                    ->get("https://api.themoviedb.org/3/tv/{$episode->movieId}/season/{$episode->season_number}/episode/{$episode->episode_number}?language=en-US");

                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['overview']) && ! empty($data['overview'])) {
                        $episode->overview = $data['overview'];
                        $episode->episode_title = $data['name'];

                        if (empty($episode->episode_title || $episode->episode_title === '')) {
                            $episode->name = 'Episode '.$episode->episode_number;
                        }

                        $episode->save();

                        $this->info("Updated overview for {$episode->name} Episode {$episode->episode_number} of Season {$episode->season_number}.");
                    } else {

                        $episode->overview = $data['overview'];
                        $episode->episode_title = $data['name'];

                        if (empty($episode->episode_title || $episode->episode_title === '')) {
                            $episode->name = 'Episode '.$episode->episode_number;
                        }

                        $episode->save();

                        $this->warn("No overview found for {$episode->name} Episode {$episode->episode_number} of Season {$episode->season_number}.");
                    }
                } else {
                    $this->error("Failed to fetch data for {$episode->name} Episode {$episode->episode_number} of Season {$episode->season_number}. HTTP Status: {$response->status()}.");
                }
            }

            $this->info('Episode overviews updated successfully.');
        } else {
            $this->info('None was found');
        }

        return Command::SUCCESS;
    }
}
