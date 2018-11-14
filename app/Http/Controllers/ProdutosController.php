<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutosController extends Controller
{
    public function view($id = null)
    {
		if(!empty($id)) {
			$produto = Produto::where([
				'id'    => $id,
			])->first();
			
			if( !empty($produto) ) {
				return view('produtos.view', compact('produto'));
			}
		}

		return redirect()->route('index');
    }
}