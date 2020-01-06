<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Factura {{$factura->id}}</title>
    </head>
    <body>

        <table class="table">
        
            <thead>

                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio €</th>
                <th>Descuento %</th>
                <th>Importe €</th>

            </thead>

            <tbody>

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

            
            </tbody>

        </table>
        
    </body>
</html>