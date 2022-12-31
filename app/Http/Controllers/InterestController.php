<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use App\Models\User;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_role = Auth::user()->role;
        $interests = Interest::paginate(20);
        return view('interests.index', ['interests' => $interests, 'user_role' => $user_role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('interests.create');
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
            'interest' => 'required|max:50',
        ]);

        $i = new Interest;
        $i->interest = $validatedData['interest'];
        $i->save();

        session()->flash('message', 'The interest was created.');
        return redirect()->route('interests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
        //$comments = Comment::get(); 
        $id_user = Auth::user()->id;
        //return view('interests.show', ['post' => $post, 'comments' => $comments, 'id_user' => $id_user, 'user_role' => $user_role]);
        return view('interests.show', ['interest' => $interest, 'id_user' => $id_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interest $interest)
    {
        //
        $user_id = Auth::user()->id;
        $interest->users()->attach($user_id);
        return redirect()->route('interests.show', ['interest' => $interest]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
