@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Article create</h1>
@stop

@section('content')


<div class="container">
    @if($errors->any())
    <div class="alert alert-danger px-5">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('title')}}" name="title" placeholder="Firstname">
        </div>        
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" class="form-control" disabled value="{{Auth::user()->email}}">
        </div>             
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="text" class="form-control" id="" cols="30" rows="10" placeholder="Content...">{{old('text')}}</textarea>
        </div>             
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" id="inlineFormInputGroupUsername" value="{{old('image')}}" name="image" placeholder="Picture">
        </div>  
        <button class="btn btn-success">Valider</button>      
    </form>
</div>

@stop