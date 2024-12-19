<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'movie_id',
        'comment_name',
        'comment',
        'title',
        'avatar'
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id');
    }
}
