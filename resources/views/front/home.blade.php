@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Panel de Control') }}</div>

                <div class="card-body">
                <section>
                    <div class="container-fluid">
                        <div class="col-12">
                        <div class="row">
                            @foreach($tables as $table)
                            <div class="card m-2 text-center text-light bg-dark" style="width: 19rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $table->name }}</h5>
                                <p class="card-text">ESTADO: {{ $table->status }}</p>
                                <p class="card-text">RESTAURANTE: {{ $table->restaurant->name }}</p>
                                @if($table->status == 'LIBRE')
                                <a href="{{ Route('attendTable', $table->id) }}" class="btn btn-success">Atender</a>
                                @else
                                <a href="{{ Route('attendTable', $table->id) }}" class="btn btn-info">Ver Mesa</a>
                                @endif
                            </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
