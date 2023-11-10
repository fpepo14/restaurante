@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                            <div class="col-2">
                                <a href="/cocina" class="btn btn-secondary">Volver</a>
                            </div>
                            <div class="col-8">Reporte</div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                <section>
                   <h3>Medios de Pago</h3>
                   <table class="table col-12 table-bordered text-center">
                       <thead class="bg-primary text-light">
                            <tr>
                                <th class="col-6">Nombre</th>
                                <th>Total</th>
                            </tr>
                       </thead>
                       <tbody>
                            @foreach($paymentMethodCollection as $paymentMethod)
                                <tr>
                                    <td>{{ $paymentMethod['name'] }}</td>
                                    <td>{{ $paymentMethod['total'] }}</td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
                   <br>
                   <h3>Resumen Financiero de {{ $restaurant->name }}</h3>
                   <table class="table col-12 table-bordered text-center">
                       <thead class="bg-primary text-light">
                            <tr>
                                <td>Concepto</td>
                                <td>Monto</td>
                            </tr>
                       </thead>
                       <tbody>
                        <tr>
                            <th class="col-6">Ingresos</th>
                            <td class="bg-success text-light"><h4>{{ $totalGain }}</h4></td>
                        </tr>
                        <tr>
                            <th>Gastos</th>
                            <td class="bg-danger text-light"><h4>{{ $totalSpendings }}</h4></td>
                        </tr>
                        <tr>
                            <th>Balance General</th>
                            <td class="bg-info text-dark"><h4>{{ $generalBalance }}</h4></td>
                        </tr>
                        <tr>
                            <th>Efectivo en Caja</th>
                            <td class="bg-warning text-dark"><h4>{{ $cash }}</h4></td>
                        </tr>
                        </tbody>
                   </table>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection