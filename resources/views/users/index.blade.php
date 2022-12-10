@extends('layouts.basic')

@section('title', 'Home Page')
    
@section('content')
    <p> Posts: </p>

    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->name }}</li>
        @endforeach
    </ul>

    {{$posts->onEachSide(1)->links()}}

@endsection