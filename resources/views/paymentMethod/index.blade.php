@extends('adminlte::page')

@section('title', 'Medios de Pago')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Medios de Pago</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Medio</button>
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
                @foreach($paymentMethods as $paymentMethod)
                    <tr>
                        <td>{{ $paymentMethod->id }}</td>
                        <td>{{ $paymentMethod->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $paymentMethod->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $paymentMethod->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('paymentMethod.modals.update')
                    @include('paymentMethod.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('paymentMethod.modals.create')
@stop