@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Roles create</h1>
@stop

@section('content')
<div class="container">
    <h2>Role's name: {{$role->name}}</h2>
</div>
@stop