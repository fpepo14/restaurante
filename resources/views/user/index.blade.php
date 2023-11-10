@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Listado de Usuarios</h1>
        </div>
    </div> 
    <div class="col-12">
        <p>
            <strong class="text-danger">¡PARA MODIFICAR, ELIMINAR O CREAR UN USUARIO CONTACTE AL SOPORTE TECNICO!</strong>
        </p>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Restaurante</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->restaurant->name }}</td>
                    </tr>
                 
                @endforeach
            </tbody>
        </table>
    </div>
@stop


