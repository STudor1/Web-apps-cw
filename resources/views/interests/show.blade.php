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
        <form method="POST" action="{{ route('interests.update', [$interest->id]) }}" >
            @csrf
            @method('PUT')
            <input type="submit" value="Join">
        </form>
    @endif
    
    <br>

    <p><a href="{{ route('interests.index') }}" class="btn btn-primary">Back</a></p>

@endsection