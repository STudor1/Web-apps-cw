@extends('layouts.basic')

@section('title', 'Update your description')

@section('content')
    <form method="POST" action="{{ route('descriptions.update', [$description->id]) }}">
        @csrf
        @method('PUT')
        <p>New Description: <input type="text" name="description" 
            value="{{ $description->description }}"></p>

        <input type="submit" value="Submit">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection