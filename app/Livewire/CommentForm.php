<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CommentForm extends Component
{
    public $commentor;

    public $avatar;

    public $comment;

    public $name;

    public $id;

    public function mount($name = null, $id = null)
    {
        if (Auth::check()) {
            $this->commentor = Auth::user()->name;
            $this->avatar = Auth::user()->avatar;
        }

        $this->name = $name;
        $this->id = $id;
    }

    public function submitComment()
    {
        $validatedData = $this->validate([
            'commentor' => 'required|string',
            'comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'comment_name' => $validatedData['commentor'],
            'comment' => $validatedData['comment'],
            'movie_id' => $this->id,
            'title' => $this->name,
            'avatar' => $this->avatar,
        ]);

        $comment->save();

        Toaster::success('Your comment has been added successfully!');
        $this->redirect(url()->previous(), navigate: true);
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
