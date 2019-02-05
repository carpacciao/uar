@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">links</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="3">
          <a href="{{route('role.create')}}" style="display:block;" class="btn btn-success d-block {{Auth::user()->can('create', App\User::class) ? '' : 'disabled' }}">Ajouter un role</a>
        </td>
      </tr>
        @foreach ($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>

                    <a href="{{route('role.show', ['role' => $role->id])}}" class="btn btn-primary btn-sm">show</a>
                    <a href="{{route('role.edit', ['role' => $role->id])}}" class="btn btn-warning btn-sm text-white">edit</a>
                    <form action="{{route('role.destroy', ['role' => $role->id])}}" style="display: inline" method="POST">
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