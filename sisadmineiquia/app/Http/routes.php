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
    return view('home');
});

Route::group(['middleware' => ['auth','alltype']], function () {
	  Route::get('admin/empleado/report/{id}', 'EmpleadoController@perfilreport');
	  Route::get('admin/empleado/nominareport', 'EmpleadoController@nominareport');
    Route::get('admin/empleado/nominareportdownload', 'EmpleadoController@nominareportdownload');
	  Route::get('admin/empleado/reportdownload/{id}', 'EmpleadoController@perfilreportdownload');
      Route::resource('admin/empleado','EmpleadoController');
});


Route::group(['middleware' =>  ['auth','alltype']], function () {
      Route::resource('admin/tiempo','TiempoAdicionalController');
});

Route::group(['middleware' =>  ['auth','admin']], function () {
      Route::resource('admin/puesto','PuestoController');
});

Route::group(['middleware' =>  ['auth','admin']], function () {
  Route::resource('admin/perfilpuesto','PerfilPuestoController');
});

Route::group(['middleware' => ['auth','alltype']], function () {
      Route::resource('admin/expedienteadministrativo','ExpedienteAdministrativoController');
});

Route::group(['middleware' => ['auth','alltype']], function () {
      Route::resource('admin/experiencialaboralacademica','ExperienciaLaboralAcademicaController');
});

Route::auth();

Route::resource('/home','HomeController');
//Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@edit','id');

Route::group(['middleware' => ['auth','adminsist']], function () {
	Route::resource('admin/users','UsersController');
});
