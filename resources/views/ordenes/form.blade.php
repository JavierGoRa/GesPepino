
<div class="card">
    <div class="card-header">
        Datos del taller
    </div>
    <div class="card-body">
        <div class="form-group {{ $errors->has('id_orden_token') ? 'has-error' : ''}}">
            <label for="id_orden_token" class="control-label">{{ 'Orden de trabajo nº' }}</label>
            <input class="form-control" name="id_orden_token" type="number" id="id_orden_token" value="{{ isset($orden->id_orden_token) ? $orden->id_orden_token : '1'}}" >
            {!! $errors->first('id_orden_token', '<p class="help-block">:message</p>') !!}
        </div>
        <table width="100%">
            <tr>
                <td>
                    <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                        <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
                        <input disabled value="C/ Atarazana nº 34" class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($orden->direccion) ? $orden->direccion : ''}}" >
                        <input value="C/ Atarazana nº 34" class="form-control" name="direccion" type="hidden" id="direccion" value="{{ isset($orden->direccion) ? $orden->direccion : ''}}" >
                        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <input type="hidden" name="email" value="@gmail.com">
                <td>
                    <div class="form-group {{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
                        <label for="codigo_postal" class="control-label">{{ 'Codigo Postal' }}</label>
                        <input disabled value="18140" class="form-control" name="codigo_postal" type="number" id="codigo_postal" value="{{ isset($orden->codigo_postal) ? $orden->codigo_postal : ''}}" >
                        <input value="18140" class="form-control" name="codigo_postal" type="hidden" id="codigo_postal" value="{{ isset($orden->codigo_postal) ? $orden->codigo_postal : ''}}" >
                        {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                        <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
                        <input disabled value="La Zubia" class="form-control" name="ciudad" type="text" id="ciudad" value="{{ isset($orden->ciudad) ? $orden->ciudad : ''}}" >
                        <input value="La Zubia" class="form-control" name="ciudad" type="hidden" id="ciudad" value="{{ isset($orden->ciudad) ? $orden->ciudad : ''}}" >
                        {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group {{ $errors->has('dni') ? 'has-error' : ''}}">
                        <label for="dni" class="control-label">{{ 'Dni' }}</label>
                        <input disabled value="15471705H" class="form-control" name="dni" type="text" value="{{ isset($orden->dni) ? $orden->dni : ''}}" >
                        <input value="15471705H" class="form-control" name="dni" type="hidden" value="{{ isset($orden->dni) ? $orden->dni : ''}}" >
                        {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('telefono_personal') ? 'has-error' : ''}}">
                        <label for="telefono_personal" class="control-label">{{ 'Telefono Personal' }}</label>
                        <input value="645743446 / 600486776" class="form-control" name="telefono_personal" type="text" id="telefono_personal" value="{{ isset($orden->telefono_personal) ? $orden->telefono_personal : ''}}" >
                        {!! $errors->first('telefono_personal', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">
        Datos del cliente
    </div>
    <div class="card-body">
        <table width="100%">
            <tbody>
                <tr>
                    <td colspan="2">
                        <div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
                            <label for="nombre_cliente" class="control-label">{{ 'Nombre Cliente' }}</label>
                            <input class="form-control" rows="5" name="nombre_cliente" value="{{ isset($orden->nombre_cliente) ? $orden->nombre_cliente : ''}}" type="text" id="direccion_cliente" >
                            {!! $errors->first('nombre_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="form-group {{ $errors->has('email_cliente') ? 'has-error' : ''}}">
                            <label for="email_cliente" class="control-label">{{ 'Email Cliente' }}</label>
                            <input class="form-control" rows="5" name="email_cliente" value="{{ isset($orden->email_cliente) ? $orden->email_cliente : ''}}" type="text" id="direccion_cliente" >
                            {!! $errors->first('email_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group {{ $errors->has('dni_cliente') ? 'has-error' : ''}}">
                            <label for="dni_cliente" class="control-label">{{ 'Dni Cliente' }}</label>
                            <input class="form-control" rows="5" name="dni_cliente" type="textarea" value="{{ isset($orden->dni_cliente) ? $orden->dni_cliente : ''}}" id="dni_cliente" >
                            {!! $errors->first('dni_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group {{ $errors->has('direccion_cliente') ? 'has-error' : ''}}">
                            <label for="direccion_cliente" class="control-label">{{ 'Direccion Cliente' }}</label>
                            <input class="form-control" rows="5" name="direccion_cliente" value="{{ isset($orden->direccion_cliente) ? $orden->direccion_cliente : ''}}" type="text" id="direccion_cliente" >
                            {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('codigo_postal_cliente') ? 'has-error' : ''}}">
                            <label for="codigo_postal_cliente" class="control-label">{{ 'Codigo Postal Cliente' }}</label>
                            <input class="form-control" name="codigo_postal_cliente" type="number" id="codigo_postal_cliente" value="{{ isset($orden->codigo_postal_cliente) ? $orden->codigo_postal_cliente : ''}}" >
                            {!! $errors->first('codigo_postal_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('ciudad_cliente') ? 'has-error' : ''}}">
                            <label for="ciudad_cliente" class="control-label">{{ 'Ciudad Cliente' }}</label>
                            <input class="form-control" name="ciudad_cliente" type="text" id="ciudad_cliente" value="{{ isset($orden->ciudad_cliente) ? $orden->ciudad_cliente : ''}}" >
                            {!! $errors->first('ciudad_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">
        Datos del vehículo
    </div>
    <div class="card-body">
        <table width="100%">
            <tbody>
                <tr>
                    <td>
                        <div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
                            <label for="matricula" class="control-label">{{ 'Matrícula' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="matricula" value="{{ isset($orden->matricula) ? $orden->matricula : ''}}" type="text" id="matricula" >
                            {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="control-label">{{ 'Marca' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="marca" value="{{ isset($orden->marca) ? $orden->marca : ''}}" type="text" id="marca" >
                            {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
                            <label for="modelo" class="control-label">{{ 'Modelo' }}</label>
                            <input style="width:80%" class="form-control" name="modelo" type="text" id="modelo" value="{{ isset($orden->modelo) ? $orden->modelo : ''}}" >
                            {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('kilometros') ? 'has-error' : ''}}">
                            <label for="kilometros" class="control-label">{{ 'Kms' }}</label>
                            <input style="width:80%" class="form-control" name="kilometros" type="number" id="kilometros" value="{{ isset($orden->kilometros) ? $orden->kilometros : ''}}" >
                            {!! $errors->first('kilometros', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group {{ $errors->has('bastidor') ? 'has-error' : ''}}">
                            <label for="bastidor" class="control-label">{{ 'VIS' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="bastidor" value="{{ isset($orden->bastidor) ? $orden->bastidor : ''}}" type="text" id="bastidor" >
                            {!! $errors->first('bastidor', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<table class="table" width="100%">
    <tr>
        <td>
            <div class="form-group {{ $errors->has('fecha_recepcion') ? 'has-error' : ''}}">
                <label for="fecha_recepcion" class="control-label">{{ 'Fecha de recepcion' }}</label>
                <input class="form-control" name="fecha_recepcion" type="date" id="fecha_recepcion" value="{{ isset($orden->fecha_recepcion) ? $orden->fecha_recepcion : ''}}" >
                {!! $errors->first('fecha_recepcion', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('fecha_entrega') ? 'has-error' : ''}}">
                <label for="fecha_entrega" class="control-label">{{ 'Fecha de entrega' }}</label>
                <input class="form-control" name="fecha_entrega" type="date" id="fecha_entrega" value="{{ isset($orden->fecha_entrega) ? $orden->fecha_entrega : ''}}" >
                {!! $errors->first('fecha_entrega', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>


<table class="table" width="100%">
    <tr>
        <td colspan="2">
            <div class="form-group {{ $errors->has('servicio_cliente') ? 'has-error' : ''}} ">
                <label for="servicio_cliente" class="control-label">{{ 'Servicio al cliente' }}</label>
                <input class="form-control" name="servicio_cliente" type="text" id="servicio_cliente" value="{{ isset($orden->servicio_cliente) ? $orden->servicio_cliente : ''}}" >
                {!! $errors->first('servicio_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('descripcion_trabajo') ? 'has-error' : ''}} ">
                <label for="descripcion_trabajo" class="control-label">{{ 'Trabajo a realizar' }}</label>
                <textarea class="form-control" rows="5" name="descripcion_trabajo" type="textarea" id="descripcion_trabajo" >{{ isset($orden->descripcion_trabajo) ? $orden->descripcion_trabajo : ''}}</textarea>
                {!! $errors->first('descripcion_trabajo', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : ''}}">
                <label for="observaciones" class="control-label">{{ 'Observaciones' }}</label>
                <textarea class="form-control" rows="5" name="observaciones" type="textarea" id="observaciones" >{{ isset($orden->observaciones) ? $orden->observaciones : ''}}</textarea>
                {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>

<div class="form-group {{ $errors->has('presupuesto') ? 'has-error' : ''}}">
    <label for="presupuesto" class="control-label">{{ 'Presupuesto' }}</label>
    <input class="form-control" name="presupuesto" type="number" id="presupuesto" value="{{ isset($orden->presupuesto) ? $orden->presupuesto : ''}}" step="any">
    {!! $errors->first('presupuesto', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit" id="btn_submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }} </button>
</div>
