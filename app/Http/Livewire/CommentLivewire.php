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

    public function post(Post $post, Comment $comments)
    {
        
        $c = new Comment;
        $c->content = $this->content;
        $c->author = Auth::user()->name;
        $c->author_id = Auth::user()->id; 
        $c->post_id = $post->id;
        $c->save();
        
        
        //$comments = Comment::get();

        session()->flash('message', 'Comment posted.');
        $comments = $this->comments;
        //problem is comments only get updated once we refresh the page
        //because thats when we get all the comments so we
        //need to get the comments in here somehow
        //dd($comments);
    }

    public function render()
    {
        $this->comments = Comment::get();
        return view('livewire.comment-livewire');
    }
}
