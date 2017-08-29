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

Route::resource('/pais','general\pais');
Route::get('/departamentos/{id}','general\estadosController@getEstados');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');
Route::get('/ciudades/{id}','general\ciudadesController@getCiudades');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categorias','admin\categoriasController');
Route::resource('sedes','admin\sedesController');
Route::resource('contratistas','admin\contratistasController');
Route::resource('servicioscontratistas','admin\serviciosContratistasController');
Route::get('/buscar/contratistas','admin\contratistasController@autocompletar');
