<div class="col-10">
    <h4>Editar Proveedor</h4>
    @include('livewire.proveedor.form')
    <button wire:click.prevent="update" class="btn btn-primary">
        Actualizar
    </button>
    <button wire:click.prevent="default" class="btn btn-link">
        Cancelar
    </button>
</div>
