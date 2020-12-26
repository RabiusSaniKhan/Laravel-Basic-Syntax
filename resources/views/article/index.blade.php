@extends('layout.app')
@section('title','Articles')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>All article</h1>
            <a class="btn-primary btn" href="{{route('article.create')}}">Create article</a>
        </div>
        <div class="card-body p-0">
            @foreach($articles as $article)
                <div class="card mt-2">
                    <div class="card-header">
                        <a href="/article/{{$article->id}}">
                            <h2>{{$article->title}}</h2>
                        </a>
                    </div>
                    <div class="card-body">
                        <h3>Excerpt:</h3>
                        <p>{{$article->excerpt}}</p>
                        <h3>Body:</h3>
                        <p>{{$article->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
