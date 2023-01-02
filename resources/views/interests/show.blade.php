@extends('layouts.basic')

@section('title', $interest->interest)

@section('content')
    Notes: 
    @foreach ($interest->notes as $note)
        {{$note->body}}
    @endforeach
    @if ($user_role == 'admin')
        <a href="{{ route('noteInterests.create', [$interest->id]) }}" class="btn btn-primary">Add Note</a>
    @endif
    {{--this prints 1 cause it is true no idea how to fix it--}}
    {{$interested = false}}
    <br>
    <br>
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

    @if ($user_role == 'admin')
        <form method="POST"
            action="{{ route('interests.destroy', [$interest->id]) }}">
            @csrf
            @method('DELETE')
            <button type="Submit" style="background-color: rgb(192, 88, 88); color: white">Delete Interest</button>
        </form>
    @endif

    <p><a href="{{ route('interests.index') }}" class="btn btn-primary">Back</a></p>

@endsection