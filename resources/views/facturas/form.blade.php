
<div class="card">
    <div class="card-header">
        Datos del taller
    </div>
    <div class="card-body">
        <table width="100%">
            <tr>
                <td colspan="2">
                    <div class="{{ $errors->has('id_factura_token') ? 'has-error' : ''}}">
                        <label for="id_factura_token" class="control-label">{{ 'Factura nº' }}</label>
                        <input class="form-control" name="id_factura_token" type="number" id="id_factura_token" value="{{ isset($facturaToken) ? $facturaToken : '1'}}" >
                        {!! $errors->first('id_factura_token', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <td>
                    <div class="{{ $errors->has('tipo_documento') ? 'has-error' : ''}}">
                        <label for="tipo_documento" class="control-label">{{ 'Tipo de documento' }}</label>
                        <select class="form-control" name="tipo_documento" id="tipo_documento">
                            @foreach ($tiposDocumentos as $tipo)
                                <option value="{{ $tipo }}" {{ ( isset($factura->tipo_documento) && $factura->tipo_documento == $tipo) ? 'selected' : '' }}> {{ $tipo }} </option>
                            @endforeach
                        </select>
                        {!! $errors->first('tipo_documento', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="{{ $errors->has('direccion') ? 'has-error' : ''}}">
                        <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
                        <input disabled value="C/ Atarazana nº 34" class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($orden->direccion) ? $orden->direccion : ''}}" >
                        <input value="C/ Atarazana nº 34" class="form-control" name="direccion" type="hidden" id="direccion" value="{{ isset($orden->direccion) ? $orden->direccion : ''}}" >
                        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <input type="hidden" name="email" value="franciscovargasfernandeztalleres@hotmail.com">
                <td>
                    <div class="{{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
                        <label for="codigo_postal" class="control-label">{{ 'Codigo Postal' }}</label>
                        <input disabled value="18140" class="form-control" name="codigo_postal" type="number" id="codigo_postal" value="{{ isset($orden->codigo_postal) ? $orden->codigo_postal : ''}}" >
                        <input value="18140" class="form-control" name="codigo_postal" type="hidden" id="codigo_postal" value="{{ isset($orden->codigo_postal) ? $orden->codigo_postal : ''}}" >
                        {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <td>
                    <div class="{{ $errors->has('ciudad') ? 'has-error' : ''}}">
                        <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
                        <input disabled value="La Zubia" class="form-control" name="ciudad" type="text" id="ciudad" value="{{ isset($orden->ciudad) ? $orden->ciudad : ''}}" >
                        <input value="La Zubia" class="form-control" name="ciudad" type="hidden" id="ciudad" value="{{ isset($orden->ciudad) ? $orden->ciudad : ''}}" >
                        {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="{{ $errors->has('dni') ? 'has-error' : ''}}">
                        <label for="dni" class="control-label">{{ 'Dni' }}</label>
                        <input disabled value="15471705H" class="form-control" name="dni" type="text" value="{{ isset($orden->dni) ? $orden->dni : ''}}" >
                        <input value="15471705H" class="form-control" name="dni" type="hidden" value="{{ isset($orden->dni) ? $orden->dni : ''}}" >
                        {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
                <td>
                    <div class="{{ $errors->has('telefono_personal') ? 'has-error' : ''}}">
                        <label for="telefono_personal" class="control-label">{{ 'Telefono Personal' }}</label>
                        <input value="645743446/600486776" class="form-control" name="telefono_personal" type="text" id="telefono_personal" value="{{ isset($orden->telefono_personal) ? $orden->telefono_personal : ''}}" >
                        {!! $errors->first('telefono_personal', '<p class="help-block">:message</p>') !!}
                    </div>
                </td>
            <tr>
                <td>
                    <div class="{{ $errors->has('fecha') ? 'has-error' : ''}}">
                        <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
                        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($factura->fecha) ? $factura->fecha : ''}}" >
                        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
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
                        <div class="{{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
                            <label for="nombre_cliente" class="control-label">{{ 'Nombre Cliente' }}</label>
                            <!-- <select class="form-control selectpicker" name="nombre_cliente" data-live-search="true" id="nombre_cliente">
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>                            
                                @endforeach

                            </select> -->
                            
                            <input class="form-control" rows="5" name="nombre_cliente" value="{{ isset($factura->nombre_cliente) ? $factura->nombre_cliente : ''}}" type="text" id="direccion_cliente" >

                            {!! $errors->first('nombre_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="{{ $errors->has('email_cliente') ? 'has-error' : ''}}">
                            <label for="email_cliente" class="control-label">{{ 'Email Cliente' }}</label>
                            <input class="form-control" rows="5" name="email_cliente" value="{{ isset($factura->email_cliente) ? $factura->email_cliente : ''}}" type="text" id="email_cliente" >
                            {!! $errors->first('email_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="{{ $errors->has('dni_cliente') ? 'has-error' : ''}}">
                            <label for="dni_cliente" class="control-label">{{ 'DNI / CIF' }}</label>
                            <input class="form-control" rows="5" name="dni_cliente" type="textarea" value="{{ isset($factura->dni_cliente) ? $factura->dni_cliente : ''}}" id="dni_cliente" >
                            {!! $errors->first('dni_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="{{ $errors->has('direccion_cliente') ? 'has-error' : ''}}">
                            <label for="direccion_cliente" class="control-label">{{ 'Direccion Cliente' }}</label>
                            <input class="form-control" rows="5" name="direccion_cliente" value="{{ isset($factura->direccion_cliente) ? $factura->direccion_cliente : ''}}" type="text" id="direccion_cliente" >
                            {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('codigo_postal_cliente') ? 'has-error' : ''}}">
                            <label for="codigo_postal_cliente" class="control-label">{{ 'Codigo Postal Cliente' }}</label>
                            <input class="form-control" name="codigo_postal_cliente" type="number" id="codigo_postal_cliente" value="{{ isset($factura->codigo_postal_cliente) ? $factura->codigo_postal_cliente : ''}}" >
                            {!! $errors->first('codigo_postal_cliente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('ciudad_cliente') ? 'has-error' : ''}}">
                            <label for="ciudad_cliente" class="control-label">{{ 'Ciudad / Provincia' }}</label>
                            <input class="form-control" name="ciudad_cliente" type="text" id="ciudad_cliente" value="{{ isset($factura->ciudad_cliente) ? $factura->ciudad_cliente : ''}}" >
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
                        <div class="{{ $errors->has('matricula') ? 'has-error' : ''}}">
                            <label for="matricula" class="control-label">{{ 'Matrícula' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="matricula" value="{{ isset($factura->matricula) ? $factura->matricula : ''}}" type="text" id="matricula" >
                            {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="control-label">{{ 'Marca' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="marca" value="{{ isset($factura->marca) ? $factura->marca : ''}}" type="text" id="marca" >
                            {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('modelo') ? 'has-error' : ''}}">
                            <label for="modelo" class="control-label">{{ 'Modelo' }}</label>
                            <input style="width:80%" class="form-control" name="modelo" type="text" id="modelo" value="{{ isset($factura->modelo) ? $factura->modelo : ''}}" >
                            {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('kilometros') ? 'has-error' : ''}}">
                            <label for="kilometros" class="control-label">{{ 'Km' }}</label>
                            <input style="width:80%" class="form-control" name="kilometros" type="number" id="kilometros" value="{{ isset($factura->kilometros) ? $factura->kilometros : ''}}" >
                            {!! $errors->first('kilometros', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                    <td>
                        <div class="{{ $errors->has('bastidor') ? 'has-error' : ''}}">
                            <label for="bastidor" class="control-label">{{ 'VIN' }}</label>
                            <input style="width:80%" class="form-control" rows="5" name="bastidor" value="{{ isset($factura->bastidor) ? $factura->bastidor : ''}}" type="text" id="bastidor" >
                            {!! $errors->first('bastidor', '<p class="help-block">:message</p>') !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<table class="table" width="100%">

    <thead>
        <th>Referencia</th>
        <th>Concepto</th>
        <th>Cantidad</th>
        <th>Precio/u €</th>
        <th>IVA</th>
        <th>Importe €</th>
        <th></th>
    </thead>
    <tbody id="tbodyTrabajos">
        <tr>
            <td width="15%">
                <input class="form-control" id="referencia_trabajo" type="text" placeholder="Referencia">
            </td>
            <td width="40%">
                <input class="form-control" id="descripcion_trabajo" type="text" placeholder="Descripción">
            </td>
            <td width="10%">
                <input class="form-control" id="cantidad_trabajo" type="number">
            </td>
            <td width="10%">
                <input class="form-control" id="preciou_trabajo" type="number" step="any">
            </td>
            <td width="10%">
                <input class="form-control" id="iva_trabajo" type="number" step="any">
            </td>
            <td width="15%">
                <input class="form-control" id="importe_trabajo" type="number" disabled placeholder="Importe" step="any">
            </td>
            <td>
                <button style="width:30px;margin-bottom:2px" id="calcular" class="btn-success" type="button"><i class="fa fa-euro"></i></button>
                <button style="width:30px" id="btn_anadir_trabajo" class="btn-primary" type="button"><i class="fa fa-arrow-down"></i></button>
            </td>
        </tr>
    </tbody>

</table>
<table class="table" width="100%">
    <tr>
        <td>
            <div class="{{ $errors->has('descripcion_trabajo') ? 'has-error' : ''}} ">
                <label for="descripcion_trabajo" class="control-label">{{ 'Descripcion de trabajo' }}</label>
                <textarea class="form-control" rows="5" name="descripcion_trabajo" type="textarea" maxlength="320" id="descr_trabajo" >{{ isset($factura->descripcion_trabajo) ? $factura->descripcion_trabajo : ''}}</textarea>
                {!! $errors->first('descripcion_trabajo', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="{{ $errors->has('observaciones') ? 'has-error' : ''}}">
                <label for="observaciones" class="control-label">{{ 'Observaciones' }}</label>
                <textarea class="form-control" rows="5" name="observaciones" type="textarea" id="observaciones" maxlength="60" >{{ isset($factura->observaciones) ? $factura->observaciones : ''}}</textarea>
                {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>

<table class="table" width="100%">
    <tr>
        <td>
            <div class="{{ $errors->has('sucursal') ? 'has-error' : ''}}">
                <label for="sucursal" class="control-label">{{ 'Sucursal' }}</label>
                <input class="form-control" name="sucursal" type="text" id="sucursal" value="{{ isset($factura->sucursal) ? $factura->sucursal : ''}}" >
                {!! $errors->first('sucursal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="{{ $errors->has('iban') ? 'has-error' : ''}}">
                <label for="iban" class="control-label">{{ 'Iban' }}</label>
                <input class="form-control" name="iban" type="text" id="iban" value="{{ isset($factura->iban) ? $factura->iban : ''}}" >
                {!! $errors->first('iban', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="{{ $errors->has('bic_switch') ? 'has-error' : ''}}">
                <label for="bic_switch" class="control-label">{{ 'Bic Switch' }}</label>
                <input class="form-control" name="bic_switch" type="text" id="bic_switch" value="{{ isset($factura->bic_switch) ? $factura->bic_switch : ''}}" >
                {!! $errors->first('bic_switch', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>

<div class="">
    <button margin-left="5%" type="button" id="calcular_factura" class="btn btn-success"><i class="fa fa-euro"> Calcular factura</i></button>
</div>
<br>
<div class="{{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="control-label">{{ 'Importe €' }}</label>
    <input class="form-control" name="importe" type="number" id="importe" value="{{ isset($factura->importe) ? $factura->importe : ''}}" step="any">
    {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div><br>

<div class="">
    <button class="btn btn-primary" type="submit" id="btn_submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }} </button>
</div>
