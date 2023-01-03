<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentLivewire extends Component
{
    public Post $post;
    public $content;
    public $comments;
    public $id_user;
    public $user_role;
    public $bool = false;

    public function post(Post $post)
    {
        if($this->content != null){
            $c = new Comment;
            $c->content = $this->content;
            $c->author = Auth::user()->name;
            $c->author_id = Auth::user()->id; 
            $c->post_id = $post->id;
            $c->save();

            $post->user->notify(new \App\Notifications\NewComment($post->id));

            session()->flash('message', 'Comment posted.');
        }
        
        //after we save we clear the textfield
        $this->content = null;
    }

    public function enable(){
        $this->bool = true;
    }

    public function disable(){
        $this->bool = false;
    }

    public function render()
    {
        $this->comments = Comment::get();
        $this->id_user = Auth::user()->id;
        $this->user_role = Auth::user()->role;
        $bool;
        return view('livewire.comment-livewire');
    }
}
