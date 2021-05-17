<form class="card-body d-flex flex-column align-items-center"
action="{{ route('guias.update', $guia->idguias) }}" method="POST">
@csrf
@method('PUT')
    <div class="col">
        <div class="col form-group d-flex flex-column justify-content-end">
            <strong>Nombre y Apellido:</strong>
            <input autocomplete="off" list="clientes" wire:model="nombre" wire:change="$emit('updatedNombre')"
                type="text" name="nombre_apellido" id="nombre_apellido" class="form-control">
            <datalist id="clientes">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->nombre_apellido }}">
                @endforeach
            </datalist>
        </div>
    </div>
    <div class="col">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Telefono:</strong>
            <input value="{{ $telefono }}" type="text" name="telefono" id="telefono" class="form-control">
        </div>
    </div>
    <div class="col">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Direccion:</strong>
            <input value="{{ $direccion }}" type="text" name="direccion" id="direccion" class="form-control">
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Fecha:</strong>
            <input value="{{ $fecha }}" type="date" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Entrega Aproximada:</strong>
            <input value="{{ $fecha_entrega_aprox }}" type="date" name="fecha_entrega_aprox" id="fecha_entrega_aprox"
                class="form-control">
        </div>
    </div>
    <div class="col">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Observaciones:</strong>
            <textarea value="" type="text" name="observaciones" id="observaciones"
                class="form-control">{{ $observaciones }}</textarea>
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.D - SPH:</strong>
            <input value="{{ $od_sph }}" type="text" name="od_sph" id="od_sph" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.D - CIL:</strong>
            <input value="{{ $od_cil }}" type="text" name="od_cil" id="od_cil" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.D - EJE:</strong>
            <input value="{{ $od_eje }}" type="text" name="od_eje" id="od_eje" class="form-control">
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.I - SPH:</strong>
            <input value="{{ $oi_sph }}" type="text" name="oi_sph" id="oi_sph" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.I - CIL:</strong>
            <input value="{{ $oi_cil }}" type="text" name="oi_cil" id="oi_cil" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>O.I - EJE:</strong>
            <input value="{{ $oi_eje }}" type="text" name="oi_eje" id="oi_eje" class="form-control">
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>ADD1:</strong>
            <input value="{{ $add1 }}" type="text" name="add1" id="add1" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>ADD2:</strong>
            <input value="{{ $add2 }}" type="text" name="add2" id="add2" class="form-control">
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>DIP1:</strong>
            <input value="{{ $dip1 }}" type="text" name="dip1" id="dip1" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>DIP2:</strong>
            <input value="{{ $dip2 }}" type="text" name="dip2" id="dip2" class="form-control">
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row">
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Nombre Lentes:</strong>
            <input value="{{ $nombre_lente }}" type="text" name="nombre_lente" id="nombre_lente" class="form-control">
        </div>
        <div class="col form-group d-flex flex-column justify-content-end ">
            <strong>Precio Lentes:</strong>
            <input value="{{ $precio_lente }}" type="number" min="0" step="0.01" name="precio_lente" id="precio_lente"
                class="form-control">
        </div>
    </div>
    <livewire:productos-guia-form :guia="$guia">
        <div class="col">
            <div class="col form-group d-flex flex-column justify-content-end ">
                <strong>Precio Otros:</strong>
                <input value="{{ $precio_otros }}" type="number" min="0" step="0.01" name="precio_otros" id="precio_otros"
                    class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="col form-group d-flex flex-column justify-content-end ">
                <strong>Descuento:</strong>
                <input value="{{ $descuento }}" type="number" min="0" step="0.01" name="descuento" id="descuento"
                    class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="col form-group d-flex flex-column justify-content-end ">
                <strong>A Cuenta:</strong>
                <input value="{{ $cta }}" type="number" min="0" step="0.01" name="cta" id="cta" class="form-control">
            </div>
        </div>
        <div class="col hide">
            <div class="col form-group d-flex flex-column justify-content-end ">
                <input value="{{ $subtotal }}" type="number" min="0" step="0.01" name="subtotal" class="form-control">
                <input value="{{ $total }}" type="number" min="0" step="0.01" name="total" class="form-control">
                <input value="{{ $saldo }}" type="number" min="0" step="0.01" name="saldo" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="col form-group">
                <strong>Moneda:</strong>
                <select name="moneda" id="moneda" class="form-control">
                    @if ($moneda == 'soles')
                        <option value="soles">Soles</option>
                        <option value="dolares">Dolares</option>
                    @else
                        <option value="dolares">Dolares</option>
                        <option value="soles">Soles</option>
                    @endif
                </select>
            </div>
        </div>
        @if ($estado != '')
            <div class="col">
                <div class="col form-group d-flex flex-column justify-content-end ">
                    <strong>Fecha Entrega:</strong>
                    <input value="{{ $fecha_entrega }}" type="date" name="fecha_entrega" id="fecha_entrega"
                        class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="col form-group">
                    <strong>Estado:</strong>
                    <select name="estado" id="estado" class="form-control">
                        @php
                        if ($estado == 'proceso') {
                        echo '
                        <option value="proceso">proceso</option>
                        <option value="listo">listo</option>
                        <option value="entregado">entregado</option>';
                        } else if ($estado == 'listo') {
                        echo '
                        <option value="listo">listo</option>
                        <option value="proceso">proceso</option>
                        <option value="entregado">entregado</option>';
                        } else if ($estado == 'entregado') {
                        echo '
                        <option value="entregado">entregado</option>
                        <option value="proceso">proceso</option>
                        <option value="listo">listo</option>';
                        }
                        @endphp
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col form-group">
                    <strong>Situacion:</strong>
                    <select name="situacion" id="situacion" class="form-control">
                        @php
                        if ($situacion == 'por cancelar') {
                        echo '
                        <option value="por cancelar">por cancelar</option>
                        <option value="cancelado">cancelado</option>';
                        } else if ($situacion == 'cancelado') {
                        echo '
                        <option value="cancelado">cancelado</option>
                        <option value="por cancelar">por cancelar</option>';
                        }
                        @endphp
                    </select>
                </div>
            </div>
        @endif

        <div class="col text-center">
            <button type="submit" onclick="valorDefaultNumero(); valorDefaultTexto();totales();"
                class="btn btn-primary">Crear</button>
        </div>
