@extends('layout.app')
@section('title','Articles show')
@section('content')
    <div class="card mt-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>{{$article->title}}</h2>
            <a class="btn btn-primary" href="/article/{{$article->id}}/edit">Edit article</a>
        </div>
        <div class="card-body">
            <h3>Excerpt:</h3>
            <p>{{$article->excerpt}}</p>
            <h3>Body:</h3>
            <p>{{$article->body}}</p>
        </div>
        @if(count($article->tags->pluck('name'))!=0)
        <div class="card-footer d-flex align-items-center">
            <strong class="text-info">Tags: </strong>
            @foreach($article->tags as $tag)
            <a class="btn btn-link" href="{{route('article.index',['tag'=>$tag->id])}}">{{$tag->name}}</a>
                @endforeach
        </div>
            @endif
    </div>
@endsection
