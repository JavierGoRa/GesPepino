@extends('layouts.app')

@section('content')
    @php header('Access-Control-Allow-Origin: *'); @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Presupuesto</div>
                    <div class="card-body">
                        <a href="{{ url('/facturas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form id="form_store" method="POST" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('facturas.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script>

    function deleteRowTrabajo(id){
        $('#trabajo' + id).remove();
    }

    $(document).ready(function() {
        
        var tr = 0;

        $('#btn_anadir_trabajo').click(function(){

            if ($('#preciou_trabajo').val() != '') {
                if ($('#descuento_trabajo').val() != '') {
                    descuento = $('#descuento_trabajo').val() + ' <input type="hidden" name="descuentos[]" value="' + $('#descuento_trabajo').val() + '">' 
                } else {
                    descuento = '<input type="hidden" name="descuentos[]" value="0">' 
                }

                $('#tbodyTrabajos').append(
                    '<tr id="trabajo' + tr + '">' +
                        '<td>' + $('#descripcion_trabajo').val() + ' <input type="hidden" name="descrpciones[]" value="' + $('#descripcion_trabajo').val() + '"></td>' +
                        '<td>' + $('#cantidad_trabajo').val() + ' <input type="hidden" name="cantidades[]" value="' + $('#cantidad_trabajo').val() + '"></td>' +
                        '<td>' + $('#preciou_trabajo').val() + ' <input type="hidden" name="precios[]" value="' + $('#preciou_trabajo').val() + '"></td>' +
                        '<td>' + descuento + '</td>' +
                        '<td>' + $('#importe_trabajo').val() + ' <input type="hidden" name="importes[]" class="importes" value="' + $('#importe_trabajo').val() + '"></td>' +
                        '<td> <button type="button" class="btn btn-danger" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
                    '</tr>'
                );

            } else {
                alert("Introduce un precio unitario");
            }

            tr++;

        })

        $("#calcular").click(function() {

            if($('#preciou_trabajo').val() != ''){

                var precio = parseFloat($('#preciou_trabajo').val());

                if ($('#cantidad_trabajo').val() != '') {
                    precio = parseFloat($('#cantidad_trabajo').val()) * precio;
                }

                if ($('#descuento_trabajo').val() != '') {
                    descuento = precio / 100 * parseFloat($('#descuento_trabajo').val())
                    precio = precio - descuento;
                }

                $('#importe_trabajo').val(precio.toFixed(2));      

            } else {

                alert("Introduce un precio unitario");
            
            }      
        
        });

        $('#calcular_factura').click(function(){
            var importe = 0;

            if ($('#iva').val() != '') {
                if ($('.importes').length != 0) {

                    $('.importes').each(function() {
                        importe += parseFloat($(this).val());
                    });
        
                    var iva = importe / 100 * parseFloat($('#iva').val());
                    importe = iva + importe;
                    $('#importe').val(importe.toFixed(2));
        
                } else {
                    alert("Introduce algun trabajo");
                    $('#importe').val('');
                }
            } else {
                alert('Introcude un IVA');
                $('#importe').val('');
            }

        });

        $('#btn_submit').click(function(){

            console.log($('#form_store').serialize());


            async function postData(url, data) {
                // Default options are marked with *
                const response = await fetch(url, {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    mode: 'cors', // no-cors, *cors, same-origin
                    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: 'same-origin', // include, *same-origin, omit
                    headers: {
                        'Content-Type': 'application/json'
                        // 'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    redirect: 'follow', // manual, *follow, error
                    referrerPolicy: 'no-referrer', // no-referrer, *client
                    body: JSON.stringify(data) // body data type must match "Content-Type" header
                });
                return await response.json(); // parses JSON response into native JavaScript objects
            }

            postData('https://ges-facturas.000webhostapp.com/facturas/store', $('#form_store').serialize())
                .then((data) => {
                    console.log(data); // JSON data parsed by `response.json()` call
                });



        });



    });


</script>

@endsection