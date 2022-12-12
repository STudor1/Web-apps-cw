@extends('layouts.basic')

@section('title', $post->title)

@section('content')
    <ul>
        <li> Image: {{$post->image}} </li>
        <li> Title: {{$post->title}} </li>
        <li> Content: {{$post->content}} </li>
    </ul>

    <form method="POST"
        action="{{ route('users.destroy', [$post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="Submit">Delete</button>
    </form>

    <p><a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    <a href="{{ route('users.edit', [$post->id]) }}" class="btn btn-primary">Edit</a></p>

@endsection