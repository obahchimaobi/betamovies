<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowSeries extends Component
{
    use WithPagination;

    public $yearFilter = null;

    public $countryFilter = null;

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

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $seriesQuery = Series::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count'])
            ->whereNull('deleted_at')
            ->where('status', '!=', 'pending')
            ->orderByDesc('approved_at')
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $seriesQuery->where('release_year', $this->yearFilter);
        }

        if ($this->countryFilter) {
            $seriesQuery->where('country', $this->countryFilter);
        }

        $series = $seriesQuery->paginate('36');

        $year = Series::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        $country = Series::pluck('country')
            ->unique()
            ->values();

        return view('livewire.media.show-series', compact('series', 'year', 'country'));
    }
}
