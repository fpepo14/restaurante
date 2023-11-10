
@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>{{ $restaurant->name }}</h1>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <div class="col-12">
        <table class="table table-bordered text-center">
            <thead class="bg-primary">
                <th>ID</th>
                <th>Mesa</th>
                <th>Mozo</th>
                <th>Estado</th>
                <th>Fecha y Hora</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->table->name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ Route('detailOrder', $order->id) }}" class="btn btn-info">Detalle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop