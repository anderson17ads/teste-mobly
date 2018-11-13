<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class Carrinho extends Model
{
	/**
	 * Calcula o total do pedido
	 *
	 * @return float
	 */
    public static function totalPedido()
    {
        $totalPedido = 0;

    	if (Session::has('Carrinho')) {
    		foreach (Session::get('Carrinho') as $item) {
                $totalPedido += ($item['quantidade'] * str_replace(',', '.', $item['preco']));
            }
    	}

        return $totalPedido;
    }
}
