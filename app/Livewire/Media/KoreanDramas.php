<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class KoreanDramas extends Component
{
    use WithPagination;

    public $yearFilter = null;

    protected function queryString()
    {
        return [
            'yearFilter' => [
                'except' => null,
            ],
        ];
    }

    public function updated($key)
    {
        if ($key === 'yearFilter') {
            $this->resetPage();
        }
    }

    public function refresh()
    {
        $this->reset(['yearFilter']);
    }

    public function render()
    {
        $countryMapping = [
            'KR' => 'Korea',
            'KP' => 'Korea',
            // Add other Korean-related codes as necessary
        ];

        // Retrieve series where the mapped country is 'Korea' and status is not 'pending'
        $korean_drama_query = Series::where('status', true)
            ->select(['name', 'formatted_name', 'release_year', 'country', 'origin_country', 'deleted_at', 'id', 'poster_path', 'vote_count', 'poster_cloudinary_url'])
            ->whereIn('origin_country', array_keys(array_filter($countryMapping, fn ($val) => $val === 'Korea')))
            ->orderByDesc('release_year')
            ->whereNull('deleted_at')
            ->where('status', true)
            ->orderByDesc('id');

        if ($this->yearFilter) {
            $korean_drama_query->where('release_year', $this->yearFilter);
        }

        $korean_drama = $korean_drama_query->paginate(24);

        $year = Series::pluck('release_year')
            ->filter(fn ($year) => ! empty($year))
            ->unique()
            ->sortDesc()
            ->values();

        return view('livewire.media.korean-dramas', [
            'kdrama' => $korean_drama,
            'year' => $year,
        ]);
    }
}
