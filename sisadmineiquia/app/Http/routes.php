<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/empleado','EmpleadoController');

Route::put('admin/empleado/update/{id}','EmpleadoController@update');

Route::resource('admin/puesto','PuestoController');

Route::resource('admin/expedienteadministrativo','expedienteadministrativoController');
