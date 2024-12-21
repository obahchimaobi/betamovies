<?php

namespace App\Livewire\Media;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class KoreanDramas extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('placeholder');
    }

    public function render()
    {
        $countryMapping = [
            'KR' => 'Korea',
            'KP' => 'Korea',
            // Add other Korean-related codes as necessary
        ];

        // Retrieve series where the mapped country is 'Korea' and status is not 'pending'
        $korean_drama = Series::where('status', '!=', 'pending')
            ->whereIn('origin_country', array_keys(array_filter($countryMapping, fn($val) => $val === 'Korea')))
            ->orderByDesc('release_year')
            ->whereNull('deleted_at')
            ->orderByDesc('id')
            ->paginate(36);

        return view('livewire.media.korean-dramas', [
            'kdrama' => $korean_drama,
        ]);
    }
}
