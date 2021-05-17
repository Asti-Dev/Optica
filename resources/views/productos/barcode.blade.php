<html>

<head>
    <style>
        @media print {
            .noimpri {
                display: none;
            }
        }
        body{
            height: 100vh;
        }
        table,
        th,
        td {
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
            border: 2px solid black;
        }

    </style>
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

<body>

    <table border="1">
            @foreach ($productos as $producto)
            @if (!empty($producto->barcode))
            <tr>
                <td>
                <div>
                    {!! DNS1D::getBarcodeHTML( $producto->barcode, 'C128'); !!}
                </div>
                <div>
                    {{ $producto->marca->nombre . " ". $producto->modelo}}                </div>
                <div>
                    S/. {{ $producto->precio_unitario}}
                </div>
            </td>
        </tr>

            @else
            <tr>
                <td>
                <div>
                    {{ $producto->marca->nombre . " ". $producto->modelo}}
                </div>
                <div>
                    S/. {{ $producto->precio_unitario}}
                </div>
            </td>
        </tr>

            @endif

            @endforeach


    </table>

    <!--<form action="index.php">
<input class="noimpri" type ='submit' value = 'Volver'/> </form>-->
</body>

</html>
