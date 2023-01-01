@extends('layouts.basic')

@section('title', 'Create Description')

@section('content')
    <form method="POST" action="{{ route('descriptions.store') }}">
        @csrf
        <p>Description: <input type="text" name="description" 
            value="{{ old('description') }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection