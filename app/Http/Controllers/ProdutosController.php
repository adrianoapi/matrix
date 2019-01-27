<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produto;
use Session;
use File;
use Illuminate\Support\Facades\Auth;
class ProdutosController extends Controller
{
    public function index()
    {
        //echo Auth::user();
        if(Auth::check()){
        $produtos = Produto::paginate(8);
        return view('produto.index', array('produtos' => $produtos, 'busca' => null));
        }else{
            return redirect('login');
        }
    }
    
    public function buscar(Request $request)
    {
        $produtos = Produto::where('titulo', 'LIKE', '%'.
                $request->input('busca').'%')->orwhere('descricao', 'LIKE', '%'.
                $request->input('busca').'%')->paginate(8);
        return view('produto.index', array('produtos' => $produtos,'busca'=>$request->input('busca')));
    }
    
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show', array('produto' => $produto));
    }
    
    public function create()
    {
        if(Auth::check()){
            return view('produto.create');
        }else{
            return redirect('login');
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'referencia' => 'required|unique:produtos|min:3',
            'titulo'     => 'required|min:3',
            'preco'      => 'required|numeric|between:0,99.99'
        ]);
        
        $produto = new Produto();
        $produto->referencia = $request->input('referencia');
        $produto->titulo     = $request->input('titulo');
        $produto->descricao  = $request->input('descricao');
        $produto->preco      = $request->input('preco');
        $produto->preco      = $request->input('preco');
        #$produto->created_at = date('Y-m-d H:i:s');
        #$produto->updated_at = date('Y-m-d H:i:s');
        if($produto->save()){
            return redirect('produtos');
        }
    }
    
    public function edit($id)
    {
        if(Auth::check()){
        $produto = Produto::find($id);
            return view('produto.edit', array('produto' => $produto));
        }else{
            return redirect('login');
        }
    }
    
    public function update($id, Request $request)
    {
        $produto = Produto::find($id);
        $this->validate($request, [
            'referencia' => 'required|min:3',
            'titulo'     => 'required|min:3',
            'preco'      => 'required|numeric|between:0,99.99'
        ]);
        
        if($request->hasFile('fotoproduto')){
          $imagem       = $request->file('fotoproduto');
          $nomearquivo  = md5($id) .".". $imagem->getClientOriginalExtension();
          $request->file('fotoproduto')->move(public_path('./img/produtos/'), $nomearquivo);
          $produto->type_img = $imagem->getClientOriginalExtension();
        }
        
        $produto->referencia = $request->input('referencia');
        $produto->titulo     = $request->input('titulo');
        $produto->descricao  = $request->input('descricao');
        $produto->preco      = $request->input('preco');
        $produto->preco      = $request->input('preco');
        if($produto->save()){
            Session::flash('mensagem', 'Produto alterado com sucesso!');
            return redirect()->back();
        }
    }
    
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        
        $filename = md5($id) . ".jpg";
        if(file_exists("./img/produtos/" . $filename)){
            File::delete("./img/produtos/" . $filename);
        }
        
        Session::flash('mensagem', 'Produto excluído com sucesso');
        return redirect()->back();
    }
}
