<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
        'movie_id',
        'reply_name',
        'reply',
        'title',
        'comment_id',
        'comment_name',
        'reply_to_id',
        'reply_is_to',
        'avatar',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
