@extends('layouts.basic')

@section('title', $interest->interest)

@section('content')
    
    Users interested in {{$interest->interest}}:
    
    <p><a href="{{ route('interests.index') }}" class="btn btn-primary">Back</a></p>

@endsection