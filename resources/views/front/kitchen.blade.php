@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="col-12">
                    <div class="row">
                            <div class="card-header text-center col-4 h4">Cocina</div>
                            <a href="{{ Route('incomes') }}" class="btn btn-success col-2">Ingresos</a>
                            <a href="{{ Route('spendings') }}" class="btn btn-warning col-2">Gastos</a>
                            <a href="{{ Route('stock') }}" class="btn btn-danger col-2">Stock</a>
                            <a href="{{ Route('reportForm') }}" class="btn btn-info text-white col-2">Reporte</a>
                    </div>
                </div>
                <div class="card-body text-center">
                <section>
                    <div class="col-12">
                        <h5>Ordenes por Preparar</h5>
                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N° Orden</th>
                                    <th>Mesa</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    @if($order->status == 'ENVIADA')
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->table->id }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ Route('showOrder', $order->id) }}" class="btn btn-info">Detalle</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h5>Ordenes Por Cobrar</h5>
                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N° Orden</th>
                                    <th>Mesa</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    @if($order->charged == false)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->table->id }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#chargeModal{{ $order->id }}">Cobrar</button>
                                            </td>
                                        </tr>
                                    @endif
                                    @include('front.modals.charge')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  //Cuando la página esté cargada completamente
  $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 50000);
  });
  function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>
@endsection