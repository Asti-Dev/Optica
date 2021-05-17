    <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
            <tr class="">
                <th scope="col">Acciones</th>
                <th scope="col">No
                    {{-- <a href="{{ url()->current() }}?type=idproveedores&order=desc" class=" ml-1">
                        <i class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=idproveedores&order=asc" class=" ml-1">
                        <i class="fas fa-angle-up"></i></a> --}}
                </th>
                <th scope="col">Proveedor
                    {{-- <a href="{{ url()->current() }}?type=proveedor&order=desc" class=" ml-1"><i
                            class="fas fa-angle-down"></i></a>
                    <a href="{{ url()->current() }}?type=proveedor&order=asc" class=" ml-1"><i
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
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td class="d-flex justify-content-center" style="height: 100px" scope="row">
                        @can('view',$proveedor)
                        <a class="mx-1" wire:click.prevent="show({{$proveedor->idproveedores}})" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        @endcan
                        @can('update',$proveedor)
                        <a class="mx-1" wire:click.prevent="edit({{$proveedor->idproveedores}})">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @endcan
                        @can('delete', $proveedor)
                        <form class="mx-1" style="width: min-content" wire:submit.prevent="destroy({{$proveedor->idproveedores}})">

                            <button type="submit" onclick="return confirm('¿Estas seguro de borrar el proveedor?')" title="delete" style="padding:0px; border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                        @endcan
                    </td>
                    <td>{{ $proveedor->idproveedores }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->codigo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $proveedores->links() }}
