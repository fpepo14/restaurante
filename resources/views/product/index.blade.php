@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Productos</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Producto</button>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Restaurante</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->restaurant->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $product->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('product.modals.update')
                    @include('product.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('product.modals.create')
@stop