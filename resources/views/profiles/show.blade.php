@extends('layouts.basic')

@section('title', $user->name)

@section('content')
    <p>Posts:</p>
    <ul>
        @foreach ($posts as $post)
            @if ($user->id == $post->user_id)
                <li><a href="{{ route('users.show', [$post->id]) }}">{{ $post->title }}</a></li>
            @endif
        @endforeach
    </ul>

    <p>Comments:</p>
    <ul>
        @foreach ($comments as $comment)
            @if ($user->id == $comment->author_id)
                <li>{{ $comment->content }}</li>
            @endif
        @endforeach
    </ul>

@endsection