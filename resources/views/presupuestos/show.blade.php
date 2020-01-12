@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Presupuesto {{ $presupuesto->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/presupuestos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/presupuestos/' . $presupuesto->id . '/edit') }}" title="Edit Presupuesto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('presupuestos' . '/' . $presupuesto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Presupuesto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $presupuesto->id }}</td>
                                    </tr>
                                    <tr><th> Direccion </th><td> {{ $presupuesto->direccion }} </td></tr><tr><th> Ciudad </th><td> {{ $presupuesto->ciudad }} </td></tr><tr><th> Codigo Postal </th><td> {{ $presupuesto->codigo_postal }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
