@extends('layouts.basic')

@section('title', 'Edit Comment')

@section('content')
    <form method="POST" action="{{ route('comments.update', [$post->id, $comment->id]) }}">
        @csrf
        @method('PUT')
        <p>Content: <input type="text" name="content" 
            value="{{ $comment->content }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.show', [$post->id]) }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection