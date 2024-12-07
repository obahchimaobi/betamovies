<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyList extends Model
{
    //
    use HasFactory;

    protected $fillable = ['userId', 'userName', 'movieId', 'movie_name', 'formatted_name', 'genres', 'poster_path'];
}
