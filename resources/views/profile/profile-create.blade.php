@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>User create</h1>
@stop

@section('content')

@if ($profile == 0)
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
    <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Firstname</label>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('firstname')}}" name="firstname" placeholder="Firstname">
        </div>        
        <div class="form-group">
            <label for="">Lastname</label>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('lastname')}}" name="lastname" placeholder="Lastname">
        </div>        
        <div class="form-group">
            <label for="">gsm</label>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('gsm')}}" name="gsm" placeholder="GSM">
        </div>        
        <div class="form-group">
            <label for="">Birthday</label>
            <input type="date" class="form-control" id="inlineFormInputGroupUsername" value="{{old('birthday')}}" name="birthday">
        </div>        
        <div class="form-group">
            <label for="">Picture</label>
            <input type="file" class="form-control" id="inlineFormInputGroupUsername" value="{{old('picture')}}" name="picture" placeholder="Picture">
        </div>  
        <button class="btn btn-success">Valider</button>      
    </form>
</div>
    
@else
<div class="container">
    <h1>Vous avez déjà un compte</h1>
</div>
@endif
@stop