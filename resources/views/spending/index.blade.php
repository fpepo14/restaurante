@extends('adminlte::page')

@section('title', 'Gastos')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Gastos</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Gasto</button>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Monto</th>
                    <th>Restaurante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($spendings as $spending)
                    <tr>
                        <td>{{ $spending->id }}</td>
                        <td>{{ $spending->name }}</td>
                        <td>{{ $spending->amount }}</td>
                        <td>{{ $spending->restaurant->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $spending->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $spending->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('spending.modals.update')
                    @include('spending.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('spending.modals.create')
@stop