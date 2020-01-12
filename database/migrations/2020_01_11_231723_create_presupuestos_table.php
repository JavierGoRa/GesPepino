<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->text('dni')->nullable();
            $table->string('telefono_personal')->nullable();
            $table->string('telefono_oficina')->nullable();
            $table->text('email')->nullable();
            $table->text('email_cliente')->nullable();
            $table->date('fecha')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->text('direccion_cliente')->nullable();
            $table->integer('codigo_postal_cliente')->nullable();
            $table->text('dni_cliente')->nullable();
            $table->text('ciudad_cliente')->nullable();
            $table->text('concepto')->nullable();
            $table->float('iva')->nullable();
            $table->float('importe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos');
    }
}
