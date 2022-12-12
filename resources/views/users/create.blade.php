@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Image Link: <input type="text" name="image" 
            value="{{ old('image') }}"></p>
        <p>Title: <input type="text" name="title" 
            value="{{ old('title') }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ old('content') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection