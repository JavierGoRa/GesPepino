<div class="form-group {{ $errors->has('id_factura_token') ? 'has-error' : ''}}">
    <label for="id_factura_token" class="control-label">{{ 'Factura nº' }}</label>
    <input class="form-control" name="id_factura_token" type="number" id="id_factura_token" value="{{ isset($factura->id_factura_token) ? $factura->id_factura_token : ''}}" >
    {!! $errors->first('id_factura_token', '<p class="help-block">:message</p>') !!}
</div>
<table width="100%">
    <tr>
        <td>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
                <input disabled value="C/ Fuentenueva Conjunto Fuentesol Bloque 6 Puerta 15" class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($factura->direccion) ? $factura->direccion : ''}}" >
                <input value="C/ Fuentenueva Conjunto Fuentesol Bloque 6 Puerta 15" class="form-control" name="direccion" type="hidden" id="direccion" value="{{ isset($factura->direccion) ? $factura->direccion : ''}}" >
                {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <input type="hidden" name="email" value="fontaneriajuancarlosinfo@gmail.com">
        <td>
            <div class="form-group {{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
                <label for="codigo_postal" class="control-label">{{ 'Codigo Postal' }}</label>
                <input disabled value="29670" class="form-control" name="codigo_postal" type="number" id="codigo_postal" value="{{ isset($factura->codigo_postal) ? $factura->codigo_postal : ''}}" >
                <input value="29670" class="form-control" name="codigo_postal" type="hidden" id="codigo_postal" value="{{ isset($factura->codigo_postal) ? $factura->codigo_postal : ''}}" >
                {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
                <input disabled value="San Pedro de Alcántara" class="form-control" name="ciudad" type="text" id="ciudad" value="{{ isset($factura->ciudad) ? $factura->ciudad : ''}}" >
                <input value="San Pedro de Alcántara" class="form-control" name="ciudad" type="hidden" id="ciudad" value="{{ isset($factura->ciudad) ? $factura->ciudad : ''}}" >
                {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('dni') ? 'has-error' : ''}}">
                <label for="dni" class="control-label">{{ 'Dni' }}</label>
                <input disabled value="78969194-M" class="form-control" name="dni" type="text" id="codigo_postal" value="{{ isset($factura->dni) ? $factura->dni : ''}}" >
                <input value="78969194M" class="form-control" name="dni" type="hidden" id="codigo_postal" value="{{ isset($factura->dni) ? $factura->dni : ''}}" >
                {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('telefono_personal') ? 'has-error' : ''}}">
                <label for="telefono_personal" class="control-label">{{ 'Telefono Personal' }}</label>
                <input value="664582822" class="form-control" name="telefono_personal" type="text" id="telefono_personal" value="{{ isset($factura->telefono_personal) ? $factura->telefono_personal : ''}}" >
                {!! $errors->first('telefono_personal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('telefono_oficina') ? 'has-error' : ''}}">
                <label for="telefono_oficina" class="control-label">{{ 'Telefono Oficina' }}</label>
                <input class="form-control" name="telefono_oficina" type="text" id="telefono_oficina" value="{{ isset($factura->telefono_oficina) ? $factura->telefono_oficina : ''}}" >
                {!! $errors->first('telefono_oficina', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
                <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($factura->fecha) ? $factura->fecha : ''}}" >
                {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td>
            <div class="form-group {{ $errors->has('direccion_cliente') ? 'has-error' : ''}}">
                <label for="direccion_cliente" class="control-label">{{ 'Direccion Cliente' }}</label>
                <input class="form-control" rows="5" name="direccion_cliente" value="{{ isset($factura->direccion_cliente) ? $factura->direccion_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('codigo_postal_cliente') ? 'has-error' : ''}}">
                <label for="codigo_postal_cliente" class="control-label">{{ 'Codigo Postal Cliente' }}</label>
                <input class="form-control" name="codigo_postal_cliente" type="number" id="codigo_postal_cliente" value="{{ isset($factura->codigo_postal_cliente) ? $factura->codigo_postal_cliente : ''}}" >
                {!! $errors->first('codigo_postal_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('ciudad_cliente') ? 'has-error' : ''}}">
                <label for="ciudad_cliente" class="control-label">{{ 'Ciudad Cliente' }}</label>
                <input class="form-control" name="ciudad_cliente" type="text" id="ciudad_cliente" value="{{ isset($factura->ciudad_cliente) ? $factura->ciudad_cliente : ''}}" >
                {!! $errors->first('ciudad_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
                <label for="nombre_cliente" class="control-label">{{ 'Nombre Cliente' }}</label>
                <input class="form-control" rows="5" name="nombre_cliente" value="{{ isset($factura->nombre_cliente) ? $factura->nombre_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('nombre_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td colspan="1">
            <div class="form-group {{ $errors->has('email_cliente') ? 'has-error' : ''}}">
                <label for="email_cliente" class="control-label">{{ 'Email Cliente' }}</label>
                <input class="form-control" rows="5" name="email_cliente" value="{{ isset($factura->email_cliente) ? $factura->email_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('email_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('dni_cliente') ? 'has-error' : ''}}">
                <label for="dni_cliente" class="control-label">{{ 'Dni Cliente' }}</label>
                <input class="form-control" rows="5" name="dni_cliente" type="textarea" value="{{ isset($factura->dni_cliente) ? $factura->dni_cliente : ''}}" id="dni_cliente" >
                {!! $errors->first('dni_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>
<table class="table" width="100%">

    <thead>
        <th>Concepto</th>
        <th>Cantidad</th>
        <th>Precio/u €</th>
        <th>Descuento %</th>
        <th>Importe €</th>
        <th></th>
    </thead>
    <tbody id="tbodyTrabajos">
        <tr>
            <td>
                <input class="form-control" id="descripcion_trabajo" type="text" placeholder="Descripción">
            </td>
            <td>
                <input class="form-control" id="cantidad_trabajo" type="number" placeholder="Cantidad">
            </td>
            <td>
                <input class="form-control" id="preciou_trabajo" type="number" placeholder="Precio/Unidad" step="any">
            </td>
            <td>
                <input class="form-control" id="descuento_trabajo" type="number" placeholder="Descuento" step="any">
            </td>
            <td>
                <input class="form-control" id="importe_trabajo" type="number" disabled placeholder="Importe" step="any">
            </td>
            <td>
                <button style="width:30px;margin-bottom:2px" id="calcular" class="btn-success" type="button"><i class="fa fa-euro"></i></button>
                <button style="width:30px" id="btn_anadir_trabajo" class="btn-primary" type="button"><i class="fa fa-arrow-down"></i></button>
            </td>
        </tr>
    </tbody>

</table>

<div class="form-group {{ $errors->has('fecha_vencimiento') ? 'has-error' : ''}}">
    <label for="fecha_vencimiento" class="control-label">{{ 'Fecha Vencimiento' }}</label>
    <input class="form-control col-md-4" name="fecha_vencimiento" type="date" id="fecha_vencimiento" value="{{ isset($factura->fecha_vencimiento) ? $factura->fecha_vencimiento : ''}}" >
    {!! $errors->first('fecha_vencimiento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('concepto') ? 'has-error' : ''}}">
    <label for="concepto" class="control-label">{{ 'Concepto' }}</label>
    <textarea class="form-control" rows="5" name="concepto" type="textarea" id="concepto" >{{ isset($factura->concepto) ? $factura->concepto : ''}}</textarea>
    {!! $errors->first('concepto', '<p class="help-block">:message</p>') !!}
</div>
<table width="100%">
    <tr>
        <td>
            <div class="form-group {{ $errors->has('sucursal') ? 'has-error' : ''}}">
                <label for="sucursal" class="control-label">{{ 'Sucursal' }}</label>
                <input class="form-control" name="sucursal" type="text" id="sucursal" value="{{ isset($factura->sucursal) ? $factura->sucursal : 'BANCO SABADELL'}}" >
                {!! $errors->first('sucursal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('iban') ? 'has-error' : ''}}">
                <label for="iban" class="control-label">{{ 'Iban' }}</label>
                <input class="form-control" name="iban" type="text" id="iban" value="{{ isset($factura->iban) ? $factura->iban : 'ES24 0081 0600 7400 0183 4593'}}" >
                {!! $errors->first('iban', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('bic_switch') ? 'has-error' : ''}}">
                <label for="bic_switch" class="control-label">{{ 'Bic Switch' }}</label>
                <input class="form-control" name="bic_switch" type="text" id="bic_switch" value="{{ isset($factura->bic_switch) ? $factura->bic_switch : 'BSABESBB'}}" >
                {!! $errors->first('bic_switch', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>
<div class="form-group {{ $errors->has('iva') ? 'has-error' : ''}}">
    <label for="iva" class="control-label">{{ 'Iva' }}</label>
    <input class="form-control col-md-2" name="iva" type="number" id="iva" value="{{ isset($factura->iva) ? $factura->iva : ''}}" step="any">
    {!! $errors->first('iva', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">

<button type="button" id="calcular_factura" class="btn btn-success"><i class="fa fa-euro"> Calcular factura</i></button>
</div>
<div class="form-group {{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="control-label">{{ 'Importe' }}</label>
    <input class="form-control" name="importe" type="number" id="importe" value="{{ isset($factura->importe) ? $factura->importe : ''}}" step="any">
    {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }} </button>
</div>
