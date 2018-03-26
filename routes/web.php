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


Route::middleware(['auth'])->group(function(){

	// Rotas restaurantes
	Route::get('restaurante', 				'restauranteController@cadastrar');
	Route::get('restaurante/editar/{id}', 	'restauranteController@editar');
	Route::get('restaurante/listar',		'restauranteController@listar');
	Route::post('restaurante/insert', 		'restauranteController@insert');
	Route::post('restaurante/update', 		'restauranteController@update');

	// Rotas pratos
	Route::get('prato', 			'pratoController@cadastrar');
	Route::get('prato/editar/{id}', 'pratoController@editar');
	Route::get('prato/listar', 		'pratoController@listar');
	Route::post('prato/insert', 	'pratoController@insert');
	Route::post('prato/update', 	'pratoController@update');

	// Rotas categoria
	Route::get('categoria', 			'categoriaController@cadastrar');
	Route::get('categoria/editar/{id}', 'categoriaController@editar');
	Route::get('categoria/listar', 		'categoriaController@listar');
	Route::post('categoria/insert', 	'categoriaController@insert');
	Route::post('categoria/update', 	'categoriaController@update');

});


Auth::routes();

Route::get('votacao', 				'votacaoController@index');
Route::any('votacao/listar', 		'votacaoController@listar');
Route::get('votacao/relatorio', 	'votacaoController@relatorio');
Route::get('prato/get/{id}', 		'votacaoController@prato');

Route::post('votacao/insert', 		'votacaoController@insert');

Route::get('/', 'homeController@index')->name('home')->middleware('guest');
Route::get('/', 'restauranteController@cadastrar')->middleware('auth');




