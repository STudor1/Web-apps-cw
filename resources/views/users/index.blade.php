@extends('layouts.basic')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Profile</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{--
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User Details
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li> &nbsp;&nbsp; User: {{ Auth::user()->name }}</li>
                        <li> &nbsp;&nbsp; {{ Auth::user()->email }}</li>
                        <li> &nbsp;&nbsp; TESTING ID: {{ Auth::user()->id }}</li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                    
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

@section('title', 'Home Page')
    
@section('content')
    

    <p> Posts: </p>

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('users.show', [$post->id]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('users.create') }}" class="btn btn-primary">Create Post </a>

    <br>
    <br>

    {{$posts->onEachSide(1)->links()}}

@endsection