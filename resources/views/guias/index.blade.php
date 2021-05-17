@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="my-3">

                <h2>LayOptics Guias </h2>
            </div>
            <div class="d-flex align-items-strech my-1">
                @can('create',App\Models\Guia::class)
                <a class="btn btn-success" href="{{ route('guias.create') }}" title="Create a guia">
                    Nuevo
                </a>
                @endcan
                <a class="btn btn-secondary" data-toggle="modal"
                    data-target=".bd-example-modal-xl" type="button" href="#" title="filtros">
                    Filtros
                </a>
                <a class="btn btn-success" href="{{ route('guias.index') }}">
                    Limpiar
                </a>
                @can('excel',App\Models\Guia::class)
                <a class="btn btn-primary" href="{{ route('guias.excelAll') }}">
                    Exportar Excel
                </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline" action="
                    {{ route('guias.searchF') }}
                    " method="POST">
                        @csrf
                        <label for="category_filter">Buscador &nbsp;</label>
                        <select class="form-control" name="stype">
                            @foreach ($buscarPalabra as $key => $palabra)
                            <option value="{{$key}}">{{$palabra}}</option>
                            @endforeach
                        </select>
                        <label for="keyword">&nbsp;&nbsp;</label>
                        <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword">
                        <span>&nbsp;</span>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <br>
                    <form class="form-inline" action="
                    {{ route('guias.searchFR') }}
                    " method="POST">
                        @csrf
                        <label for="category_filter">Buscador por rangos &nbsp;</label>
                        <select id="options" class="form-control" onchange="inputType(event)" name="rtype">
                            @foreach ($buscarRango as $key => $palabra)
                            <option value="{{$key}}">{{$palabra}}</option>
                            @endforeach
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
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">idGuia
                    <a href="{{ url()->current() }}?type=idguias&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idguias&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Cliente
                    <a href="{{ url()->current() }}?type=nombre_apellido&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=nombre_apellido&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Estado
                    <a href="{{ url()->current() }}?type=estado&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=estado&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Direccion
                    <a href="{{ url()->current() }}?type=direccion&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=direccion&order=asc" class=" ml-1"><i class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Telefono
                    <a href="{{ url()->current() }}?type=telefono&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=telefono&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Fecha
                    <a href="{{ url()->current() }}?type=fecha&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=fecha&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Fecha entrega Aprox
                    <a href="{{ url()->current() }}?type=fecha_entrega_aprox&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=fecha_entrega_aprox&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Fecha entrega
                    <a href="{{ url()->current() }}?type=fecha_entrega&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=fecha_entrega&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Situacion
                    <a href="{{ url()->current() }}?type=situacion&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=situacion&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Tipo Moneda
                    <a href="{{ url()->current() }}?type=moneda&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=moneda&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Nombre del lente
                    <a href="{{ url()->current() }}?type=nombre_lente&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=nombre_lente&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Lente
                    <a href="{{ url()->current() }}?type=precio_lente&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=precio_lente&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Nombre de montura
                </th>
                <th scope="col">Cantidad de Monturas
                </th>
                <th scope="col">Montura
                </th>
                <th scope="col">Otros
                    <a href="{{ url()->current() }}?type=precio_otros&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=precio_otros&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Descuento
                    <a href="{{ url()->current() }}?type=descuento&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=descuento&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">SubTotal
                    <a href="{{ url()->current() }}?type=subtotal&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=subtotal&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Total
                    <a href="{{ url()->current() }}?type=total&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=total&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">A Cta.
                    <a href="{{ url()->current() }}?type=cta&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=cta&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Saldo
                    <a href="{{ url()->current() }}?type=saldo&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=saldo&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">Observaciones
                    <a href="{{ url()->current() }}?type=observaciones&order=desc" class=" ml-1"><i
                        class="fas fa-angle-down"></i></a>
                <a href="{{ url()->current() }}?type=observaciones&order=asc" class=" ml-1"><i
                        class="fas fa-angle-up"></i></a>
                </th>
                <th scope="col">O.D</th>
                <th scope="col">O.I</th>
                <th scope="col">ADD</th>
                <th scope="col">DIP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guias as $guia)
                <tr>
                    <td class="d-flex justify-content-center" scope="row">
                        @can('update',$guia)
                        <a class="mx-1" href="{{ route('guias.edit', $guia->idguias) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @endcan
                        @can('view',$guia)
                        <a class="mx-1"
                            href="{{ route('guias.show', $guia->idguias) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        @endcan

                        @can('anular',$guia)
                        <form class="mx-1" style="width: min-content"
                            action="{{ route('guias.anular', $guia->idguias) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" onclick="return confirm('¿Estas seguro de borrar esta guia?')" title="delete"
                                style="padding:0px; border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                        @endcan
                    </td>
                    @php
                    $signo = "";
                    if ($guia->moneda =="soles") {
                        $signo = "S/.";
                    } else if ($guia->moneda =="dolares") {
                        $signo = "$";
                    } else {
                        $signo = "";
                    };

                    @endphp
                    <td>{{ $guia->idguias }}</td>
                    <td>{{ $guia->nombre_apellido }}</td>
                    <td>{{ $guia->estado }}</td>
                    <td>{{ $guia->direccion }}</td>
                    <td>{{ $guia->telefono }}</td>
                    <td>{{ $guia->fecha }}</td>
                    <td>{{ $guia->fecha_entrega_aprox }}</td>
                    <td>{{ $guia->fecha_entrega }}</td>
                    <td>{{ $guia->situacion }}</td>
                    <td>{{ $guia->moneda }}</td>
                    <td>{{ $guia->nombre_lente }}</td>
                    <td>{{ $signo . " " . $guia->precio_lente }}</td>
                    <td>
                        @foreach ($guia->productos as $producto)
                            <p>{{ $producto->modelo . ' ' . $producto->marca }}</p><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($guia->productos as $producto)
                            <p>{{$producto->pivot->cantidad }}</p><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($guia->productos as $producto)
                            <p>{{$signo . " " .  $producto->pivot->precio }}</p><br>
                        @endforeach
                    </td>
                    <td>{{$signo . " " .  $guia->precio_otros }}</td>
                    <td>{{$signo . " " .  $guia->descuento }}</td>
                    <td>{{$signo . " " .  $guia->subtotal }}</td>
                    <td>{{$signo . " " .  $guia->total }}</td>
                    <td>{{$signo . " " .  $guia->cta }}</td>
                    <td>{{$signo . " " .  $guia->saldo }}</td>
                    <td>{{ $guia->observaciones }}</td>
                    <td class="no-wrap">
                        SPH:{{ $guia->od_sph }} <br>
                        CIL:{{ $guia->od_cil }} <br>
                        EJE:{{ $guia->od_eje }}
                    </td>
                    <td class="no-wrap">
                        SPH:{{ $guia->oi_sph }} <br>
                        CIL:{{ $guia->oi_cil }} <br>
                        EJE:{{ $guia->oi_eje }}
                    </td>
                    <td class="no-wrap">
                        ADD1:{{ $guia->add1 }} <br>
                        ADD2:{{ $guia->add2 }} <br>
                    </td>
                    <td class="no-wrap">
                        DIP1:{{ $guia->dip1 }} <br>
                        DIP2:{{ $guia->dip2 }} <br>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $guias->links() }}

@endsection

@section('javascript')
    <script>
        function inputType(e) {

            if (e.target.value == "fecha_entrega_aprox"
                ||e.target.value == "fecha"
                ||e.target.value == "fecha_entrega" ) {
                document.getElementById('input').type = 'date';
                document.getElementById('input2').type = 'date';
            } else {
                document.getElementById('input').type = 'number';
                document.getElementById('input2').type = 'number';
            }
        };

    </script>
@endsection
