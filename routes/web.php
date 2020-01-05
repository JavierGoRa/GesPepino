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

Route::get('/', function () {
    return redirect('facturas');
});

Route::resource('facturas', 'FacturasController');
Route::resource('trabajos', 'TrabajosController');


Route::get('facturas/ajax/get/trabajos', 'FacturasController@getTrabajos')->name('facturas.getTrabajos');
