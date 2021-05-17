<div style="max-height: 100vh" class="col-10 overflow-auto">
    <h4>Proveedor: {{$nombre}}</h4>
    <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
            <tr class="">
                <th scope="col">No
                    {{-- <a href="{{ url()->current() }}?type=idmarcas&order=desc" class=" ml-1">
                        <i class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idmarcas&order=asc" class=" ml-1">
                        <i class="fas fa-angle-up"></i></a> --}}
                </th>
                <th scope="col">marca
                    {{-- <a href="{{ url()->current() }}?type=marca&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=marca&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a> --}}
                </th>
                <th scope="col">Codigo
                    {{-- <a href="{{ url()->current() }}?type=codigo&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=codigo&order=asc" class=" ml-1"><i
                            class="fas fa-angle-up"></i></a> --}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->idmarcas }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td>{{ $marca->codigo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
