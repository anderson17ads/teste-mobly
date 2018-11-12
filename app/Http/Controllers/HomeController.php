<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::get();

        return view('home.index', compact('produtos'));
    }
}