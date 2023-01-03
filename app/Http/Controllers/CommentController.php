<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //
        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
        $validatedData = $request->validate([
            'content' => 'required|max:500',
        ]);

        $c = new Comment;
        $c->content = $validatedData['content'];
        $c->author = Auth::user()->name;
        $c->author_id = Auth::user()->id; 
        $c->post_id = $post->id;
        $c->save();

        session()->flash('message', 'The comment was created.');
        return redirect()->route('users.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        //
        return view('comments.edit', ['post' => $post, 'comment' => $comment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        //
        $comment->content = $request->input('content');
        $comment->update();

        //If an admin edits your comment then you get notified
        //Also, if another admin edits the comment of another admin they get notifed but not if you as an admin edit your own comment
        if(Auth::user()->role == 'admin' and Auth::user()->id != $comment->author_id){
            $user = User::find($comment->author_id);
            $user->notify(new \App\Notifications\CommentEdited($post->id));
        }

        session()->flash('message', 'The comment was updated successfully.');
        return redirect()->route('users.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        //
        $comment->delete();

        return redirect()->route('users.show', ['post' => $post])->with('message', 'Comment was deleted.');
    }
}
