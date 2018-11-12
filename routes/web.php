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

Route::get('/produto/{id}', 'HomeController@produto')->name('produto');

Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');

Route::get('/carrinho/adicionar', function() {
    return redirect()->route('index');
});

Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');

Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');

Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');

Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');

Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
