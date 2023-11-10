@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1>Listado de Categorias</h1>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nueva Categoria</button>
        </div>
    </div> 
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered text-center" id="table">
            <thead class="bg-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#updateModal{{ $category->id }}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $category->id }}">Eliminar</button>
                        </td>
                    </tr>
                    @include('category.modals.update')
                    @include('category.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('category.modals.create')
@stop