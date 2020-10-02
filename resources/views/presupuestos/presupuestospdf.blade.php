<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Factura {{$presupuesto->id}}</title>
    </head>
    <body>
        <div style="height:20%">
            <div style="margin-botton:5px">

            <table width="100%">
                <tr>
                    <td colspan="2"><h1>Fontaneria López García</h1></td>
                    <td align="right"><h1>Presupuesto</h1></td>
                </tr>

                <tr>
                    <td><img src="{{ asset('images/logo.png') }}" width="100px"></td>
                    <td>
                        <table>
                            <tr>
                                <td align="center"><b> Datos de la empresa: </b></td>
                            </tr>
                            <tr>
                                <td>Juan Carlos López Ortiz {{$presupuesto->dni}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->direccion}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->ciudad . " " . $presupuesto->codigo_postal}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->telefono_personal}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->email}}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            
                            <tr>
                                <td align="center"><b> Datos del Cliente:</b></td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->nombre_cliente . " " . $presupuesto->dni_cliente}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->direccion_cliente}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->ciudad_cliente . " " . $presupuesto->codigo_postal_cliente}}</td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->email_cliente}}</td>
                            </tr>

                        </table>
                    </td>
                </tr>

            </table>

        </div>

    </div>

<br>

        <div>
                        
            <div width="50%">Presupuesto: {{$presupuesto->id}}</div>

            <div width="50%">Fecha: {{ date("d-m-Y",strtotime( $presupuesto->fecha ))}}</div>   

        </div>

        <br><br>

        <div style="border-style:solid;height:60%">
            <table class="table" width="100%">
            
                <tr color="blue">

                    <th width="55%" align="center">Concepto</th>
                    <th width="10%" align="center">Cant.</th>
                    <th width="10%" align="center">Pre. €</th>
                    <th width="10%" align="center">Des. %</th>
                    <th width="15%" align="center">Importe €</th>

                </tr>

                    <?php

                        $baseImponible = 0;
                        
                        for ($i=0; $i < count($trabajos['descripciones']); $i++) { 

                            $baseImponible += $trabajos['importes'][$i];
                            echo "<tr>";
                            
                                echo "<td align='left'>" . $trabajos['descripciones'][$i] . "</td>";
                                echo "<td align='right'>" . $trabajos['cantidades'][$i]. "</td>";
                                echo "<td align='right'>" . $trabajos['precios'][$i]. "</td>";
                                echo "<td align='right'>" . $trabajos['descuentos'][$i]. "</td>";
                                echo "<td align='right'>" . $trabajos['importes'][$i]. "</td>";
                        
                            echo "</tr>";
                        }

                    ?>

                
            </table>
        </div>

        
        <div style="position:fixed;left:0;bottom:70;width:100%">

            <table style="border: 1px solid black" width="100%">
                <tr>
                    <td width="33%">
                    
                    </td>
                    <td width="33%">
                        <table width="100%">
                            <tr width="66%">
                                <td align="center"><b>Base Imponible</b></td><td align="center"><b>IVA %</b></td>
                            </tr>
                            <tr width="33%">
                                <td align="center">{{number_format($baseImponible, 2)}}</td><td align="center">{{$presupuesto->iva}} %</td>
                            </tr>
                        </table>
                    </td>
                    <td width="33%">
                        <table>
                            <tr>
                                <td align="center"><b>TOTAL</b></td>
                            </tr>
                            <tr>
                                <td>{{$presupuesto->importe}} €</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

        </div>

    </body>
</html>