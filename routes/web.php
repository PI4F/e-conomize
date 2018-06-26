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
    return view('welcome');
});

Route::group(['prefix' => 'pessoas'], function (){
    Route::get('/', 'PessoasController@index');
});

Route::group(['prefix' => 'precos'], function (){
    Route::get('/', 'PrecosController@index');
    Route::get('/inserir', 'PrecosController@inserir');
    Route::get('/editar', 'PrecosController@editar');
    Route::get('/excluir/{id}', 'PrecosController@excluir');
    Route::post('/gravar', 'PrecosController@gravar');
    Route::get('/{filtro}/{id}', 'PrecosController@index');

});

Route::group(['prefix' => 'compras'], function (){
    Route::get('/', 'ComprasController@index');
    Route::get('/inserir', 'ComprasController@inserir');
    Route::get('/editar', 'ComprasController@editar');
    Route::post('/gravar', 'ComprasController@gravar');
    Route::get('/excluir/{id}', 'ComprasController@excluir');
    Route::get('/detalhes/{id}', 'ComprasController@detalhes');
    Route::post('/itens/{id}', 'ComprasController@itens');
    Route::get('/{filtro}/{id}', 'ComprasController@index');
});

Route::group(['prefix' => 'produtos'], function (){
    Route::get('/', 'ProdutosController@index');
    Route::get('/inserir', 'ProdutosController@inserir');
    Route::get('/editar', 'ProdutosController@editar');
    Route::post('/gravar', 'ProdutosController@gravar');
    Route::post('/pesquisa', 'ProdutosController@pesquisa');
});

Route::group(['prefix' => 'lugares'], function (){
    Route::get('/', 'LugaresController@index');
    Route::get('/inserir', 'LugaresController@inserir');
    Route::post('/gravar', 'LugaresController@gravar');
    Route::post('/update', 'LugaresController@update');
    Route::get('/editar/{id}', 'LugaresController@editar');
    Route::get('/excluir/{id}', 'LugaresController@excluir');
});

Route::group(['prefix' => 'marcas'], function (){
	Route::get('/', 'MarcasController@index');
    Route::get('/inserir', 'MarcasController@inserir');
    Route::post('/gravar', 'MarcasController@gravar');
    Route::post('/update', 'MarcasController@update');
    Route::get('/editar/{id}', 'MarcasController@editar');
    Route::get('/excluir/{id}', 'MarcasController@excluir');
});

Route::group(['prefix' => 'categorias'], function (){
	Route::get('/', 'CategoriasController@index');
    Route::get('/inserir', 'CategoriasController@inserir');
    Route::post('/gravar', 'CategoriasController@gravar');
    Route::post('/update', 'CategoriasController@update');
    Route::get('/editar/{id}', 'CategoriasController@editar');
    Route::get('/excluir/{id}', 'CategoriasController@excluir');
});

Route::group(['prefix' => 'TEMPLATE'], function (){
    Route::get('/', 'TEMPLATEController@index');
    Route::post('/gravar', 'TEMPLATEController@gravar');
});

//Route::get('/teste', function (){
//    return view('teste');
//});