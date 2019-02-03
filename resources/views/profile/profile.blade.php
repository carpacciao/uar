@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Profiles</h1>
@stop

@section('content')
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Picture</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">GSM</th>
        <th scope="col">Birthday</th>
        <th scope="col">User_id</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="8">
          <a href="{{route('profile.create')}}" style="display:block;" class="btn btn-success d-block">Créer son profile</a>
        </td>
      </tr>
        @foreach ($profiles as $profile)
            <tr>
                <th scope="row">
                    <div class="picture_profile">
                        <img src="{{Storage::disk('pictures')->url($profile->picture)}}" alt="">
                    </div>
                </th>
                <td>{{$profile->firstname}}</td>
                <td>{{$profile->lastname}}</td>
                <td>{{$profile->gsm}}</td>
                <td>{{$profile->birthday}}</td>
                <td>{{$profile->user_id}}</td>
                <td>
                    <a href="{{route('profile.show', ['user' => $profile->id])}}" class="btn btn-primary btn-sm">show</a>
                    <a href="{{route('profile.edit', ['user' => $profile->id])}}" class="btn btn-warning btn-sm text-white">edit</a>
                    <form action="{{route('profile.destroy', ['user' => $profile->id])}}" style="display: inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop