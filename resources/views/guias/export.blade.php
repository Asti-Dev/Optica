<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">idGuia
            </th>
            <th scope="col">Cliente
            </th>
            <th scope="col">Estado
            </th>
            <th scope="col">Direccion
            </th>
            <th scope="col">Telefono

            </th>
            <th scope="col">Fecha

            </th>
            <th scope="col">Fecha entrega Aprox

            </th>
            <th scope="col">Fecha entrega

            </th>
            <th scope="col">Situacion

            </th>
            <th scope="col">Tipo Moneda

            </th>
            <th scope="col">Nombre del lente

            </th>
            <th scope="col">Lente

            </th>
            <th scope="col">Nombre de montura
            </th>
            <th scope="col">Montura
            </th>
            <th scope="col">Otros

            </th>
            <th scope="col">Descuento

            </th>
            <th scope="col">SubTotal

            </th>
            <th scope="col">Total

            </th>
            <th scope="col">A Cta.

            </th>
            <th scope="col">Saldo

            </th>
            <th scope="col">Observaciones
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

</body>
</html>
