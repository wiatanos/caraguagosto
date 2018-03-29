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
	Route::resources([
		'categoria' 	=> 'categoriaController',
		'prato' 		=> 'pratoController',
		'restaurante'	=> 'restauranteController',
	]);
	Route::get('deletar/prato/{id}', 'pratoController@delete');
	Route::get('deletar/restaurante/{id}', 'restauranteController@delete');
	Route::get('deletar/categoria/{id}', 'categoriaController@delete');
});

Auth::routes();

Route::get('votacao', 			'votacaoController@index');
Route::any('votacao/listar', 	'votacaoController@listar');
Route::get('votacao/relatorio', 'votacaoController@relatorio');
Route::get('prato/get/{id}', 	'votacaoController@prato');

Route::post('votacao/insert', 		'votacaoController@insert');

Route::get('/', 'homeController@index')->name('home')->middleware('guest');
Route::get('/', 'restauranteController@index')->middleware('auth');


Route::get('/301', function(){
	return abort(404);
});






