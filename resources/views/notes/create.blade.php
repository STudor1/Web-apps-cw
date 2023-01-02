@extends('layouts.basic')

@section('title', 'Create Note')

@section('content')
    <form method="POST" action="{{ route('notes.store', [$post->id]) }}">
        @csrf
        <p>Content: <input type="text" name="body" 
            value="{{ old('body') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.show', [$post->id]) }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection