<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function comment(Request $request, $name, $id)
    {
        $request->validate([
            'commentor' => 'required|string',
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'comment_name' => $request->commentor,
            'comment' => $request->comment,
            'movie_id' => $id,
            'title' => $name,
        ]);

        $comment->save();

        session()->flash('success', 'Your comment has been added successfully!');
        return redirect()->back();
    }
}
