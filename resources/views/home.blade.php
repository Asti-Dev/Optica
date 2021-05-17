@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row row-cols-2 d-flex justify-content-around">
                        <div class="col-5 d-flex justify-content-center my-1">
                            @can('viewAny',App\Models\Producto::class)
                            <a class="btn btn-secondary btn-lg btn-block" href="{{ route('productos.index') }}">Productos</a>
                            @endcan
                        </div>
                        <div class="col-5 d-flex justify-content-center my-1">
                            @can('viewAny',App\Models\Guia::class)
                            <a class="btn btn-secondary btn-lg btn-block" href="{{ route('guias.index') }}">Guias</a>
                            @endcan
                        </div>
                        <div class="col-5 d-flex justify-content-center my-1">
                            @can('viewAny',App\Models\Proveedor::class)
                            <a class="btn btn-secondary btn-lg btn-block" href="{{ route('proveedores.index') }}">Proveedores</a>
                            @endcan
                        </div>
                        <div class="col-5 d-flex justify-content-center my-1">
                            @can('viewAny',App\Models\Marca::class)
                            <a class="btn btn-secondary btn-lg btn-block" href="{{ route('marcas.index') }}">Marcas</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
