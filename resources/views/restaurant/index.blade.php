@extends('adminlte::page')

@section('title', 'Restaurantes')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Restaurantes</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Restaurante</button>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center" id="table">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $restaurant->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $restaurant->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('restaurant.modals.update')
                    @include('restaurant.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('restaurant.modals.create')
@stop
