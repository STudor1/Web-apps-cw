@extends('layouts.basic')

@section('title', $user->name)

@section('content')
    <p>Description:</p>
    <p>
        @foreach ($descriptions as $description)
            @if ($user->id == $description->user_id)
                {{ $description->description }}
            @endif
        @endforeach
    </p>

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