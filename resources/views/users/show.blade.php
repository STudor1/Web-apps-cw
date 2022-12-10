@extends('layouts.basic')

@section('title', $post->name)

@section('content')
    {{$post}}

@endsection