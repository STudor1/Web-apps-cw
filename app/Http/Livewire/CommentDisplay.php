<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class CommentDisplay extends Component
{
    public Post $post;
    public Comment $comment;

    public function display(Post $post, Comment $comment)
    {
       
        
    }

    public function render()
    {
        return view('livewire.comment-display');
    }
}
