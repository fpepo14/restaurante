@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Stock</div>
                <div class="card-body text-center">
                <section>
                   <table class="table col-12 table-bordered text-center">
                       <thead class="bg-primary text-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock Restante</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
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
@endsection