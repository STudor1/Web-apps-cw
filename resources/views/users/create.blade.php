@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Title: <input type="text" name="title" 
            value="{{ old('title') }}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{ old('content') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
@endsection