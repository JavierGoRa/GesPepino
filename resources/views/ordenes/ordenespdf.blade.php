<!DOCTYPE html>
<html lang="en">

    <body>
        
        <div style="height:20%;margin-top:0px">
            <div style="margin-botton:0px">

                <table height="100%" width="100%">
                    <tr>
                        <td colspan="2"><h1>Francisco José Vargas Fernández</h1></td>
                        <td align="right"><h1>ORDEN DE TRABAJO</h1></td>
                    </tr>

                    <tr>
                        <td><img src="{{ asset('images/logo1.png') }}" width="100px"></td>
                        <td  colspan="2" style="align-content:center">
                            <table width="100%">
                                <tr>
                                    <td align="center"><b> Datos de la empresa: </b></td>
                                </tr>
                                <tr>
                                    <td>Juan Carlos López Ortiz {{$orden->dni}}</td>
                                </tr>
                                <tr>
                                    <td>{{$orden->direccion}}</td>
                                </tr>
                                <tr>
                                    <td>{{$orden->ciudad . " " . $orden->codigo_postal}}</td>
                                </tr>
                                <tr>
                                    <td>{{$orden->telefono_personal}}</td>
                                </tr>
                                <tr>
                                    <td>{{$orden->email}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <br>

        <div height="50px"></div>

        <br>

        <table class="table" style="border: 1px solid black;border-colapse:colapse" width="100%" height="500px">
            <tr style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" align="center" colspan="2"> Orden: {{$orden->id_orden_token}} </td>
            </tr>
            <tr style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" colspan="2" align="center"> Dirección y fecha: {{$orden->direccion_cliente}} {{$orden->codigo_postal_cliente}} {{$orden->ciudad_cliente}}  {{ date("d-m-Y",strtotime( $orden->fecha_recepcion ))}} </td>
            </tr>
            <tr height="50px" style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" colspan="2"> Cliente: {{$orden->nombre_cliente}} - {{$orden->email_cliente}}</td>
            </tr>
            <tr style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" > Servicio: {{$orden->servicio_cliente}}</td>
                <td style="border: 1px solid black;border-colapse:colapse"> {{$orden->marca}} {{$orden->modelo}} - {{$orden->matricula}}</td>
            </tr>
            <tr height="100px" style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" align="center"> Recepcion:<br/> {{ date("d-m-Y",strtotime( $orden->fecha_recepcion ))}}</td>
                <td style="border: 1px solid black;border-colapse:colapse" align="center"> Entrega:<br/> {{ date("d-m-Y",strtotime( $orden->fecha_entrega ))}}</td>
            </tr>
            <tr height="150px" style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" colspan="2"> Trabajo a realizar: <br/>{{$orden->descripcion_trabajo}}
                </td>
            </tr>
            <tr height="150px" style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" colspan="2"> Observaciones: <br/>{{$orden->observaciones}}</td>
            </tr>
            <tr style="border: 1px solid black;border-colapse:colapse">
                <td style="border: 1px solid black;border-colapse:colapse" colspan="2" align="center"> Presupuesto:{{$orden->presupuesto}} €</td>
            </tr>
            
        </table>

        <br><br>

        <table width="100%">
            <tr>
                <td width="50%">Autorizo reparación:</td><td width="50%">Acepto presupuesto:</td>
            </tr>
        </table>

    </body>

</html>