@extends('layouts.basic')

@section('title', 'Create Interest Note')

@section('content')
    <form method="POST" action="{{ route('noteInterests.store', [$interest->id]) }}">
        @csrf
        <p>Content: <input type="text" name="body" 
            value="{{ old('body') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('interests.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection