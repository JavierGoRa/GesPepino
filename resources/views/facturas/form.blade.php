<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input value="C/ Fuentenueva Conjunto Fuentesol Bloque 6 Puerta 15" class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($factura->direccion) ? $factura->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="pull-right form-group {{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
    <label for="codigo_postal" class="control-label">{{ 'Codigo Postal' }}</label>
    <input value="29670" class="form-control col-md-4" name="codigo_postal" type="number" id="codigo_postal" value="{{ isset($factura->codigo_postal) ? $factura->codigo_postal : ''}}" >
    {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
</div>
<div class="pull-right form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
    <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
    <input value="San Pedro de Alcántara" class="form-control col-md-4" name="ciudad" type="text" id="ciudad" value="{{ isset($factura->ciudad) ? $factura->ciudad : ''}}" >
    {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dni') ? 'has-error' : ''}}">
    <label for="dni" class="control-label">{{ 'Dni' }}</label>
    <input value="78969194-M" class="form-control col-md-4" name="dni" type="text" id="codigo_postal" value="{{ isset($factura->dni) ? $factura->dni : ''}}" >
    {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono_personal') ? 'has-error' : ''}}">
    <label for="telefono_personal" class="control-label">{{ 'Telefono Personal' }}</label>
    <input value="664582822" class="form-control col-md-4" name="telefono_personal" type="text" id="telefono_personal" value="{{ isset($factura->telefono_personal) ? $factura->telefono_personal : ''}}" >
    {!! $errors->first('telefono_personal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono_oficina') ? 'has-error' : ''}}">
    <label for="telefono_oficina" class="control-label">{{ 'Telefono Oficina' }}</label>
    <input class="form-control col-md-4" name="telefono_oficina" type="text" id="telefono_oficina" value="{{ isset($factura->telefono_oficina) ? $factura->telefono_oficina : ''}}" >
    {!! $errors->first('telefono_oficina', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input value="{{ isset($factura->email) ? $factura->email : ''}}" class="form-control col-md-4" rows="5" name="email" type="text" id="email" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input value="" class="form-control col-md-4" name="fecha" type="date" id="fecha" value="{{ isset($factura->fecha) ? $factura->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
    <label for="nombre_cliente" class="control-label">{{ 'Nombre Cliente' }}</label>
    <input class="form-control" rows="5" name="nombre_cliente" value="{{ isset($factura->nombre_cliente) ? $factura->nombre_cliente : ''}}" type="text" id="direccion_cliente" >
    {!! $errors->first('nombre_cliente', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion_cliente') ? 'has-error' : ''}}">
    <label for="direccion_cliente" class="control-label">{{ 'Direccion Cliente' }}</label>
    <input class="form-control" rows="5" name="direccion_cliente" value="{{ isset($factura->direccion_cliente) ? $factura->direccion_cliente : ''}}" type="text" id="direccion_cliente" >
    {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigo_postal_cliente') ? 'has-error' : ''}}">
    <label for="codigo_postal_cliente" class="control-label">{{ 'Codigo Postal Cliente' }}</label>
    <input class="form-control col-md-4" name="codigo_postal_cliente" type="number" id="codigo_postal_cliente" value="{{ isset($factura->codigo_postal_cliente) ? $factura->codigo_postal_cliente : ''}}" >
    {!! $errors->first('codigo_postal_cliente', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dni_cliente') ? 'has-error' : ''}}">
    <label for="dni_cliente" class="control-label">{{ 'Dni Cliente' }}</label>
    <input class="form-control" rows="5" name="dni_cliente" type="textarea" value="{{ isset($factura->dni_cliente) ? $factura->dni_cliente : ''}}" id="dni_cliente" >
    {!! $errors->first('dni_cliente', '<p class="help-block">:message</p>') !!}
</div>

<table class="table">

    <thead>
        <th>Descripción</th>
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
<div class="form-group {{ $errors->has('sucursal') ? 'has-error' : ''}}">
    <label for="sucursal" class="control-label">{{ 'Sucursal' }}</label>
    <input class="form-control col-md-3" name="sucursal" type="text" id="sucursal" value="{{ isset($factura->sucursal) ? $factura->sucursal : ''}}" >
    {!! $errors->first('sucursal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('iban') ? 'has-error' : ''}}">
    <label for="iban" class="control-label">{{ 'Iban' }}</label>
    <input class="form-control col-md-4" name="iban" type="number" id="iban" value="{{ isset($factura->iban) ? $factura->iban : ''}}" >
    {!! $errors->first('iban', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bic_switch') ? 'has-error' : ''}}">
    <label for="bic_switch" class="control-label">{{ 'Bic Switch' }}</label>
    <input class="form-control col-md-4" name="bic_switch" type="text" id="bic_switch" value="{{ isset($factura->bic_switch) ? $factura->bic_switch : ''}}" >
    {!! $errors->first('bic_switch', '<p class="help-block">:message</p>') !!}
</div>
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
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
