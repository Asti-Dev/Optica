<div class="">
    <div class="form-group">
        <strong>Nombre:</strong>
        <input type="text" wire:model="nombre" name="nombre" class="form-control" placeholder="nombre">
        @error('nombre') <span>{{$message}}</span> @enderror
    </div>
</div>
