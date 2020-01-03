<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->text('dni')->nullable();
            $table->string('telefono_personal')->nullable();
            $table->string('telefono_oficina')->nullable();
            $table->text('email')->nullable();
            $table->date('fecha')->nullable();
            $table->text('direccion_cliente')->nullable();
            $table->integer('codigo_postal_cliente')->nullable();
            $table->text('dni_cliente')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->text('concepto')->nullable();
            $table->string('sucursal')->nullable();
            $table->integer('iban')->nullable();
            $table->string('bic_switch')->nullable();
            $table->integer('iva')->nullable();
            $table->integer('importe')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas');
    }
}
