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
    <?php if ($guia->moneda == 'soles') {
    $moneda = 'S/';
    } elseif ($guia->moneda == 'dolares') {
    $moneda = '$';
    } else{
     $moneda = "" ;
    } ?>
    <form class="noimpri" action="{{ route('guias.index') }}">
        <input type="submit" value="Volver" />
    </form>
    <table border="1" style="width: 100%">
        <caption></caption>
        <colgroup>
            <col style="width: 16%" />
            <col style="width: 14%" />
            <col style="width: 14%" />
            <col style="width: 14%" />
            <col style="width: 14%" />
            <col style="width: 14%" />
            <col style="width: 14%" />
        </colgroup>
        <thead>
            <tr>
                <th colspan="7"><img src="/images/LogoLayOptics.png" width="369" height="118"></th>
            </tr>
            <tr>
                <th>Guia</th>
                <td colspan="2" align="center" style="word-break: break-all"> <?php echo $guia->idguias;
                    ?></td>
                <th> fecha</th>
                <td colspan="3" align="center"> <?php if ($guia->fecha != null) {
                    $dia = date('d', strtotime($guia->fecha));
                    $mes = date('m', strtotime($guia->fecha));
                    $anio = date('Y', strtotime($guia->fecha));
                    echo "$dia/$mes/$anio";
                    } else {
                        $guia->fecha = '-';
                    echo $guia->fecha;
                    } ?> </td>

            </tr>
            <tr>
                <th colspan="2">Nombre:</th>
                <td colspan="5" style="word-break: break-all"><?php echo $guia->cliente->nombre_apellido; ?></td>
            </tr>
            <tr>
                <th colspan="1">Direccion:</th>
                <td colspan="3" style="word-break: break-all"><?php echo $guia->cliente->direccion; ?>
                </td>
                <th colspan="1">Telf:</th>
                <td colspan="2" style="word-break: break-all"><?php echo $guia->cliente->telefono; ?>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" align="center">
                    <table border="1" style="width: 90%">

                        <tr>

                            <td></td>

                            <th>SPH</th>

                            <th>CIL</th>

                            <th>EJE</th>

                        </tr>

                        <tr>

                            <th>O.D</th>

                            <td> <?php echo $guia->od_sph; ?></td>

                            <td> <?php echo $guia->od_cil; ?></td>

                            <td>
                                <?php
                                if ($guia->od_eje != '-') {
                                $guia->od_eje = $guia->od_eje . '°';
                                } else {
                                $guia->od_eje = $guia->od_eje;
                                }
                                echo $guia->od_eje;
                                ?>

                            </td>

                        </tr>

                        <tr>

                            <th>O.I</th>

                            <td> <?php echo $guia->oi_sph; ?></td>

                            <td> <?php echo $guia->oi_cil; ?></td>

                            <td>
                                <?php
                                if ($guia->oi_eje != '-') {
                                $guia->oi_eje = $guia->oi_eje . '°';
                                } else {
                                $guia->oi_eje = $guia->oi_eje;
                                }
                                echo $guia->oi_eje;
                                ?>
                            </td>

                        </tr>

                    </table>
                </td>

            </tr>
            <tr>
                <th> Entrega Aproximada</th>
                <td colspan="2">
                    <?php if ($guia->fecha_entrega_aprox != null) {
                    $dia = date('d', strtotime($guia->fecha_entrega_aprox));
                    $mes = date('m', strtotime($guia->fecha_entrega_aprox));
                    $anio = date('Y', strtotime($guia->fecha_entrega_aprox));
                    echo "$dia/$mes/$anio";
                    } else {
                    $guia->fecha_entrega_aprox = '-';
                    echo $guia->fecha_entrega_aprox;
                    } ?>
                </td>
                <th> Add 1</th>
                <td> <?php echo $guia->add1; ?> </td>
                <th> Add 2</th>
                <td> <?php echo $guia->add2; ?> </td>
            </tr>
            <tr>
                <td colspan="3"> </td>
                <th> Dip 1</th>
                <td>
                    <?php
                    if ($guia->dip1 != '-') {
                    $guia->dip1 = $guia->dip1 . ' mm';
                    } else {
                    $guia->dip1 = $guia->dip1;
                    }
                    echo $guia->dip1;
                    ?></td>
                <th> Dip 2</th>
                <td>
                    <?php
                    if ($guia->dip2 != '-') {
                    $guia->dip2 = $guia->dip2 . ' mm';
                    } else {
                    $guia->dip2 = $guia->dip2;
                    }
                    echo $guia->dip2;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <table border="1" style="width: 90%">
                        <tr>
                            <th>Observaciones</th>
                        </tr>
                        <tr>
                            <td style="word-break: break-all"> <?php echo $guia->observaciones; ?></td>
                        </tr>

                    </table>
                </td>
                <td colspan="4" align="center">
                    <table border="1" style="width: 90%">
                        <colgroup>
                            <col style="width: 20%" />
                            <col style="width: 80%" />
                        </colgroup>
                        <tr>
                            <th rowspan="2">Lente</th>
                            <td>
                                <?php echo $guia->nombre_lente; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if ($guia->precio_lente != null) {
                                    $guia->precio_lente = $moneda . $guia->precio_lente;
                                } else {
                                    $guia->precio_lente = $guia->precio_lente;
                                }
                                echo $guia->precio_lente;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">Montura</th>
                            <td>
                                <?php
                                foreach ($guia->productos as $producto) {
                                    echo $producto->modelo . " ". $producto->marca . "<br>";
                                }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                foreach ($guia->productos as $producto) {
                                    if($producto->pivot->precio != ""){
                                    echo $moneda . $producto->pivot->precio . "<br>" ;
                                    }
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Otros</th>
                            <td>
                                <?php
                                if ($guia->preio_otros != null) {
                                echo  $moneda . $guia->preio_otros;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <th>SubTotal</th>
                            <td><?php echo $moneda . $guia->subtotal; ?></td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td><?php echo $moneda . $guia->descuento; ?></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><?php echo $moneda . $guia->total; ?></td>
                        </tr>
                        <tr>
                            <th>A CTA.</th>
                            <td><?php echo $moneda . $guia->cta; ?></td>
                        </tr>
                        <tr>
                            <th>Saldo</th>
                            <td><?php echo $moneda . $guia->saldo; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th style="text-align:center;" colspan="7">
                    NOTA:Esta orden es válida durante 3 meses
                    </br>
                    pasado este tiempo no hay lugar a reclamos.
                    </br>
                    * Toda anulación de trabajo será penalizada
                    </br>
                    con el 10% del total pactado.
                    </br>
                    Tomás Guido Nº 192 - Lince Telf: 470-8626 Fax: 470-2320
                    </br>
                    E-mail: Ventas@layoptics.com
                    </br>
                    ATENCION: de Lunes a Viernes de 11 a.m a 8 p.m.
                    </br>
                    Sábados: De 11 a.m a 6 p.m </th>
            </tr>
        </tfoot>
    </table>

    </br>
    <input value="imprimir" type="button" src="" class="noimpri" onclick="javascript:window.print()">
    </br>
    </br>
    </br>
    <!--<form action="index.php">
<input class="noimpri" type ='submit' value = 'Volver'/> </form>-->
</body>

</html>
