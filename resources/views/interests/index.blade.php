@extends('layouts.basic')

@section('title', 'Interests Page')
    
@section('content')
    <div class="card w-100" style="width: 18rem;">
        <div class="card-header">
            Interests:
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($interests as $interest)
                <div class="card">
                    <li class="list-group-item"><a href="{{ route('interests.show', [$interest->id]) }}">{{ $interest->interest }}</a></li>
                </div>
            @endforeach
        
        </ul>
    </div>
    
    {{--<a href="{{ route('users.create') }}" class="btn btn-primary">Create Post </a>--}}
    @if($user_role == 'admin')
        <br>
        <a href="{{ route('interests.create') }}" class="btn btn-primary">Add an interest </a>
    @endif

    <br>
    <br>

    <ul class="pagination justify-content-center">
        {{$interests->onEachSide(1)->links()}}
    </ul
    

@endsection