@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('comments.store', [$post->id]) }}">
        @csrf
        <p>Content: <input type="text" name="content" 
            value="{{ old('content') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection