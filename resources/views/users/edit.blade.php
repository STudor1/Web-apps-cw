@extends('layouts.basic')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('users.update', [$post->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>Title: <input type="text" name="title" 
            value="{{ $post->title }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ $post->content }}"></p>
        <p>Upload an image <input type="file" name="image" 
            value="{{ $post->image }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.show', [$post->id]) }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection