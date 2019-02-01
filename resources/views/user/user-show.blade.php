@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>show {{$user->email}}</h1>
@stop

@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">{{$user->email}}</li>
        <li class="list-group-item">{{$user->password}}</li>
        <li class="list-group-item">{{$role->name}}</li>
    </ul>
</div>
@stop