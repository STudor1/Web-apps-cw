@extends('layouts.basic')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('users.update', [$post->id]) }}">
        @csrf
        @method('PUT')
        <p>Title: <input type="text" name="title" 
            value="{{ $post->title }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ $post->content }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
@endsection