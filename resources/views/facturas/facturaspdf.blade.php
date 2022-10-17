<html lang="es">

    <head>
        <title>Factura {{$factura->id_factura_token}}</title>
    </head>
    <body>

<?php

    $toggleCorrector = true;
    $columna = 0;
    $paginaFinal = 0;
    $arrayTrabajos = [];


    $baseImponible = 0;

    for ($a=0; $a < count($trabajos['descripciones']); $a++) { //Aqui calcula la base imponible (Sin aplicar el IVA)

        $baseImponible += $trabajos['importes'][$a];

        $columna += ceil(strlen($trabajos['descripciones'][$a]) / 36); // Upper Round y conteo de caracteres
        $columna += 0.5;

        if ($columna >= 30 || count($trabajos['descripciones']) == ($a + 1)) { //Entra si supera el limite o si supera la cantidad de trabajos
            ++$paginaFinal;
            $columna = 0;
        }

    }

    $precioIVA = $factura->importe - $baseImponible;

    if ($columna <= 30) {
        $pagina = 'Única';
    }

    //Reinicio de variables
    $columna = 0;
    $pagina = 0;
    

    //36 caracteres de ancho y 30 caracteres de alto

    for ($i=0; $i < count($trabajos['descripciones']); $i++) { 

        $arrayTrabajos[] = $i;
        $columna += ceil(strlen($trabajos['descripciones'][$i]) / 36); // Upper Round y conteo de caracteres
        $columna += 0.5;

        if ($columna >= 30 || count($trabajos['descripciones']) == ($i + 1)) { //Entra si supera el limite o si supera la cantidad de trabajos

            if (!is_string($pagina)) {
                ++$pagina;
            }

            if ($columna > 30) {
                --$i;
                array_pop($arrayTrabajos); //Extrae el ultimo valor del array
            }

            /* if (!$toggleCorrector) {

?>

        <div style="height:100px">
        </div>

<?php

            } */

?>
        <div style="height:20%;margin-top:0px">
            <div style="margin-botton:0px">

                <table width="100%">
                    <tr>
                        <td colspan="2"><h1>Fontaneria López García</h1></td>
                        <td align="right"><h1>FACTURA</h1></td>
                        <td align="right" width="100px"><p>Página: {{$pagina}}</p></td>
                    </tr>

                    <tr>
                        <td><img src="{{ asset('images/logo.png') }}" width="100px"></td>
                        <td style="align-content:center">
                            <table>
                                <tr>
                                    <td align="center"><b> Datos de la empresa: </b></td>
                                </tr>
                                <tr>
                                    <td>Juan Carlos López Ortiz {{$factura->dni}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->direccion}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->ciudad . " " . $factura->codigo_postal}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->telefono_personal}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->email}}</td>
                                </tr>
                            </table>
                        </td>
                        <td colspan="2" style="vertical-align:text-top">
                            <table height="100%">
                                
                                <tr>
                                    <td align="center"><b> Datos del Cliente:</b></td>
                                </tr>
                                <tr>
                                    <td>{{$factura->nombre_cliente . " " . $factura->dni_cliente}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->direccion_cliente}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->ciudad_cliente . " " . $factura->codigo_postal_cliente}}</td>
                                </tr>
                                <tr>
                                    <td>{{$factura->email_cliente}}</td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <br>

        <div>
                        
            <div width="50%">Factura: {{$factura->id_factura_token}}</div>

            <div width="50%">Fecha: {{ date("d-m-Y",strtotime( $factura->fecha ))}}</div>   

        </div>

        <br>

        <div style="border-style:solid;height:53%">
            <table class="table" width="100%">
            
                <tr color="blue">

                    <th width="55%" align="center">Descripción</th>
                    <th width="10%" align="center">Cant.</th>
                    <th width="10%" align="center">Pre. €</th>
                    <th width="10%" align="center">Des. %</th>
                    <th width="15%" align="center">Importe €</th>

                </tr>

                    <?php

                        for ($a=0; $a < count($arrayTrabajos); $a++) {

                            echo "<tr>";
                            
                                echo "<td align='left' style='font-family: monospace'>" . $trabajos['descripciones'][$arrayTrabajos[$a]] . "</td>";
                                echo "<td align='center'>" . $trabajos['cantidades'][$arrayTrabajos[$a]]. "</td>";
                                echo "<td align='center'>" . $trabajos['precios'][$arrayTrabajos[$a]]. "</td>";
                                echo "<td align='center'>" . $trabajos['descuentos'][$arrayTrabajos[$a]]. "</td>";
                                echo "<td align='center'>" . $trabajos['importes'][$arrayTrabajos[$a]]. "</td>";
    
                            echo "</tr>";

                        }

                        unset($arrayTrabajos); //vacia el array de trabajos
                        
                    ?>

                
            </table>
        </div>

        
        <div style="left:0;bottom:0;width:100%">

            <table style="border: 1px solid black" width="100%">
                <tr>
                    <td width="33%">
                    </td>
                    <td width="33%">
                        <table width="100%">
                            <tr width="66%">
                                <td align="center">
                                    @if($pagina == $paginaFinal)
                                        <b>Base Imponible</b>
                                    @endif
                                </td>
                                <td align="center"><b>IVA {{$factura->iva}} %</b></td>
                            </tr>
                            <tr width="33%">
                                <td align="center">
                                    @if($pagina == $paginaFinal)
                                        {{number_format($baseImponible, 2)}} €
                                    @endif
                                </td>
                                <td align="center">{{number_format($precioIVA, 2)}} €</td>
                            </tr>
                        </table>
                    </td>
                    <td width="33%">
                        <table>
                            <tr>
                                <td align="center"><b>TOTAL</b></td>
                            </tr>
                            <tr>
                                <td>{{$factura->importe}} €</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            

            <table width="100%" style="left:0;bottom:0">
                <tr>
                    <td width="60%">
                        <table style="border: 1px solid black" width="100%">
                            <tr><td><b>Sucursal: </b></td><td>{{$factura->sucursal}}</td></tr>
                            <tr><td><b>IBAN: </b></td><td>{{$factura->iban}}</td></tr>
                            <tr><td><b>BIC/SWIFT: </b></td><td>{{$factura->bic_switch}}</td></tr>
                        </table>
                    </td>
                    <td width="40%">
                        <table width="100%">
                            <tr><td clign="center"><b>Concepto</b></td></tr>
                            <tr><td>{{$factura->concepto}}</td></tr>
                        </table>
                    </td>
                </tr>
            </table>

            

        </div>

<?php

            $toggleCorrector = false;
            $columna = 0;

        }

    }

?>
    </body>

</html>