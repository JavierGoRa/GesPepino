@extends('layouts.app')

@section('content')
<!-- <input type="hidden" name="url"> -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear Factura</div>
                    <div class="card-body">
                        <a href="{{ url('/facturas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/facturas') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
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

    function editRowTrabajo(id){

        $('#descripcion_trabajo').val($('#trabajo' + id).children().eq(0).children().val());
        $('#cantidad_trabajo').val($('#trabajo' + id).children().eq(1).children().val());
        $('#preciou_trabajo').val($('#trabajo' + id).children().eq(2).children().val());
        $('#descuento_trabajo').val($('#trabajo' + id).children().eq(3).children().val());
        $('#importe_trabajo').val($('#trabajo' + id).children().eq(4).children().val());

    }

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
                        '<td> <button type="button" class="btn btn-warning btn-sm" onClick="editRowTrabajo(' + tr + ')"><i class="fa fa-pencil"></i></button> <button type="button" class="btn btn-danger btn-sm" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
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

    });


</script>

@endsection