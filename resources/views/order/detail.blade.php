@extends('adminlte::page')

@section('title', 'Ordenes')

@section('content_header')
    <div class="row">
        <div class="col-11">
            <h1>
                Orden N° {{ $order->id }}
                @if($order->status == 'ANULADA')
                    <strong class="text-danger">(ANULADA)</strong>
                @endif
            </h1> 
        </div>
        <div class="col-1">
        <a href="/ordenes" class="btn btn-secondary">Volver</a>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center mb-4">
            <thead class="bg-info">
                <tr>
                    <th>Restaurante</th>
                    <th>Mesa</th>
                    <th>Mozo</th>
                    <th>Estado</th>
                    <th class="bg-success">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $order->table->restaurant->name }}</td>
                        <td>{{ $order->table->name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->total }}</td>
                    </tr>
            </tbody>
        </table>
        <div class="col-12">
            <h4>Productos:</h4>
        </div>
        <div class="col-12">
            <table class="table table-bordered text-center">
                <thead class="bg-info">
                    <tr>
                        <th>N° Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->pivot->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->pivot->quanty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <h4>Alterar Estado de Orden:</h4>
                        <form action="{{ Route('changeOrderStatus', $order->id) }}" method="POST" class="form-group mt-4">
                            @csrf
                            @method('POST')
                            <select class="form-control col-12 mb-2" name="status">
                                <option value="{{ $order->status }}">{{ $order->status }}</option>
                                <option value="ANULADA">ANULADA</option>
                                <option value="ENTREGADA">ENTREGADA</option>
                                <option value="ENVIADA">ENVIADA</option>
                                <option value="PENDIENTE">PENDIENTE</option>
                                <option value="PREPARADA">PREPARADA</option>
                            </select>
                            <button class="btn btn-success col-12">Actualizar</button>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <h4>Total de la Orden:</h4>
                    </div>
                    <div class="col-12">
                        @if($order->charged == true)
                        <div class="col-12 my-3 text-center text-success">
                            <h2>S/{{ $order->total }}</</h2>
                        </div>
                        <div class="col-12 my-3">
                            <h4>Medio de Pago:</h4>
                            @if($order->paymentMethod != null)
                            <h2 class="text-center text-danger">{{ $order->paymentMethod->name }}</h2>
                            @else
                            <h2 class="text-cemter text-danger">Sin Medio de Pago</h2>
                            @endif
                        </div>
                        @else
                        <div class="alert alert-warning text-center mt-4" role="alert">
                        ¡La Orden debe cobrarse para guardar el total!
                        </div>
                        @endif                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop