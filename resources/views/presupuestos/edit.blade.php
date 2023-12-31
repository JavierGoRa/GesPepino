@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Presupuesto #{{ $presupuesto->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/presupuestos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/presupuestos/' . $presupuesto->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('presupuestos.form', ['formMode' => 'edit'])

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

        $.ajax({

            url: "{{ route('presupuestos.getTrabajos') }}?id=" + {{$presupuesto->id}},
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
                            descripcion +
                            '<td>' + data['cantidades'][index] + ' <input type="hidden" name="cantidades[]" value="' + data['cantidades'][index] + '"></td>' +
                            '<td>' + data['precios'][index] + ' <input type="hidden" name="precios[]" value="' + data['precios'][index] + '"></td>' +
                            '<td>' + data['importes'][index] + ' <input type="hidden" name="importes[]" class="importes" value="' + data['importes'][index] + '"></td>' +
                            '<td> <button type="button" class="btn btn-danger" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
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
                        '<td>' + $('#descripcion_trabajo').val() + ' <input type="hidden" name="descrpciones[]" value="' + $('#descripcion_trabajo').val() + '"></td>' +
                        '<td>' + $('#cantidad_trabajo').val() + ' <input type="hidden" name="cantidades[]" value="' + $('#cantidad_trabajo').val() + '"></td>' +
                        '<td>' + $('#preciou_trabajo').val() + ' <input type="hidden" name="precios[]" value="' + $('#preciou_trabajo').val() + '"></td>' +
                        '<td>' + $('#importe_trabajo').val() + ' <input type="hidden" name="importes[]" class="importes" value="' + $('#importe_trabajo').val() + '"></td>' +
                        '<td> <button type="button" class="btn btn-danger" onClick="deleteRowTrabajo(' + tr + ')"><i class="fa fa-trash"></i></button> </td>' +
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

                $('#importe_trabajo').val(precio.toFixed(2));      

            } else {
                alert("Introduce un precio unitario");
            }      

        });


        $('#calcular_presupuesto').click(function(){
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

    })


</script>

@endsection