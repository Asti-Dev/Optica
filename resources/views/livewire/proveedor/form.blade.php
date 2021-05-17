<div class="">
    <div class="form-group">
        <strong>Nombre:</strong>
        <input type="text" wire:model="nombre" name="nombre" class="form-control" placeholder="nombre">
        @error('nombre') <span>{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <label for="nombresMarca">Marcas</label>
        <select multiple wire:model="nombresMarca" class="form-control" id="nombresMarca">
            @foreach ($marcasSelect as $marca)
                <option value="{{ $marca->idmarcas }}">{{ $marca->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>
