<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //
    public function reply(Request $request, $name, $id, $comment_id, $comment_name)
    {
        $request->validate([
            'reply_name' => 'required|string',
            'reply' => 'required',
        ]);

        $reply = Reply::create([
            'movie_id' => $id,
            'reply_name' => $request->reply_name,
            'reply' => $request->reply,
            'title' => $name,
            'comment_id' => $comment_id,
            'comment_name' => $comment_name,
        ]);

        $reply->save();

        session()->flash('success', 'Your reply was posted successfully');

        return redirect()->back();
    }

    public function reply_to(Request $request, $name, $id, $comment_id, $comment_name, $reply_to_id, $reply_is_to)
    {
        $request->validate([
            'reply_name' => 'required|string',
            'reply' => 'required',
        ]);

        $reply = Reply::create([
            'movie_id' => $id,
            'reply_name' => $request->reply_name,
            'reply' => $request->reply,
            'title' => $name,
            'comment_id' => $comment_id,
            'comment_name' => $comment_name,
            'reply_to_id' => $reply_to_id,
            'reply_is_to' => $reply_is_to,
        ]);

        $reply->save();

        session()->flash('success', 'Your reply was posted successfully');

        return redirect()->back();
    }
}
