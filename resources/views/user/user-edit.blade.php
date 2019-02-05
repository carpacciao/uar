@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Edit {{$user->email}}</h1>
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
    <form action="{{route('user.update', ['user' => $user->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">&nbsp;@&nbsp;</div>
            </div>
            <input type="text" value="{{$user->email}}" class="form-control {{$errors->has('email')? 'border-danger' : '' }}"
                id="inlineFormInputGroupUsername" name="email" placeholder="">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-fw fa-lock"></i></div>
            </div>
            <input type="password" class="form-control {{$errors->has('password')? 'border-danger' : '' }}" id="inlineFormInputGroupUsername"
                name="password" placeholder="password">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-fw fa-lock"></i></div>
            </div>
            <input type="password" class="form-control {{$errors->has('password')? 'border-danger' : '' }}" id="inlineFormInputGroupUsername"
                name="password_confirmation" placeholder="password_confirmation">
        </div>
        <br>
        @can('admin', $user)

        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
            </div>
            <select class="custom-select {{$errors->has('role')? 'border-danger' : '' }}" name="role">
                @foreach ($roles as $role)
                <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        @endcan
        <br>
        <button class="btn btn-success">Valider</button>
    </form>
</div>
@stop
