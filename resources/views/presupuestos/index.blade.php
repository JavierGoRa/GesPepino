@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Presupuestos</div>
            <div class="card-body">
                <a href="{{ url('/presupuestos/create') }}" class="btn btn-success btn-sm" title="Add New Presupuesto">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Presupuesto
                </a>
                <form method="GET" action="{{ url('/presupuestos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        @foreach($presupuestos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nombre_cliente }}</td>
                                <td>{{ date("d-m-Y",strtotime( $item->fecha )) }}</td>
                                <td>{{ $item->dni_cliente }}</td>
                                <td>{{ $item->codigo_postal_cliente }}</td>
                                <td>
                                    <a href="{{ url('/presupuestos/pdf/' . $item->id) }}" title="Generar PDF"><button class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </button></a>
                                    <a href="{{ url('/presupuestos/email/' . $item->id) }}" title="Enviar Email"><button class="btn btn-info btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/presupuestos/' . $item->id . '/edit') }}" title="Edit Presupuesto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                    <form method="POST" action="{{ url('/presupuestos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Presupuesto" onclick="return confirm(&quot;¿Está seguro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $presupuestos->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
@endsection
