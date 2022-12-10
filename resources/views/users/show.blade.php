@extends('layouts.basic')

@section('title', $post->name)

@section('content')
    <ul>
        <li> Content: {{$post->name}} </li>
    </ul>

    <form method="POST"
        action="{{ route('users.destroy', ['id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="Submit">Delete</button>
    </form>

    <p><a href="{{ route('users.index') }}">Back</a></p>

@endsection