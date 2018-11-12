<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
	public function index(Request $request)
    {
    	$itens = ($request->session()->has('Carrinho'))
			? $request->sessio()->get('Carrinho') : [];



        return view('carrinho.index', compact('itens'));
    }
}
