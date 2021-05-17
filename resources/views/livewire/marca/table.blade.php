<table class="table table-bordered table-responsive-lg">
    <thead class="thead-dark">
        <tr class="">
            <th scope="col">Acciones</th>
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
                <td class="d-flex justify-content-center" style="height: 100px" scope="row">
                    {{-- @can('view',$marca)
                    <a class="mx-1" href="{{ route('marcas.show', $marca->idmarcas) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>
                    @endcan--}}
                    @can('update',$marca)
                    <a class="mx-1" wire:click.prevent="edit({{$marca->idmarcas}})">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>
                    @endcan
                    @can('delete', $marca)
                    <form class="mx-1" style="width: min-content" wire:submit.prevent="destroy({{$marca->idmarcas}})">

                        <button type="submit" onclick="return confirm('¿Estas seguro de borrar esta marca?')" title="delete" style="padding:0px; border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                    @endcan
                </td>
                <td>{{ $marca->idmarcas }}</td>
                <td>{{ $marca->nombre }}</td>
                <td>{{ $marca->codigo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $marcas->links() }}
