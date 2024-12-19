<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class TrendingSeries extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $trending_series = Series::where('popularity', '>=', 500)
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->orderByDesc('id')
            ->paginate('24');

        return view('livewire.media.trending-series', compact('trending_series'));
    }
}
