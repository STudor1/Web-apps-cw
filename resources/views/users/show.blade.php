@extends('layouts.basic')

@section('title', $post->title)

@section('content')
    <p> Title: {{$post->title}} </p>

    <ul>
        <img src="{{asset('storage/'.$post->image_name)}}">
    </ul>
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
    <p><a href="{{ route('comments.create', [$post->id]) }}" class="btn btn-primary">Add Comment</a>


    <form method="POST"
        action="{{ route('users.destroy', [$post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="Submit">Delete Post</button>
    </form>

    

    <p><a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    <a href="{{ route('users.edit', [$post->id]) }}" class="btn btn-primary">Edit</a></p>

@endsection