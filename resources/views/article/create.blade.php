@extends('layout.app')
@section('title','Article create')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Create new article</strong>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('article.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-control" id="excerpt" rows="3" name="excerpt"></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Tags</label>
                    @foreach($tags as $tag)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}">{{$tag->name}}
                        </label>
                    </div>
                        @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="card-footer">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
