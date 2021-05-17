            <div id="productoItem{{$count}}" class="col row row-cols-1 row-cols-sm-2 d-flex">
                <div class="col hide form-group  ">
                    <input type="text" wire:model="product.idproductos" name="idproductos[]" class="form-control">
                </div>
                <div class="col form-group d-flex flex-column justify-content-end ">
                    <strong>Producto Codebar:</strong>
                    <input type="text" wire:keyup="encontrarProducto()" wire:model="product.barcode" name="barcode[]" class="form-control">
                </div>
                <div class="col form-group d-flex flex-column justify-content-end ">
                    <input readonly type="text" wire:model="product.producto_descripcion" name="producto_descripcion[]"
                        class="form-control">
                </div>
                <div class="col form-group d-flex flex-column justify-content-end ">
                    <strong>Cantidad:</strong>
                    <input type="number" min="0" step="0.01" wire:keyup="totalProducto()" wire:model="product.cantidad" name="cantidad[]" class="form-control">
                </div>
                <div class="col form-group d-flex flex-column justify-content-end ">
                    <strong>Precio:</strong>
                    <input readonly type="number" min="0" step="0.01" wire:model="product.precio" name="precio[]" class="form-control">
                </div>
            </div>
