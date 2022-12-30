@extends('layouts.basic')

@section('title', $interest->interest)

@section('content')
    
    Users interested in {{$interest->interest}}:
    @foreach ($interest->users as $user)
        {{--<li> {{$user->pivot->user_id}}</li>--}}
        <li> {{$user->name}} </li>
        
        @if ($id_user == $user->id)
            {{$interested = true}}
        @else
            {{$interested = false}}
        @endif
    @endforeach

    <br>
    {{--if not joined show button--}}
    @if ($interested == false)  
        {{--when i press this i take the user id and add it to pivot table along with the interest id--}}
        <p><a href="#" class="btn btn-dark">Join</a></p>
    @endif
    <p><a href="{{ route('interests.index') }}" class="btn btn-primary">Back</a></p>

@endsection