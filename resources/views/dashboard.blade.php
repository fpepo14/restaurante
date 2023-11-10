@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>¡Bienvenido {{ Auth::user()->name }}!</h1>
        </div>
    </div> 
@stop

@section('content')
    <div class="container col-12">
        <div class="row">
            <div class="col-3">
                <div class="col-12 bg-primary text-center p-5">
                    <h2>Ordenes</h2>
                    <h1><b>{{ $countOrders }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-success text-center p-5">
                    <h2>Ingresos</h2>
                    <h1><b>S/{{ $total }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-danger text-center p-5">
                    <h2>Gastos</h2>
                    <h1><b>S/{{ $totalSpendings }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-info text-center p-5">
                    <h2>Balance</h2>
                    <h1><b>{{ $generalBalance }}</b></h1>                    
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <div class="col-12 bg-warning text-center p-5">
                    <h2>Anuladas</h2>
                    <h1><b>{{ $canceledOrders }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-dark text-center p-5">
                    <h2>Sin Stock</h2>
                    <h1><b>{{ $countProducts }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-light text-center p-5">
                    <h2>Usuarios</h2>
                    <h1><b>{{ $totalUsers }}</b></h1>                    
                </div>
            </div>
            <div class="col-3">
                <div class="col-12 bg-secondary text-center p-5">
                    <h2>Restaurantes</h2>
                    <h1><b>{{ $totalRestaurants }}</b></h1>                    
                </div>
            </div>
        </div>
    </div>
@stop
