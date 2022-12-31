@extends('layouts.basic')

@section('title', 'Add interest')

@section('content')
    <form method="POST" action="{{ route('interests.store') }}">
        @csrf
        <p>Interest Name: <input type="text" name="interest" 
            value="{{ old('interest') }}"></p>
        
        <input type="submit" value="Submit">
        <a href="{{ route('interests.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection