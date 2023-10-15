@extends('layouts.app')

@section('content')
    <!-- <input type="hidden" name="urlPrev" id="urlPrev"> -->

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Ordenes</div>
            <div class="card-body">
                <div id="anosSelectibles" class="form-group">
                    <!-- Aquí irán todos los años elegibles para filtrar -->
                    @foreach($fechasSelectibles as $item)
                        @if ($item != null)

                            @if($item == $anoSeleccionado)
                                <a href="{{ url('/ordenes?ano=' . $item) }}" class="btn btn-primary active">
                            @else
                                <a href="{{ url('/ordenes?ano=' . $item) }}" class="btn btn-primary">
                            @endif

                                {{$item}}
                            </a>

                        @endif
                    @endforeach
                </div>
                <a href="{{ url('/ordenes/create') }}" class="btn btn-success btn-sm" title="Add New Orden">
                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Orden de trabajo
                </a>
                <form method="GET" action="{{ url('/ordenes') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <th class="text-center" >Fecha</th>
                                <th class="text-center" >DNI</th>
                                <th class="text-center" >Codigo Postal</th>
                                <th class="text-center" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ordenes as $item)
                            <tr>
                                <td class="text-center">{{ $item->id_orden_token }}</td>
                                <td>{{ $item->nombre_cliente }}</td>

                                <td class="text-center">{{ date("d-m-Y",strtotime( $item->fecha_recepcion )) }}</td>
                                <td class="text-center">{{ $item->dni_cliente }}</td>
                                <td class="text-center">{{ $item->codigo_postal_cliente }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/ordenes/pdf/' . $item->id) }}" title="Generar PDF"><button class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </button></a>
                                    <a href="{{ url('/ordenes/email/' . $item->id) }}" title="Enviar Email"><button class="btn btn-info btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/ordenes/' . $item->id . '/edit') }}" title="Edit Orden"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                    <form method="POST" action="{{ url('/ordenes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Orden" onclick="return confirm(&quot;¿Está seguro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $ordenes->appends(['search' => Request::get('search')])->render() !!} </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {

        /* console.log('@@@' + window.location.href);
        $('#urlPrev').val(window.location.href); */



    })
</script>

@endsection