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
            
            }
                
        });


    });
</script>

@endsection