@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Mesa: {{ $table->name }} <br>
                    Restaurante: {{ $table->restaurant->name }} <br>
                </div>

                <div class="card-body">
                <section>
                    <div class="col-12">
                            <table class="table table-bordered col-12 text-center">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>N° Orden</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        @if($order->status != 'CERRADA')
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <a href="{{ Route('showOrder', $order->id) }}" class="btn btn-info">Detalle</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>                   
                        <a href="{{ Route('createOrder', $table->id) }}" class="btn btn-success col-12 m-1">Crear Orden</a>
                        <a href="/home" class="btn btn-secondary col-12 m-1">Regresar</a>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
