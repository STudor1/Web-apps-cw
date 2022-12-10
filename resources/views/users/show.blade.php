@extends('layouts.basic')

@section('title', $post->name)

@section('content')
    <ul>
        <li> Content: {{$post->name}} </li>
    </ul>

@endsection