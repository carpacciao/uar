@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>show {{$profile->lastname}}</h1>
@stop

@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">{{$profile->lastname}}</li>
        <li class="list-group-item">{{$profile->firstname}}</li>
        <li class="list-group-item">{{$profile->gsm}}</li>
        <li class="list-group-item">{{$profile->birthday}}</li>
        <li class="list-group-item">{{$profile->user_id}} ---- {{$profile->user->email}}</li>
        <li class="list-group-item"><img style="max-width: 100%;" src="{{Storage::disk('pictures')->url($profile->picture)}}" alt=""></li>
    </ul>
</div>
@stop