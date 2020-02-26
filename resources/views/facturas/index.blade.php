@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Facturas</div>
            <div class="card-body">
                <a href="{{ url('/facturas/create') }}" class="btn btn-success btn-sm" title="Add New Factura">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Factura
                </a>
                <form method="GET" action="{{ url('/facturas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>DNI</th>
                                <th>Codigo Postal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyFacturas">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function() {

        
        $.ajax({

            url: 'https://ges-facturas.000webhostapp.com/facturas',
            method: 'GET',
            dataType: 'json',
            success: function(data) {

                console.log(data);

                //Recorro las facturas
                data.forEach(registro => {
                    let tdTemplate =
                        '<tr>' +
                            '<td>' + registro.id_factura_token + '</td>' +
                            '<td>' + registro.nombre_cliente + '</td>' +
                            '<td>' + registro.fecha + '</td>' +
                            '<td>' + registro.dni_cliente + '</td>' +
                            '<td>' + registro.codigo_postal_cliente + '</td>' +
                            '<td>' +
                                '<a href="{{ url('/facturas/pdf/') }}' + registro.id + '" title="Generar PDF"><button class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </button></a>' +
                                '<a href="{{ url('/facturas/email/') }} ' + registro.id + ' " title="Enviar Email"><button class="btn btn-info btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>' +
                                '<a href="{{ url('/facturas') }}' + '/' + registro.id + '/edit' + '" title="Edit Factura"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>' +
                                
                                '<form method="POST" action="{{ url('/facturas') }}' + '/' + registro.id + '" accept-charset="UTF-8" style="display:inline">' +
                                    '{{ method_field('DELETE') }}' +
                                    '{{ csrf_field() }}' +
                                    '<button type="submit" class="btn btn-danger btn-sm" title="Delete Factura" onclick="return confirm(&quot;¿Está seguro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>';

                    $('#tbodyFacturas').append(tdTemplate);
                });
               

            
            }
                
        });


    });
</script>

@endsection