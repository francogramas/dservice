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
Route::resource('/pais','general\pais');
Route::get('/buscar/contratistas','admin\contratistasController@autocompletar');
Route::get('/buscar/servicioscontratistas','usuarios\serviciosController@autocompletar');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');

//---------------------------recursos para usuarios
Route::resource('/','wellcomeController');
Route::resource('/sedesu','usuarios\sedesController');
Route::resource('/servicios','usuarios\serviciosController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//recursos administrativos
Route::prefix('admin')->group(function () {
	Route::resource('categorias','admin\categoriasController');
	Route::resource('sedes','admin\sedesController');
	Route::resource('contratistas','admin\contratistasController');
	Route::resource('servicioscontratistas','admin\serviciosContratistasController');
});