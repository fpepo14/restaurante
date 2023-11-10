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
                            <div class="col-8">Gastos</div>
                            <div class="col-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                <section>
                   <table class="table col-12 table-bordered text-center">
                       <thead class="bg-primary text-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Monto</th>
                            </tr>
                       </thead>
                       <tbody>
                            @foreach($spendings as $spending)
                                    <tr>
                                        <td>{{ $spending->name }}</td>
                                        <td>{{ $spending->amount }}</td>
                                    </tr>
                            @endforeach
                       </tbody>
                   </table>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@include('spending.modals.create')
@endsection