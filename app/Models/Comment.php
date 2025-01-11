<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'movie_id',
        'comment_name',
        'comment',
        'title',
        'avatar',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id');
    }
}
