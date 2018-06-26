<?php

namespace App\Http\Controllers;

use App\CategoriaProduto;
use Illuminate\Http\Request;

class CategoriasController extends Controller{
    
    private $categoria;

    public function __construct(){
    	$this->categoria = new CategoriaProduto();
    }

    public function index(){
    	$list_categorias = CategoriaProduto::all();
    	return view('categorias.index', [
    		'categorias' => $list_categorias
    	]);
    }

    public function inserir(){
        return view('categorias.inserirEditar', 
            ['categoria' => null]);
    }

    public function gravar(Request $r){
        CategoriaProduto::create($r->all());
        return redirect('/categorias')->with('message', 'Lugar criado com sucesso');
    }

    public function editar($id){
        return view('categorias.inserirEditar', [
            'categoria' => $this->getCategoria($id)
        ]);
    }
    public function update(Request $r){
        $categoria = $this->getCategoria($r->categoria_produto_id);
        $categoria->update($r->all());
        return redirect('/categorias');
    }

    public function excluir($id){
        $this->getCategoria($id)->delete();
        return redirect('/categorias')->with('success', 'Excluido com sucesso!');
    }

    protected function getCategoria($id){
        return $this->categoria->find($id);
    }
}
