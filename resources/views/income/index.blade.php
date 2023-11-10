@extends('adminlte::page')

@section('title', 'ingresos')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Ingresos</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Ingreso</button>
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
                @foreach($incomes as $income)
                    <tr>
                        <td>{{ $income->id }}</td>
                        <td>{{ $income->name }}</td>
                        <td>{{ $income->amount }}</td>
                        <td>{{ $income->restaurant->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $income->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $income->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('income.modals.update')
                    @include('income.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('income.modals.create')
@stop