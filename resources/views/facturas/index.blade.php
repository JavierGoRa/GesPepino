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
                    <table class="table">
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
                        <tbody>
                        @foreach($facturas as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nombre_cliente }}</td>
                                <td>{{ date("d-m-Y",strtotime( $item->fecha )) }}</td>
                                <td>{{ $item->dni_cliente }}</td>
                                <td>{{ $item->codigo_postal_cliente }}</td>
                                <td>
                                    <a href="{{ url('/facturas/pdf/' . $item->id) }}" title="Generar PDF"><button class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </button></a>
                                    <a href="{{ url('/facturas/email/' . $item->id) }}" title="Enviar Email"><button class="btn btn-info btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/facturas/' . $item->id . '/edit') }}" title="Edit Factura"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                    <form method="POST" action="{{ url('/facturas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Factura" onclick="return confirm(&quot;¿Está seguro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $facturas->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
@endsection
