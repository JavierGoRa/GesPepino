<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuestotrabajo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'presupuestos_trabajos';

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
    protected $fillable = ['id_presupuesto', 'descripcion', 'cantidad', 'precio_u', 'descuento', 'iva', 'importe'];

    
}
