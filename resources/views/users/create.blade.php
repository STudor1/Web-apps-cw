@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Title: <input type="text" name="title" 
            value="{{ old('title') }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ old('content') }}"></p>
        <p>Upload an image <input type="file" name="image" 
            value="{{ old('image') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection