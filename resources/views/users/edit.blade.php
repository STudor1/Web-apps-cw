@extends('layouts.basic')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('users.update', [$post->id]) }}">
        @csrf
        @method('PUT')
        <p>Image Link: <input type="text" name="image" 
            value="{{ $post->image }}"></p>
        <p>Title: <input type="text" name="title" 
            value="{{ $post->title }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ $post->content }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.show', [$post->id]) }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection