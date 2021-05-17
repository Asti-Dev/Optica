<div>
    <div class="col-lg-12 margin-tb">
        <div class="my-3">
            <h2>LayOptics Proveedores </h2>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row d-flex">
    <div class="col-6 m-1">
        @include('livewire.proveedor.table')
    </div>
    <div class="col-5 d-flex flex-column align-items-center">
        @can('create',App\Models\Proveedor::class)
            @include("livewire.proveedor.$view")
        @endcan
    </div>
</div>
