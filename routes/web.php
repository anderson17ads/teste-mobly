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

Route::get('/', 'HomeController@index')->name('index');

Route::get('/produto/{id}', 'ProdutosController@view')->name('produto');

Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');

Route::get('/carrinho/adicionar', function() {
    return redirect()->route('index');
});

Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');

Route::get('/carrinho/remover/{id}', 'CarrinhoController@remover')->name('carrinho.remover');

Route::get('/carrinho/quantidade/{id}', 'CarrinhoController@quantidade')->name('carrinho.quantidade');

Route::get('/pedidos/dados', 'PedidosController@dados')->name('pedidos.dados');

Route::post('/pedidos/concluir', 'PedidosController@concluir')->name('pedidos.concluir');

Route::get('/pedidos/index', 'PedidosController@index')->name('pedidos.index');

Route::post('/pedidos/cancelar', 'PedidosController@cancelar')->name('pedidos.cancelar');

Auth::routes();