</form>
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function valorDefaultNumero() {
            var x = document.getElementsByTagName("input");
            var i;
            for (i = 0; i < x.length; i++) {
                if (x[i].type == "number" && (x[i].value == "" || !x[i].value.trim().length)) {
                    x[i].value = 0;
                }
            }
        }

        function valorDefaultTexto() {
            var x = document.getElementsByTagName("input");
            var i;
            for (i = 0; i < x.length; i++) {
                if (x[i].type == "text" && (x[i].value == "" || !x[i].value.trim().length)) {
                    x[i].value = "-";
                }
            }
        }

        function totales() {
            var cta = parseFloat(document.getElementsByName('cta')[0].value);
            var descuento = parseFloat(document.getElementsByName('descuento')[0].value);
            var precio_lente = parseFloat(document.getElementsByName('precio_lente')[0].value);
            var precio_otros = parseFloat(document.getElementsByName('precio_otros')[0].value);
            var subtotal = 0;
            var total = 0;
            var saldo = 0;
            var Productos = document.getElementsByName('precio[]');
            var sumProductos = 0;
            Productos.forEach(
                function(value, key, Productos) {
                    sumProductos += parseFloat(value.value);
                }
            )

            subtotal = precio_lente + sumProductos + precio_otros;
            total = subtotal - descuento;
            saldo = total - cta;

            document.getElementsByName('subtotal')[0].value = subtotal;
            document.getElementsByName('total')[0].value = total;
            document.getElementsByName('saldo')[0].value = saldo;
        }

    </script>
@endsection
