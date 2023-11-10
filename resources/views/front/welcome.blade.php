@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('¡Bienvenido!') }}</div>

                <div class="card-body text-center">
                <section>
                    <a href="/login" class="btn btn-success col-12">Iniciar Sesion</a>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
