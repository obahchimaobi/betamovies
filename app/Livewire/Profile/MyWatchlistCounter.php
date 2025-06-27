<?php

namespace App\Livewire\Profile;

use App\Models\MyList;
use Livewire\Attributes\On;
use Livewire\Component;

class MyWatchlistCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('list-updated')]
    public function updateCount()
    {
        $this->count = session('list_count', MyList::where('userId', auth()->user()->id)->count());
    }

    public function render()
    {
        return view('livewire.profile.my-watchlist-counter');
    }
}
