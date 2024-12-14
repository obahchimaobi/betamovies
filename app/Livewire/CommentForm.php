<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentForm extends Component
{
    public $commentor;

    public $comment;

    public $name;

    public $id;

    public function mount($name = null, $id = null)
    {
        if (Auth::check()) {
            $this->commentor = Auth::user()->name;
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
        ]);

        $comment->save();

        session()->flash('success', 'Your comment has been added successfully!');
        $this->redirect(url()->previous(), navigate: true);
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
