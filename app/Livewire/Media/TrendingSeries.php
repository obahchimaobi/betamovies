<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class TrendingSeries extends Component
{
    use WithPagination;

    public $yearFilter  = null;

    public $countryFilter = null;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function updated($key)
    {
        if ($key === 'yearFilter') {
            $this->resetPage();
        }
        if ($key === 'countryFilter') {
            $this->resetPage();
        }
    }

    public function refresh()
    {
        $this->reset(['yearFilter', 'countryFilter']);
    }

    public function render()
    {
        $trending_series_query = Series::where('popularity', '>=', 100)
            ->select(['name', 'formatted_name', 'poster_path', 'vote_count', 'release_year'])
            ->where('status', '!=', 'pending')
            ->whereNull('deleted_at')
            ->orderByDesc('popularity')
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $trending_series_query->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $trending_series_query->where('country', $this->countryFilter);
        }

        $trending_series = $trending_series_query->paginate('36');

        $year = Series::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        $country = Series::pluck('country')
            ->unique()
            ->values();

        return view('livewire.media.trending-series', compact('trending_series', 'year', 'country'));
    }
}
