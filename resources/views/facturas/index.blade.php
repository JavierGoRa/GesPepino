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

                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>	

                                <strong>{{ $message }}</strong>

                        </div>

                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" >#</th>
                                <th>Nombre</th>
                                <th class="text-center" >Pagada</th>
                                <th class="text-center" >Fecha</th>
                                <th class="text-center" >DNI</th>
                                <th class="text-center" >Codigo Postal</th>
                                <th class="text-center" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($facturas as $item)
                            <tr>
                                <td class="text-center">{{ $item->id_factura_token }}</td>
                                <td>{{ $item->nombre_cliente }}</td>

                                @if( $item->estado == 0)
                                    <td class="text-center">
                                        <a href="{{action('FacturasController@cambiarEstado', ['id' => $item->id])}}">
                                            <i class="fa fa-check-square" style="color:red"></i>
                                        </a>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <a href="{{action('FacturasController@cambiarEstado', ['id' => $item->id])}}">
                                            <i class="fa fa-check-square" style="color:green"></i>
                                        </a>
                                    </td>
                                @endif

                                <td class="text-center">{{ date("d-m-Y",strtotime( $item->fecha )) }}</td>
                                <td class="text-center">{{ $item->dni_cliente }}</td>
                                <td class="text-center">{{ $item->codigo_postal_cliente }}</td>
                                <td class="text-center">
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

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

@endsection