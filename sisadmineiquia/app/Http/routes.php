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

Route::group(['middleware' => ['auth','admin:adminsist','alltype']], function () {
      Route::resource('admin/empleado','EmpleadoController');
});

Route::group(['middleware' =>  ['auth','admin']], function () {
      Route::resource('admin/tiempo','TiempoAdicionalController');
});

Route::group(['middleware' =>  ['auth','admin']], function () {
      Route::resource('admin/puesto','PuestoController');
});

Route::group(['middleware' =>  ['auth','admin']], function () {
  Route::resource('admin/perfilpuesto','PerfilPuestoController');
});

Route::group(['middleware' => ['auth','admin:adminsist','alltype']], function () {
      Route::resource('admin/expedienteadministrativo','ExpedienteAdministrativoController');
});


Route::auth();

Route::resource('/home','HomeController');
//Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@edit','id');

Route::group(['middleware' => ['auth','adminsist']], function () {
	Route::resource('admin/users','UsersController');
});
