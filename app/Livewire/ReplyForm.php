<?php

namespace App\Livewire;

use App\Models\Reply;
use Auth;
use Livewire\Component;

class ReplyForm extends Component
{
    public $name;

    public $id;

    public $reply_name;

    public $reply;

    public $comment_id;

    public $comment_name;

    public function mount($name = null, $id = null, $comment_id = null, $comment_name = null)
    {
        if (Auth::check()) {
            $this->reply_name = Auth::user()->name;
        }
        $this->name = $name;
        $this->id = $id;
        $this->comment_id = $comment_id;
        $this->comment_name = $comment_name;
    }

    public function submitReply()
    {
        $validatedData = $this->validate([
            'reply_name' => 'required|string',
            'reply' => 'required|string',
        ]);

        $reply = Reply::create([
            'reply_name' => $validatedData['reply_name'],
            'reply' => $validatedData['reply'],
            'movie_id' => $this->id,
            'title' => $this->name,
            'comment_id' => $this->comment_id,
            'comment_name' => $this->comment_name,
        ]);

        $reply->save();

        session()->flash('success', 'Your reply was posted successfully');
        $this->redirect(url()->previous(), navigate: true);
    }

    public function render()
    {
        return view('livewire.reply-form');
    }
}
