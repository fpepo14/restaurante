@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Mesas</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nueva Mesa</button>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Restaurante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $table)
                    <tr>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->restaurant->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $table->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $table->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('table.modals.update')
                    @include('table.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('table.modals.create')
@stop


