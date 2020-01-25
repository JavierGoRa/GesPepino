<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facturas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['direccion', 'id_factura_token', 'nombre_cliente', 'ciudad_cliente', 'email_cliente', 'ciudad', 'codigo_postal', 'dni', 'telefono_personal', 'telefono_oficina', 'email', 'fecha', 'direccion_cliente', 'codigo_postal_cliente', 'dni_cliente', 'fecha_vencimiento', 'concepto', 'sucursal', 'iban', 'bic_switch', 'iva', 'importe'];

    
}
