@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Article 
    @can('create', App\Article::class)
    <a class="btn btn-success btn-sm" href="{{route('article.create')}}">Créer un article</a>
    @endcan
</h1>
@stop
@section('content')
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-4 mt-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{Storage::disk('post_image')->url($article->image)}}" alt="" class="card-img-top">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$article->user->email}}</h6>
                    <p class="card-text">{{$article->text}}</p>
                    <a href="{{route('article.show', ['article' => $article->id])}}" class="card-link">Show</a>
                    @can('update',$article)
                    <a href="{{route('article.edit', ['article' => $article->id])}}" class="card-link">Edit</a>
                    @endcan
                    @can('delete', $article)
                    <form style="display: inline;" action="{{route('article.destroy', ['article' => $article->id])}}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-4">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
