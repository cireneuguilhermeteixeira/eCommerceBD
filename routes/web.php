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


Auth::routes();
Route::group(['middleware' => 'admin'], function () {
});

Route::get('/produtos','LojaController@direciona_produtos');
Route::get('/InfoProduto/','LojaController@InfoProduto');
Route::get('/Comprar/','LojaController@comprar');
Route::get('buscarNome/','LojaController@buscarNome');
Route::get('filtrarPreco/','LojaController@filtrarPreco');
Route::get('filtrarCategoria/','LojaController@filtrarCategoria');



Route::get('/inventario','CRUDController@direciona_inventario');
Route::get('/criar','CRUDController@direcionar_criar');
Route::post('criar/salvar','CRUDController@criar');
Route::get('editando/{produto}','CRUDController@direcionar_editar');
Route::patch('editar/{produto}/salvar','CRUDController@editar');
Route::post('deletar/{produto}','CRUDController@deletar');


Route::get('Contabilidade','VendasController@contabilidade');


Route::get('/', function () {
    return view('welcome');
});
