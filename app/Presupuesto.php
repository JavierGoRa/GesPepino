<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'presupuestos';

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
    protected $fillable = ['direccion', 'nombre_cliente', 'ciudad_cliente', 'email_cliente', 'ciudad', 'codigo_postal', 'dni', 'telefono_personal', 'telefono_oficina', 'email', 'fecha', 'direccion_cliente', 'codigo_postal_cliente', 'dni_cliente', 'concepto', 'sucursal', 'iban', 'bic_switch', 'iva', 'importe'];

    
}
