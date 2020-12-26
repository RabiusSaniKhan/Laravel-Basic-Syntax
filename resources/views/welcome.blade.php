@extends('layout.app')
@section('title','First')
@section('content')
    <h2 class="m-5 text-success text-center">Welcome to New practice laravel app</h2>
    <a class="btn-primary btn" href="{{route('article.index')}}">Article management</a>
@endsection
