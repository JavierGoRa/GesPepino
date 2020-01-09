<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Factura {{$factura->id}}</title>
    </head>
    <body>
        <div style="height:33%">
            
            <div style="margin-botton:50px">

                <div style="float:left">
                    <img src="{{ asset('images/logo.jpg') }}" width="100px"> 
                </div>

                <div style="float:right"> 
                    <h1>Fontaneria Juan Carlos</h1>
                </div>
            </div>

<span style="clear:left">-</span>
            
            <div style="float:left">            

                {{$factura->direccion}} <br>
                {{$factura->ciudad}} <br>
                {{$factura->codigo_postal}} <br>
                {{$factura->dni}} <br>
                {{$factura->telefono_personal}} <br>
                {{$factura->email}} <br>
            
            </div>

            <div style="float:right;width=50%">
                
                <table border="1">
                
                    <tr>
                    
                        <td><b> Cliente</b></td>

                    </tr>

                    <tr>
                        <td>{{$factura->nombre_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$factura->direccion_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$factura->ciudad_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$factura->codigo_postal_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$factura->dni_cliente}}</td>
                    </tr>
                    <tr>
                        <td>{{$factura->email_cliente}}</td>
                    </tr>

                </table>
            
            </div>


        </div>

        <div>
            <table border="2" class="table" width="100%">
            
                <tr color="blue">

                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio €</th>
                    <th>Descuento %</th>
                    <th>Importe €</th>

                </tr>

                    <?php
                        
                        for ($i=0; $i < count($trabajos['descripciones']); $i++) { 
                            echo "<tr>";
                            
                                echo "<td>" . $trabajos['descripciones'][$i] . "</td>";
                                echo "<td>" . $trabajos['cantidades'][$i]. "</td>";
                                echo "<td>" . $trabajos['precios'][$i]. "</td>";
                                echo "<td>" . $trabajos['descuentos'][$i]. "</td>";
                                echo "<td>" . $trabajos['importes'][$i]. "</td>";
                        
                            echo "</tr>";
                        }

                    ?>

                
            </table>
        </div>


    </body>
</html>