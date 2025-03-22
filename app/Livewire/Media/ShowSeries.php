<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSeries extends Component
{
    use WithPagination;

    public $yearFilter = null;

    public $countryFilter = null;

    protected function queryString()
    {
        return [
            'yearFilter' => [
                'except' => null,
            ],
            'countryFilter' => [
                'except' => null,
            ],
        ];
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

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $seriesQuery = Series::select(['name', 'formatted_name', 'release_year', 'poster_path', 'vote_count', 'poster_cloudinary_url'])
            ->whereNull('deleted_at')
            ->where('status', true)
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
