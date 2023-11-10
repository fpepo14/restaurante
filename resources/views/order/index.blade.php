@extends('adminlte::page')

@section('title', 'Ordenes')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Listado de Ordenes</h1>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Restaurante</th>
                    <th>Mesa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->table->restaurant->name }}</td>
                        <td>{{ $order->table->id }}</td>
                        <td>
                            <a href="{{ Route('detailOrder', $order->id) }}" class="btn btn-info">Detalle</a>
                        </td>
                    </tr>
       
                @endforeach
            </tbody>
        </table>
    </div>
@stop