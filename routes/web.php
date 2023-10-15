<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/e', function () {
    return redirect('facturas');
});
 */

Route::get('/', function () {
    return redirect('facturas');
});

Route::resource('ordenes', 'OrdenesController');
Route::resource('facturas', 'FacturasController');
Route::resource('trabajos', 'TrabajosController');

Route::resource('presupuestos', 'PresupuestosController');

Route::get('presupuestos/ajax/get/trabajos', 'PresupuestosController@getTrabajos')->name('presupuestos.getTrabajos');
Route::get('presupuestos/pdf/{id}', 'PresupuestosController@generarPDF');
Route::get('presupuestos/email/{id}', 'PresupuestosController@enviarFactura');

Route::get('queryCliente', 'FacturasController@queryCliente');

Route::get('facturas/ajax/get/trabajos', 'FacturasController@getTrabajos')->name('facturas.getTrabajos');
Route::get('facturas/pdf/{id}', 'FacturasController@generarPDF');
Route::get('facturas/email/{id}', 'FacturasController@enviarFactura');
Route::get('facturas/cambiarestado/{id}', 'FacturasController@cambiarEstado');

Route::get('ordenes/pdf/{id}', 'OrdenesController@generarPDF');

Route::get('getTokenDocumento', 'FacturasController@getNextToken')->name('getTokenDocumento');
