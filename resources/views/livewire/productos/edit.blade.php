<div class="col-7" style="background: darkgrey">
<form class="card-body" action="{{ route('productos.update', $producto->idproductos) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proveedor:</strong>
                <select class="form-control" wire:model="proveedor"   name="proveedor">
                    <option value="{{$proveedorN->idproveedores}}">{{$proveedorN->nombre}}</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->idproveedores}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marca:</strong>
                <select class="form-control" wire:model="marca" name="marca">
                    <option value="{{$marcaN->idmarcas}}">{{$marcaN->nombre}}</option>
                    @foreach ($marcas as $marca)
                    <option value="{{$marca->idmarcas}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Modelo:</strong>
                <input type="text" name="modelo" value="{{$producto->modelo}}" class="form-control" placeholder="modelo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color:</strong>
                <input type="text" name="color" value="{{$producto->color}}" class="form-control" placeholder="color">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo:</strong>
                <input type="number" min="0" step="0.01" name="costo" value="{{$producto->costo}}" class="form-control" placeholder="costo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio Unitario:</strong>
                <input type="number" min="0" step="0.01" name="precio_unitario" value="{{$producto->precio_unitario}}" class="form-control" placeholder="Precio Unitario">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                <input type="number" min="0" name="stock" value="{{$producto->stock}}" class="form-control" placeholder="stock" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Adquisicion:</strong>
                <input type="date" name="fecha_adquisicion" value="{{$producto->fecha_adquisicion}}" class="form-control" placeholder="fecha de adquisicion">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>

</form>
</div>