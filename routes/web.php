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


Route::middleware(['guest'])->group(function(){

	// Rotas restaurantes
	Route::get('/', 						'restauranteController@cadastrar');
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
});

Route::middleware(['auth'])->group(function(){
	Route::get('/login', function(){
		return 'route atuh';
	});
});
