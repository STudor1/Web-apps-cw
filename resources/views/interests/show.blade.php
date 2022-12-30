@extends('layouts.basic')

@section('title', $interest->interest)

@section('content')
    
    Users interested in {{$interest->interest}}:
    @foreach ($interest->users as $user)
        {{--<li> {{$user->pivot->user_id}}</li>--}}
        <li> {{$user->name}} </li>
    @endforeach

    <br>
    <p><a href="{{ route('interests.index') }}" class="btn btn-primary">Back</a></p>

@endsection