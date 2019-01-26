<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produto;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', array('produtos' => $produtos));
    }
    
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show', array('produto' => $produto));
    }
    
    public function create()
    {
        return view('produto.create');
    }
    
    public function store(Request $resquest)
    {
        $this->validate($resquest, [
            'referencia' => 'required|unique:produtos|min:3',
            'titulo'     => 'required|min:3',
            'preco'      => 'required|numeric|between:0,99.99'
        ]);
        
        $produto = new Produto();
        $produto->referencia = $resquest->input('referencia');
        $produto->titulo     = $resquest->input('titulo');
        $produto->descricao  = $resquest->input('descricao');
        $produto->preco      = $resquest->input('preco');
        $produto->preco      = $resquest->input('preco');
//        $produto->created_at = date('Y-m-d H:i:s');
//        $produto->updated_at = date('Y-m-d H:i:s');
        if($produto->save()){
            return redirect('produtos');
        }
    }
}
