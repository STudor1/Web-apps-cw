@extends('layouts.basic')

@section('title', $post->title)

@section('content')
    Notes: 
    @foreach ($post->notes as $note)
        {{$note->body}}
    @endforeach
    @if ($user_role == 'admin')
        <a href="{{ route('notes.create', [$post->id]) }}" class="btn btn-primary">Add Note</a>
    @endif

    <br>
    <br>

    <p> Title: {{$post->title}} </p>

    @if ($post->image_name != null)
        <ul>
            <img src="{{asset('storage/'.$post->image_name)}}">
        </ul>
    @endif
    
    <ul>
        <li> Author: 
            @if ($post->user->name)
                <a href="{{ route('profiles.show', [$post->user->id]) }}"> {{$post->user->name}} </a> 
            @else 
                Unknown     
            @endif
        </li>
        <li> Content: {{$post->content}} </li>
    </ul>

    <p>Comments</p>
    @livewire('comment-livewire', ['post' => $post])

    <br>

    @if($post->user_id == $id_user or $user_role == 'admin')
        <form method="POST"
            action="{{ route('users.destroy', [$post->id]) }}">
            @csrf
            @method('DELETE')
            <button type="Submit" style="background-color: rgb(192, 88, 88); color: white">Delete Post</button>
        </form>

        <a href="{{ route('users.edit', [$post->id]) }}" class="btn btn-primary">Edit</a>
    @endif

    <br>
    <br>
    
    <p><a href="{{ route('users.index') }}" class="btn btn-primary">Back</a></p>

@endsection