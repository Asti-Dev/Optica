<div class="col-10">
        <h4>Crear Proveedor</h4>
        @include('livewire.proveedor.form')
        <button wire:click.prevent="store" class="btn btn-primary">
            Crear
        </button>
</div>
