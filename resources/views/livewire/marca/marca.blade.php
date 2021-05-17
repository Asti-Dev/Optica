<div>
    <div class="col-lg-12 margin-tb">
        <div class="my-3">
            <h2>LayOptics Marcas </h2>
        </div>

    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row d-flex">
    <div class="col-5 m-1">
        @include('livewire.marca.table')
    </div>
    <div class="col-5 d-flex flex-column align-items-center">
        @can('create',App\Models\Marca::class)
        @include("livewire.marca.$view")
        @endcan
    </div>
</div>
