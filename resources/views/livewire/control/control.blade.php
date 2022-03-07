<div>
    <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="col-8 row d-flex justify-content-between">
                <div class="col-md-8 form-group">
                    <label for="buscar">
                        <strong>Buscar</strong>
                        @if($picked)
                        <span class="badge badge-success">Picked</span>
                        @else
                        <span class="badge badge-danger">Picked</span>
                        @endif
                    </label>
                    <input wire:model.debounce.500ms="buscar" type="text" class="form-control" id="buscar">
                    @error("buscar")
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <button class="btn btn-success" wire:click.prevent='validar()'>Validar</button>
                    <button class="btn btn-secondary" wire:click.prevent="refresh">Limpiar</button>
                </div>
            </div>
            <div class="col-10 row d-flex justify-content-between mt-3">
                <div class="col-8">
                    <p><strong>Resultados</strong></p>
                    <div style="overflow: scroll; height:55vh" class="row">
                        <div class="col-6">
                            @foreach ( $productos as $index => $producto )
                            <div class="list-group">
                                <div href="#" class="list-group-item list-group-item-action">
                                    <p class="mb-1">
                                        <ul class="list-group">
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Barcode
                                                <span class="badge badge-primary badge-pill">{{$producto['barcode']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Proveedor
                                                <span
                                                    class="badge badge-primary badge-pill">{{$producto['proveedor']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Marca
                                                <span class="badge badge-primary badge-pill">{{$producto['marca']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Modelo
                                                <span class="badge badge-primary badge-pill">{{$producto['modelo']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Color
                                                <span class="badge badge-primary badge-pill">{{$producto['color']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Cantidad
                                                <span
                                                    class="badge badge-primary badge-pill">{{$producto['cantidad']}}</span>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            @foreach ( $almacenProductos as $almacenProducto )
                            <div class="list-group">
                                <div href="#" class="list-group-item list-group-item-action">
                                    <p class="mb-1">
                                        <ul class="list-group">
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Barcode
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['barcode']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Proveedor
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['proveedor']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Marca
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['marca']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Modelo
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['modelo']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Color
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['color']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Stock
                                                <span
                                                    class="badge badge-{{$almacenProducto['estado']}} badge-pill">{{$almacenProducto['stock']}}
                                                </span>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <p><strong>Productos en almacen no escaneados</p></strong>
                    <div style="overflow: scroll; height:55vh" class="row">
                        <div class="col-12">
                            @foreach ( $almacenProductosExistentes as $index => $almacenProducto )
                            <div class="list-group">
                                <div href="#" class="list-group-item list-group-item-action">
                                    <p class="mb-1">
                                        <ul class="list-group">
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Barcode
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['barcode']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Proveedor
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['proveedor']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Marca
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['marca']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Modelo
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['modelo']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Color
                                                <span
                                                    class="badge badge-primary badge-pill">{{$almacenProducto['color']}}</span>
                                            </li>
                                            <li class=" d-flex justify-content-between align-items-center">
                                                Stock
                                                <span
                                                    class="badge badge-danger badge-pill">{{$almacenProducto['stock']}}
                                                </span>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>