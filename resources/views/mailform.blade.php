@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>mail create</h1>
@stop

@section('content')
<div class="container">
  <form action="{{route('mail.post')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">nom</label>
      <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('nom')}}" name="nom" placeholder="role">
    </div> 
    <div class="form-group">
      <label for="">email</label>
      <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('email')}}" name="email" placeholder="role">
    </div> 
    <button class="btn btn-success" type="submit">Valider</button>
  </form>
</div>
@stop