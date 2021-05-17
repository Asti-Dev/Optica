<div>
    <h4>Editar Marca</h4>
    @include('livewire.marca.form')
    <button wire:click.prevent="update" class="btn btn-primary">
        Actualizar
    </button>
    <button wire:click.prevent="default" class="btn btn-link">
        Cancelar
    </button>
</div>
