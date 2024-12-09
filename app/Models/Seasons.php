<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    //
    protected $fillable = [
        'movieId',
        'name',
        'formatted_name',
        'type',
        'overview',
        'origin_country',
        'country',
        'season_number',
        'episode_number',
        'episode_title',
        'air_date',
        'poster_path',
        'status',
        'download_url',
        'approved_at',
        'deleted_at',
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}