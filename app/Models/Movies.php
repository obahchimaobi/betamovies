<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Movies extends Model
{
    //
    use Searchable, SoftDeletes;

    protected $fillable = [
        'movieId',
        'name',
        'formatted_name',
        'poster_path',
        'backdrop_path',
        'origin_country',
        'language',
        'overview',
        'release_date',
        'release_year',
        'vote_count',
        'type',
        'runtime',
        'genres',
        'trailer_url',
        'downloads',
        'popularity',
        'download_url',
        'status',
        'approved_at',
        'backdrop_cloudinary_url',
        'poster_cloudinary_url',
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['name'] = $this->full_name;

        // Customize array...

        return $array;
    }

    protected $casts = [
        'status' => 'boolean',
    ];
}
