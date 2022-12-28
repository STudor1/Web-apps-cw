@extends('layouts.basic')

@section('title', 'Home Page')
    
@section('content')
    <div class="card w-100" style="width: 18rem;">
        <div class="card-header">
            Posts:
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($posts as $post)
                <div class="card">
                    <li class="list-group-item"><a href="{{ route('users.show', [$post->id]) }}">{{ $post->title }}</a></li>
                </div>
            @endforeach
        
        </ul>
    </div>
    

    <a href="{{ route('users.create') }}" class="btn btn-primary">Create Post </a>

    <br>
    <br>

    {{$posts->onEachSide(1)->links()}}

@endsection