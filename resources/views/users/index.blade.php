@extends('layouts.basic')

<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
    <div class="px-4">
        <div class="font-medium text-base text-gray-800">User: {{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">Email: {{ Auth::user()->email }}</div>
        <!-- HERE FOR TESTING -->
        <div class="font-medium text-sm text-gray-500">ID: {{ Auth::user()->id }}</div>
    </div>

    <div class="mt-3 space-y-1">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
</div>

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