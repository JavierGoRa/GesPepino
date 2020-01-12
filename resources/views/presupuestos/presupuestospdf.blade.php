<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Presupuesto {{$presupuesto->id}}</title>
    </head>
    <body>
        <div style="height:33%">
            <div style="margin-botton:50px">

                <div style="float:left">
                    <img src="{{ asset('images/logo.jpg') }}" width="100px"> 
                </div>

                <div style="float:right"> 
                    <h1>Presupuesto</h1>
                    <h1>Fontaneria Juan Carlos</h1>
                </div>
            </div>

            <span style="clear:left"></span>
            
            <div style="float:left">     

                <table>
                    <tr>
                        <td align="center"><b> Datos de la empresa: </b></td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->direccion}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->ciudad}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->codigo_postal}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->dni}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->telefono_personal}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->email}}</td>
                    </tr>
                </table>
            
            </div>

            <div style="float:right;width=50%">
                
                <table>
                
                    <tr>
                    
                        <td align="center"><b> Datos del Cliente:</b></td>

                    </tr>

                    <tr>
                        <td>{{$presupuesto->nombre_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->direccion_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->ciudad_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->codigo_postal_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->dni_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$presupuesto->email_cliente}}</td>
                    </tr>

                </table>
            
            </div>


        </div>

        <div>
                        
            <div width="50%">Presupuesto: {{$presupuesto->id}}</div>

            <div width="50%">Fecha: {{ date("d-m-Y",strtotime( $presupuesto->fecha ))}}</div>   

        </div>

        <br><br>

        <div>
            <table style="border-collapse: collapse;border: 1px solid black" class="table" width="100%">
            
                <tr color="blue">

                    <th width="55%" align="center">Descripción</th>
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


    </body>
</html>