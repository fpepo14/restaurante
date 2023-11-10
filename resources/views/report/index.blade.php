@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Reportes</h1>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <br>
        <br>
        <div class="col-12">
                    <form action="{{ Route('ordersForRestaurant') }}" method="POST" class="form-group">
                        @csrf
                        @method('POST')
                        <h3 class="text-center">Ordenes Por Restaurante</h3>
                        <br>
                        <input type="date" name="from" class="form-control">
                        <br>
                        <input type="date" name="to" class="form-control">
                        <br>
                        <select name="restaurant_id" class="form-control">
                            <option value="">---- Selecciona un Restaurante ----</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-success col-12">Consultar</button>
                    </form>
        </div>
    </div>
@stop