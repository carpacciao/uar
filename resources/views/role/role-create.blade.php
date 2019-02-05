@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Roles create</h1>
@stop

@section('content')
<div class="container">
  <form action="{{route('role.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Role</label>
      <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="{{old('role')}}" name="role" placeholder="role">
    </div> 
    <button class="btn btn-success" type="submit">Valider</button>
  </form>
</div>
@stop