@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Crear Factura</div>
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

$(document).ready(function() {
    
    var tr = 0;

    $('#btn_anadir_trabajo').click(function(){


        $('#tbodyTrabajos').append(

            '<tr id="trabajo' + tr + '">' +
                '<td>' + $('#descripcion_trabajo').val() + ' <input type="hidden" name="descrpciones[]" value="' + $('#descripcion_trabajo').val() + '"></td>' +
                '<td>' + $('#preciou_trabajo').val() + ' <input type="hidden" name="precios[]" value="' + $('#preciou_trabajo').val() + '"></td>' +
                '<td>' + $('#descuento_trabajo').val() + ' <input type="hidden" name="descuentos[]" value="' + $('#descuento_trabajo').val() + '"></td>' +
                '<td>' + $('#iva_trabajo').val() + ' <input type="hidden" name="ivas[]" value="' + $('#iva_trabajo').val() + '"></td>' +
                '<td>' + $('#importe_trabajo').val() + ' <input type="hidden" name="importes[]" value="' + $('#importe_trabajo').val() + '"></td>' +
            '</tr>'

        );

        tr++;

    })

});


</script>

@endsection