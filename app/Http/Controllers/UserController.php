<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(5);
        return view('users.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'image' => 'nullable|max:500',
            'title' => 'required|max:150',
            'content' => 'required|max:2000',
        ]);

        $p = new Post;
        $p->image = $validatedData['image']; 
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->user_id = 1000; #this is for testing purposes will have to get the id of the user when making a post later
        $p->save();

        session()->flash('message', 'The post was created.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('users.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        //$post = Post::find($post);
        //return "Not yet";
        return view('users.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->image = $request->input('image');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->update();

        session()->flash('message', 'The post was updated successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('users.index')->with('message', 'Post was deleted.');
    }
}
