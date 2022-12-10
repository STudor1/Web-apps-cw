@extends('layouts.basic')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Content: <input type="text" name="name" 
            value="{{ old('name') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
@endsection