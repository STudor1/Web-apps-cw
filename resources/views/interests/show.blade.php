@extends('layouts.basic')

@section('title', $interest->interest)

@section('content')
    {{--this prints 1 cause it is true no idea how to fix it--}}
    {{$interested = true}}
    Users interested in {{$interest->interest}}:
    @foreach ($interest->users as $user)
        {{--<li> {{$user->pivot->user_id}}</li>--}}
        <li> {{$user->name}} </li>
        
        @if ($id_user == $user->id)
            {{--this prints 1 cause it is true no idea how to fix it--}}    
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