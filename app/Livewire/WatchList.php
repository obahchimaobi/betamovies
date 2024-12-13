<?php

namespace App\Livewire;

use App\Models\MyList;
use Auth;
use Livewire\Component;

class WatchList extends Component
{
    public $movieId; // Holds the movie ID

    public $movie_name;

    public $genres;

    public $formatted_name;

    public $poster_path;

    public $isInWatchlist; // Tracks if the movie is in the watchlist

    public function mount($movieId)
    {
        $this->movieId = $movieId;

        // Check if the movie is already in the watchlist for the authenticated user
        $this->isInWatchlist = MyList::where('userId', Auth::id())
            ->where('movieId', $this->movieId)
            ->whereNull('deleted_at')
            ->exists();
    }

    public function addToWatchlist()
    {
        if (! Auth::id()) {
            // code...
            session()->flash('error', 'You must login to add a movie to watchlist');
            $this->redirect(url()->previous(), navigate: true);
        } else {
            if (! $this->isInWatchlist) {

                // get users watchlists
                $userWatchLists = MyList::where('userId', Auth::id())->whereNull('deleted_at')->count();

                if ($userWatchLists >= 10) {
                    session()->flash('error', 'You can only add up to 10 movies to your watchlist');
                    $this->redirect(url()->previous(), navigate: true);
                } else {
                    MyList::create([
                        'userId' => Auth::id(),
                        'userName' => Auth::user()->name,
                        'movieId' => $this->movieId,
                        'movie_name' => $this->movie_name,
                        'genres' => $this->genres,
                        'formatted_name' => $this->formatted_name,
                        'poster_path' => $this->poster_path,
                    ]);

                    $this->isInWatchlist = true; // Update the property
                }
            }
        }
    }

    public function removeFromWatchlist()
    {
        MyList::where('userId', Auth::id())
            ->where('movieId', $this->movieId)
            ->delete();

        $this->isInWatchlist = false; // Update the property
    }

    public function render()
    {
        return view('livewire.watch-list');
    }
}
