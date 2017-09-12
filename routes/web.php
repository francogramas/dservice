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

//-----------------------------------Generales
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/pais','general\pais');
Route::get('/buscar/contratistas','admin\contratistasController@autocompletar');
Route::get('/buscar/servicioscontratistas','usuarios\serviciosController@autocompletar');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');

//Redirecciona a los usuarios de acuerdo al rol que tengan
Route::resource('/direccionador', 'admin\direccionadorController');


//---------------------------recursos para usuarios
Route::group(['middleware' => ['auth', 'roles'],'roles' => ['user']],
function () {
	Route::resource('/','wellcomeController');
	Route::resource('/sedesu','usuarios\sedesController');
	Route::resource('/servicios','usuarios\serviciosController');
	Route::resource('/solicitudes','usuarios\solicitudesController');
});


//recursos administrativos
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => ['admin']],
function () {
	Route::get('solicituddetalle/{id}','usuarios\solicitudesController@detalle');	
	Route::resource('categorias','admin\categoriasController');
	Route::resource('sedes','admin\sedesController');
	Route::resource('contratistas','admin\contratistasController');
	Route::resource('servicioscontratistas','admin\serviciosContratistasController');
	Route::resource('admsolicitudes','admin\solicitudesController');
	Route::get('mostrarsolicitudes','admin\solicitudesController@mostarSolicitudes');
});