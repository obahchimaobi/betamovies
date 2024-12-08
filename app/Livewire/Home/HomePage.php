<?php

namespace App\Livewire\Home;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomePage extends Component
{
    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $all_series = DB::table('series')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('12')
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        $all_movies = DB::table('movies')
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id')
            ->paginate('12')
            ->map(function ($item) {
                return (object) array_merge((array) $item, ['poster_path' => $item->poster_path ?? null]);
            });

        // dd($all_movies);

        $merge = $all_series->merge($all_movies);

        return view('livewire.home.home-page', [
            'merge' => $merge,
        ]);
    }
}
