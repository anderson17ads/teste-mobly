<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
use App\Carrinho;

class CarrinhoController extends Controller
{
	/**
	 * Listando itens do carrinho
	 *
	 * @return void
	 */
	public function index(Request $request)
    {
    	$itens = ($request->session()->has('Carrinho'))
			? $request->session()->get('Carrinho') : [];

        return view('carrinho.index', compact('itens'));
    }

    /**
     * Adicionando item ao carrinho
     *
     * @return void
     */
    public function adicionar()
    {
        $request = Request();
        
        $idProduto = $request->input('id');
        
        $produto = Produto::find($idProduto);

        if (empty($produto->id)) {
            $request->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('carrinho.index');
        }

        $carrinho = ($request->session()->has('Carrinho'))
        	? $request->session()->get('Carrinho') : [];

    	$carrinho[$idProduto] = array_merge(['quantidade' => 1], $produto->getOriginal());

    	// dd($request->session()->get('Carrinho'));

    	$request->session()->put('Carrinho', $carrinho);

        $request->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');
        
        return redirect()->route('carrinho.index');
    }

    /**
     * Incrementar quantidade do produto
     *
     * @return string/json
     */
    public function quantidade_incrementar($id = null)
    {
        $request = Request();
        
        $retorno = [];

        if (!is_null($id)) {
            $quantidade = ($request->query('quantidade')) ? $request->query('quantidade') : 1;
            
            ++$quantidade;

            $carrinho = $request->session()->get('Carrinho');

            $carrinho[$id]['quantidade'] = $quantidade;

            $request->session()->put('Carrinho', $carrinho);

            $retorno = [
                'quantidade'    => $quantidade,
                'produto_total' => 'R$ ' . number_format(($quantidade * $carrinho[$id]['preco']), 2, ',', '.'),
                'pedido_total'  => 'R$ ' . number_format(Carrinho::totalPedido(), 2, ',', '.')
            ];
        }

        return response()->json($retorno);
    }

    /**
     * Decrementar Quantidade do produto
     *
     * @return void
     */
    public function quantidade_decrementar($id = null)
    {
        $request = Request();

        $retorno = [];

        if (!is_null($id)) {

        }

        return response()->json($retorno);
    }
}
