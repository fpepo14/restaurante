@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    N° Orden: {{ $order->id }} <br>
                    Restaurante: {{ $order->table->restaurant->name }} <br>
                    Mesa: {{ $order->table->name }} <br>
                    Mozo: {{ $order->user->name }}
                </div>

                <div class="card-body">
                @if($order->status == 'PENDIENTE')
                <section>
                <div class="col-12 mb-4">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle col-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Acciones de Orden
                            </button>
                            <div class="dropdown-menu col-12" aria-labelledby="dropdownMenuButton">
                                <a href="{{ Route('requestedOrder', $order->id) }}" class="btn btn-primary col-12 my-1">Enviar a Cocina</a>
                            </div>
                        </div>
                </div>
                    <div class="col-12">
                        <form action="{{ Route('addProduct', $order->id) }}" class="form-group" method="POST">
                            @csrf
                            @method('POST')
                                <div class="col-12">
                                    <select name="product_id" class="form-control">
                                        <option value="">Buscar Producto</option>                                        
                                        @foreach($products as $product)
                                            @if($product->stock > 0)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach                                       
                                    </select>
                                    <br>
                                    <input type="number" name="quanty" class="form-control" placeholder="Cantidad">
                                </div>
                                <br>
                                <div class="col-12">
                                    <button class="btn btn-warning col-12 my-2">Agregar</button>
                                </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->pivot->quanty }}</td>
                                        <td>
                                            <a href="{{ Route('removeProduct', [$order->id, $product->pivot->id]) }}" class="btn btn-danger">Quitar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                @elseif($order->status == 'ANULADA')
                <section>
                    <div class="col-12">
                    <div class="alert alert-danger text-center" role="alert">
                        La Orden Ha Sido {{ $order->status }}
                    </div>
                    <a href="/home" class="btn btn-secondary col-12">Regresar</a>
                    </div>
                </section>
                @elseif($order->status == 'ENTREGADA')
                <section>
                    <div class="col-12">
                    <div class="alert alert-success text-center" role="alert">
                        La Orden Ha Sido {{ $order->status }}
                    </div>
                    <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle col-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Acciones de Orden
                            </button>
                            <div class="dropdown-menu col-12" aria-labelledby="dropdownMenuButton">
                                <a href="{{ Route('closeOrder', $order->id) }}" class="btn btn-warning col-12 my-1">Cerrar Orden</a>
                                <a href="/home" class="btn btn-secondary col-12">Regresar</a>
                            </div>
                    </div>
                    </div>
                </section>
                @elseif($order->status == 'ENVIADA')
                <div class="col-12">
                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N° Producto</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->pivot->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quanty }}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(Auth::user()->type == 'COCINA')
                    <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle col-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Acciones de Orden
                            </button>
                            <div class="dropdown-menu col-12" aria-labelledby="dropdownMenuButton">
                                <a href="{{ Route('preparedOrder', $order->id) }}" class="btn btn-primary col-12 my-1">Marcar como Preparada</a>
                            </div>
                    </div>
                    @endif
                @elseif($order->status == 'PREPARADA')
                <div class="col-12">
                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N° Producto</th>
                                    <th>Nombre</th>
                                    <th>Volumen</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->pivot->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->volume }}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(Auth::user()->type == 'COCINA')
                    <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle col-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Acciones de Orden
                            </button>
                            <div class="dropdown-menu col-12" aria-labelledby="dropdownMenuButton">
                                <a href="{{ Route('deliverOrder', $order->id) }}" class="btn btn-success col-12 my-1">Entregar Orden</a>
                            </div>
                    </div>
                    @endif
                @endif                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
