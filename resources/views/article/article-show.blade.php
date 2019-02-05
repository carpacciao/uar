@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Articles</h1>
@stop
@section('content')
<div class="container">
  <div class="card m-auto" style="width: 18rem;">
      <div class="card-body">
          <img src="{{Storage::disk('post_image')->url($article->image)}}" alt="" class="card-img-top">
          <h5 class="card-title">{{$article->title}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$article->user->email}}</h6>
          <p class="card-text">{{$article->text}}</p>
      </div>
  </div>
</div>
@stop
