@extends('layouts.basic')

@section('title', $post->title)

@section('content')
    <ul>
        <li> Title: {{$post->title}} </li>
        <li> Content: {{$post->content}} </li>
    </ul>

    <form method="POST"
        action="{{ route('users.destroy', [$post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="Submit">Delete</button>
    </form>

    <p><a href="{{ route('users.index') }}">Back</a></p>
    <p><a href="{{ route('users.edit', [$post->id]) }}">Edit</a></p>

@endsection