@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="my-3">
                <h2>LayOptics Productos </h2>
            </div>
            <div class="d-flex align-items-strech my-1">
                @can('create', App\Models\Producto::class)
                    <a class="btn btn-success" href="{{ route('productos.create') }}" title="Crear producto">
                        Nuevo
                    </a>
                @endcan
                <a class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-xl" type="button" href="#"
                    title="filtros">
                    Filtros
                </a>
                <a class="btn btn-success" href="{{ route('productos.index') }}">
                    Limpiar
                </a>
                @can('excel', App\Models\Producto::class)
                    <a class="btn btn-primary" href="{{ route('productos.excelAll') }}">
                        Exportar Excel
                    </a>
                    <a class="btn btn-primary" href="{{ route('productos.barcode') }}">
                        Exportar Barcode
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline" action="{{ route('productos.searchF') }}" method="POST">
                        @csrf
                        <label for="category_filter">Buscador &nbsp;</label>
                        <select class="form-control" name="stype">
                            <option value="idproductos">Id</option>
                            <option value="barcode">Barcode</option>
                            <option value="idproveedores">No.Proveedor</option>
                            <option value="idmarcas">No.Marca</option>
                            <option value="modelo">Modelo</option>
                            <option value="color">Color</option>
                            <option value="costo">Costo</option>
                            <option value="precio_unitario">Precio Unitario</option>
                            <option value="stock">Stock</option>
                            <option value="fecha_adquisicion">Fecha de Adquisicion</option>
                        </select>
                        <label for="keyword">&nbsp;&nbsp;</label>
                        <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword">
                        <span>&nbsp;</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="mostrarAcabados" id="mostrarAcabados">
                            <label class="form-check-label" for="mostrarAcabados">
                                Mostrar Acabados
                            </label>
                        </div>
                        <span>&nbsp;</span>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <br>
                    <form class="form-inline" action="{{ route('productos.searchFR') }}" method="POST">
                        @csrf
                        <label for="category_filter">Buscador por rangos &nbsp;</label>
                        <select id="options" class="form-control" onchange="inputType(event)" name="rtype">
                            <option value="idproductos">Id</option>
                            <option value="costo">Costo</option>
                            <option value="precio_unitario">Precio Unitario</option>
                            <option value="stock">Stock</option>
                            <option value="fecha_adquisicion">Fecha de Adquisicion</option>
                        </select>
                        <span>&nbsp;</span>
                        <label for="inicio"> Desde: </label>
                        <input id="input" type="number" step="0.01" class="form-control" name="inicio"
                            placeholder="Número Menor">
                        <span>&nbsp;</span>
                        <label for="fin"> Hasta: </label>
                        <input id="input2" type="number" step="0.01" class="form-control" name="fin"
                            placeholder="Número Mayor">
                        <span>&nbsp;</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="mostrarAcabados" id="mostrarAcabados">
                            <label class="form-check-label" for="mostrarAcabados">
                                Mostrar Acabados
                            </label>
                        </div>
                        <span>&nbsp;</span>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal --}}

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-responsive">
        <thead class="thead-dark">
            <tr class="">
                <th scope="col" style="font-size:0.9rem">Acciones</th>
                <th scope="col" style="font-size:0.9rem">No
                    <a href="{{ url()->current() }}?type=idproductos&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idproductos&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Barcode
                    <a href="{{ url()->current() }}?type=barcode&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=barcode&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Proveedor
                    <a href="{{ url()->current() }}?type=idproveedores&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idproveedores&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Marca
                    <a href="{{ url()->current() }}?type=idmarcas&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idmarcas&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Modelo
                    <a href="{{ url()->current() }}?type=modelo&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=modelo&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Color
                    <a href="{{ url()->current() }}?type=color&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=color&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Costo
                    <a href="{{ url()->current() }}?type=costo&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=costo&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Precio Unitario
                    <a href="{{ url()->current() }}?type=precio_unitario&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=precio_unitario&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Stock
                    <a href="{{ url()->current() }}?type=stock&order=desc"
                        class=" ml-1"><i class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=stock&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col" style="font-size:0.9rem">Fecha de Adquisicion
                    <a href="{{ url()->current() }}?type=fecha_adquisicion&order=desc"
                        class=" ml-1"><i class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=fecha_adquisicion&order=asc" class=" ml-1">
                        <i class="fas fa-angle-up"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td class="d-flex justify-content-center" style="height: 100px" scope="row">
                        @can('excel', App\Models\Producto::class)
                            <a class="mx-1" href="{{ route('productos.barcodeOne', $producto->idproductos) }}" title="barOne">
                                <i class="fas fa-barcode fa-lg"></i>
                            </a>
                        @endcan
                        @can('view', $producto)
                            <a class="mx-1" href="{{ route('productos.show', $producto->idproductos) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
                        @endcan
                        @can('update', $producto)
                            <a class="mx-1" href="{{ route('productos.edit', $producto->idproductos) }}">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>
                        @endcan
                        @can('delete', $producto)
                            <form class="mx-1" style="width: min-content"
                                action="{{ route('productos.destroy', $producto->idproductos) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('¿Estas seguro de borrar el producto?')"
                                    title="delete" style="padding:0px; border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                    <td>{{ $producto->idproductos }}</td>
                    <td>{{ $producto->barcode }}</td>
                    <td>{{ $producto->proveedor->nombre }}</td>
                    <td>{{ $producto->marca->nombre }}</td>
                    <td>{{ $producto->modelo }}</td>
                    <td>{{ $producto->color }}</td>
                    <td>{{ $producto->costo }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->fecha_adquisicion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $productos->links() }}

@endsection

@section('javascript')
    <script>
        function inputType(e) {

            if (e.target.value == "fecha_adquisicion") {
                document.getElementById('input').type = 'date';
                document.getElementById('input2').type = 'date';
            } else {
                document.getElementById('input').type = 'number';
                document.getElementById('input2').type = 'number';
            }
        };

    </script>
@endsection
