<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
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
    ];
}
