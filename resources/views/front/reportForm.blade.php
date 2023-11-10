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
                <div class="col-12">
                    <form action="{{ Route('reportForDay') }}" method="POST" class="form-group">
                        @csrf
                        @method('POST')
                        <h3 class="text-center">Reporte por Dia</h3>
                        <br>
                        <input type="date" name="from" class="form-control">
                        <br>
                        <input type="date" name="to" class="form-control">
                        <br>
                        <input type="hidden" name="restaurant_id" value="1">
                        <br>
                        <button class="btn btn-success col-12">Consultar</button>
                    </form>
                </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection