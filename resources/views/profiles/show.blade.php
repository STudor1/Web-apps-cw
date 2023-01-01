@extends('layouts.basic')

@section('title', $user->name)

@section('content')
    
    <p>Description:</p>
    <p>
        @if ($description != null)
            {{$description->description}}
            @if ($description->user_id == $id_user)
                <a href="{{ route('descriptions.edit', [$description->id]) }}" class="btn btn-primary">Edit Description</a>
            @endif
        @else
            @if ($user->id == $id_user)
                <a href="{{ route('descriptions.create') }}" class="btn btn-primary">Add Description</a>
            @endif
        @endif
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