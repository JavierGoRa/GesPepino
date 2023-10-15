<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orden_trabajo';

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
    protected $fillable = [
        "fecha_recepcion", 
        "fecha_entrega", 
        "direccion", 
        "nombre_cliente", 
        "servicio_cliente", 
        "marca", 
        "modelo", 
        "trabajos_realizar", 
        "observaciones", 
        "presupuesto", 
        "id_orden_token", 
        "ciudad", 
        "codigo_postal", 
        "dni", 
        "telefono_personal", 
        "telefono_oficina", 
        "email", 
        "email_cliente", 
        "direccion_cliente", 
        "codigo_postal_cliente", 
        "dni_cliente", 
        "ciudad_cliente", 
        "kilometros", 
        "bastidor", 
        "matricula", 
        "descripcion_trabajo"
    ];
    
}