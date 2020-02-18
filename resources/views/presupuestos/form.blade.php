<table width="100%">
    <tr>
        <td>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
                <input disabled value="C/ Fuentenueva Conjunto Fuentesol Bloque 6 Puerta 15" class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($presupuesto->direccion) ? $presupuesto->direccion : ''}}" >
                <input value="C/ Fuentenueva Conjunto Fuentesol Bloque 6 Puerta 15" class="form-control" name="direccion" type="hidden" id="direccion" value="{{ isset($presupuesto->direccion) ? $presupuesto->direccion : ''}}" >
                {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('codigo_postal') ? 'has-error' : ''}}">
                <label for="codigo_postal" class="control-label">{{ 'Codigo Postal' }}</label>
                <input disabled value="29670" class="form-control" name="codigo_postal" type="number" id="codigo_postal" value="{{ isset($presupuesto->codigo_postal) ? $presupuesto->codigo_postal : ''}}" >
                <input value="29670" class="form-control" name="codigo_postal" type="hidden" id="codigo_postal" value="{{ isset($presupuesto->codigo_postal) ? $presupuesto->codigo_postal : ''}}" >
                {!! $errors->first('codigo_postal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <input type="hidden" name="email" value="fontaneriajuancarlosinfo@gmail.com">
        <td>
            <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
                <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
                <input disabled value="San Pedro de Alcántara" class="form-control" name="ciudad" type="text" id="ciudad" value="{{ isset($presupuesto->ciudad) ? $presupuesto->ciudad : ''}}" >
                <input value="San Pedro de Alcántara" class="form-control" name="ciudad" type="hidden" id="ciudad" value="{{ isset($presupuesto->ciudad) ? $presupuesto->ciudad : ''}}" >
                {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('dni') ? 'has-error' : ''}}">
                <label for="dni" class="control-label">{{ 'Dni' }}</label>
                <input disabled value="78969194-M" class="form-control" name="dni" type="text" id="codigo_postal" value="{{ isset($presupuesto->dni) ? $presupuesto->dni : ''}}" >
                <input value="78969194M" class="form-control" name="dni" type="hidden" id="codigo_postal" value="{{ isset($presupuesto->dni) ? $presupuesto->dni : ''}}" >
                {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('telefono_personal') ? 'has-error' : ''}}">
                <label for="telefono_personal" class="control-label">{{ 'Telefono Personal' }}</label>
                <input value="664582822" class="form-control" name="telefono_personal" type="text" id="telefono_personal" value="{{ isset($presupuesto->telefono_personal) ? $presupuesto->telefono_personal : ''}}" >
                {!! $errors->first('telefono_personal', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('telefono_oficina') ? 'has-error' : ''}}">
                <label for="telefono_oficina" class="control-label">{{ 'Telefono Oficina' }}</label>
                <input class="form-control" name="telefono_oficina" type="text" id="telefono_oficina" value="{{ isset($presupuesto->telefono_oficina) ? $presupuesto->telefono_oficina : ''}}" >
                {!! $errors->first('telefono_oficina', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
                <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($presupuesto->fecha) ? $presupuesto->fecha : ''}}" >
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
                <input class="form-control" rows="5" name="direccion_cliente" value="{{ isset($presupuesto->direccion_cliente) ? $presupuesto->direccion_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('direccion_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('codigo_postal_cliente') ? 'has-error' : ''}}">
                <label for="codigo_postal_cliente" class="control-label">{{ 'Codigo Postal Cliente' }}</label>
                <input class="form-control" name="codigo_postal_cliente" type="number" id="codigo_postal_cliente" value="{{ isset($presupuesto->codigo_postal_cliente) ? $presupuesto->codigo_postal_cliente : ''}}" >
                {!! $errors->first('codigo_postal_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('ciudad_cliente') ? 'has-error' : ''}}">
                <label for="ciudad_cliente" class="control-label">{{ 'Ciudad Cliente' }}</label>
                <input class="form-control" name="ciudad_cliente" type="text" id="ciudad_cliente" value="{{ isset($presupuesto->ciudad_cliente) ? $presupuesto->ciudad_cliente : ''}}" >
                {!! $errors->first('ciudad_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
                <label for="nombre_cliente" class="control-label">{{ 'Nombre Cliente' }}</label>
                <input class="form-control" rows="5" name="nombre_cliente" value="{{ isset($presupuesto->nombre_cliente) ? $presupuesto->nombre_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('nombre_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td colspan="1">
            <div class="form-group {{ $errors->has('email_cliente') ? 'has-error' : ''}}">
                <label for="email_cliente" class="control-label">{{ 'Email Cliente' }}</label>
                <input class="form-control" rows="5" name="email_cliente" value="{{ isset($presupuesto->email_cliente) ? $presupuesto->email_cliente : ''}}" type="text" id="direccion_cliente" >
                {!! $errors->first('email_cliente', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group {{ $errors->has('dni_cliente') ? 'has-error' : ''}}">
                <label for="dni_cliente" class="control-label">{{ 'Dni Cliente' }}</label>
                <input class="form-control" rows="5" name="dni_cliente" type="textarea" value="{{ isset($presupuesto->dni_cliente) ? $presupuesto->dni_cliente : ''}}" id="dni_cliente" >
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
<div class="form-group {{ $errors->has('iva') ? 'has-error' : ''}}">
    <label for="iva" class="control-label">{{ 'Iva' }}</label>
    <input class="form-control col-md-2" name="iva" type="number" id="iva" value="{{ isset($presupuesto->iva) ? $presupuesto->iva : ''}}" step="any">
    {!! $errors->first('iva', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">

<button type="button" id="calcular_presupuesto" class="btn btn-success"><i class="fa fa-euro"> Calcular presupuesto</i></button>
</div>
<div class="form-group {{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="control-label">{{ 'Importe' }}</label>
    <input class="form-control" name="importe" type="number" id="importe" value="{{ isset($presupuesto->importe) ? $presupuesto->importe : ''}}" step="any">
    {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}"> {{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }} </button>
</div>
