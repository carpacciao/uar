@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit {{$profile->user->email}}</h1>
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
  <form action="{{route('profile.update', ['profile' => $profile->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="form-group">
            <label for="">Firstname</label>
            <input type="text" class="form-control" value="{{$profile->firstname}}" id="inlineFormInputGroupUsername" name="firstname" placeholder="Firstname">
        </div>        
        <div class="form-group">
            <label for="">Lastname</label>
            <input type="text" class="form-control" value="{{$profile->lastname}}" id="inlineFormInputGroupUsername" name="lastname" placeholder="Lastname">
        </div>        
        <div class="form-group">
            <label for="">gsm</label>
            <input type="text" class="form-control" value="{{$profile->gsm}}" id="inlineFormInputGroupUsername" name="gsm" placeholder="GSM">
        </div>        
        <div class="form-group">
            <label for="">Birthday</label>
            <input type="date" class="form-control" value="{{$profile->birthday}}" id="inlineFormInputGroupUsername" name="birthday">
        </div>        
        <div class="form-group">
            <label for="">Picture</label>
            <input type="file" class="form-control" value="{{$profile->picture}}" id="inlineFormInputGroupUsername" name="picture" placeholder="Picture">
        </div>  
        <button class="btn btn-success">Valider</button>     
  </form>
</div>
@stop