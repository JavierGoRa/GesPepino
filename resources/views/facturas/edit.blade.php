@extends('layouts.app')

@section('extraHead')
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Factura #{{ $factura->id_factura_token }}</div>
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

                        <form method="POST" action="{{ url('/facturas/' . $factura->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('facturas.form', ['formMode' => 'edit'])

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

        $('#referencia_trabajo').val($('#trabajo' + id).children().eq(0).children().val());
        $('#descripcion_trabajo').val($('#trabajo' + id).children().eq(1).children().val());
        $('#cantidad_trabajo').val($('#trabajo' + id).children().eq(2).children().val());
        $('#preciou_trabajo').val($('#trabajo' + id).children().eq(3).children().val());
        $('#iva_trabajo').val($('#trabajo' + id).children().eq(4).children().val());
        $('#importe_trabajo').val($('#trabajo' + id).children().eq(5).children().val());

    }
    function deleteRowTrabajo(id){
        $('#trabajo' + id).remove();
    }
    $(document).ready(function() {

        var tr = 0;

        $.ajax({

            url: "{{ route('facturas.getTrabajos') }}?id=" + {{$factura->id}},
            method: 'GET',
            dataType: 'json',
            success: function(data) {

                for (let index = 0; index < data['descripciones'].length; index++) {

                    if (data['descripciones'][index] !== null) {

                        descripcion = '<td>' + data['descripciones'][index] + ' <input type="hidden" name="descrpciones[]" value="' + data['descripciones'][index] + '"></td>';

                    } else {
                       
                        descripcion = '<td><input type="hidden" name="descrpciones[]"></td>';

                    }

                    $('#tbodyTrabajos').append(
                        '<tr id="trabajo' + tr + '">' +
                            '<td>' + data['referencias'][index] + ' <input type="hidden" name="referencias[]" value="' + data['referencias'][index] + '"></td>' +
                            descripcion +
                            '<td>' + data['cantidades'][index] + ' <input type="hidden" name="cantidades[]" value="' + data['cantidades'][index] + '"></td>' +
                            '<td>' + data['precios'][index] + ' <input type="hidden" name="precios[]" value="' + data['precios'][index] + '"></td>' +
                            '<td>' + data['ivas'][index] + ' <input type="hidden" name="ivas[]" value="' + data['ivas'][index] + '"></td>' +
                            '<td>' + data['importes'][index] + ' <input type="hidden" name="importes[]" class="importes" value="' + data['importes'][index] + '"></td>' +
                            '<td> <button type="button" class="btn btn-warning btn-sm" onClick="editRowTrabajo(' + tr + ')"><i class="fa fa-pencil"></i></button> <button type="button" class="btn btn-danger btn-sm" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
                        '</tr>'
                    );

                    tr++;
                }
            
            }
                
        });

        $('#btn_anadir_trabajo').click(function(){

            if ($('#preciou_trabajo').val() != '') {

                $('#tbodyTrabajos').append(
                    '<tr id="trabajo' + tr + '">' +
                        '<td>' + $('#referencia_trabajo').val() + ' <input type="hidden" name="referencias[]" value="' + $('#referencia_trabajo').val() + '"></td>' +
                        '<td>' + $('#descripcion_trabajo').val() + ' <input type="hidden" name="descrpciones[]" value="' + $('#descripcion_trabajo').val() + '"></td>' +
                        '<td>' + $('#cantidad_trabajo').val() + ' <input type="hidden" name="cantidades[]" value="' + $('#cantidad_trabajo').val() + '"></td>' +
                        '<td>' + $('#preciou_trabajo').val() + ' <input type="hidden" name="precios[]" value="' + $('#preciou_trabajo').val() + '"></td>' +
                        '<td>' + $('#iva_trabajo').val() + ' <input type="hidden" name="ivas[]" class="ivas" value="' + $('#iva_trabajo').val() + '"></td>' +
                        '<td>' + $('#importe_trabajo').val() + ' <input type="hidden" name="importes[]" class="importes" value="' + $('#importe_trabajo').val() + '"></td>' +
                        '<td> <button type="button" class="btn btn-warning btn-sm" onClick="editRowTrabajo(' + tr + ')"><i class="fa fa-pencil"></i></button> <button type="button" class="btn btn-danger btn-sm" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
                    '</tr>'
                );

            } else {
                alert("Introduce un precio unitario");
            }

            tr++;
        
        });

        
        $("#calcular").click(function() {

            if($('#preciou_trabajo').val() != ''){

                var precio = parseFloat($('#preciou_trabajo').val());

                if ($('#cantidad_trabajo').val() != '') {
                    precio = parseFloat($('#cantidad_trabajo').val()) * precio;
                }

                precio = (precio / 100 * parseFloat($('#iva_trabajo').val()) ) + precio;

                $('#importe_trabajo').val(precio.toFixed(2));      

            } else {
                alert("Introduce un precio unitario");
            }      

        });




        $('#calcular_factura').click(function(){
            var importe = 0;

            if ($('.importes').length != 0) {

                $('.importes').each(function() {
                    importe += parseFloat($(this).val());
                });

                $('#importe').val(importe.toFixed(2));
    
            } else {
                alert("Introduce algun trabajo");
                $('#importe').val('');
            }

        });

        $('#tipo_documento').change(function(){

            $.ajax({
                url: "{{ route('getTokenDocumento') }}?tipo=" + $(this).prop('value'),
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#id_factura_token').val(data['token']);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('error ' + errorThrown);
                }
            });
        });

    })


</script>

@endsection