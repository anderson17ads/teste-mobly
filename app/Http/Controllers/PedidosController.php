<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pedido;

class PedidosController extends Controller
{
    public function dados(Request $request)
    {
        $itens = ($request->session()->has('Carrinho'))
            ? $request->session()->get('Carrinho') : [];
     
        return view('pedidos.dados', compact('itens'));
    }

}
