<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table table-bordered table-responsive-lg">
        <thead class="thead-dark">
            <tr class="">
                <th scope="col">No
                </th>
                <th scope="col">Barcode
                </th>
                <th scope="col">Proveedor
                </th>
                <th scope="col">Marca
                </th>
                <th scope="col">Modelo
                </th>
                <th scope="col">Color
                </th>
                <th scope="col">Costo
                </th>
                <th scope="col">Precio Unitario
                </th>
                <th scope="col">Stock
                </th>
                <th scope="col">Fecha de Adquisicion
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->idproductos }}</td>
                    <td>{{ $producto->barcode }}</td>
                    <td>{{ $producto->proveedor }}</td>
                    <td>{{ $producto->marca }}</td>
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

</body>
</html>
