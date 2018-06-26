<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\CategoriaProduto;
use App\SubcategoriaProduto;
use App\MarcaProduto;
use App\MedidaProduto;

class ProdutosController extends Controller{
    
    private $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function index($filtro=null, $id=null){
        $list_produtos;
        if(!is_null($filtro)){
            switch ($filtro) {
                case 'marca':
                    $list_produtos = Produto::where('marca_id', $id)->get();
                    break;
            }
        }else{
            $list_produtos = Produto::all();
        }

        return view('produtos.index', [
            'produtos' => $list_produtos,
            'filtro' => isset($filtro) ? $filtro : null
        ]);
    }

    public function inserir(){
    	$list_categorias = CategoriaProduto::all();
    	$list_subcategorias = SubcategoriaProduto::all();
    	$list_marcas = MarcaProduto::all();
    	$list_medidas = MedidaProduto::all();
    	return view('produtos.inserirEditar', [
    		'categorias' => $list_categorias,
    		'subcategorias' => $list_subcategorias,
    		'marcas' => $list_marcas,
    		'medidas' => $list_medidas
    	]);
    }

    public function editar(){
    	/**/
    }

    public function pesquisa(Request $r){
        
        if (is_null($r->pesquisa_produto)) {
            return view('templates.pesquisaProdutos', 
                ['produtos' => Produto::all()]
            );
        }else{
            return view('templates.pesquisaProdutos', 
                ['produtos' => Produto::where('nome', 'LIKE', '%'.$r->pesquisa_produto.'%')->get()]
            );
        }
        //return var_dump($r->all());
    }

    public function gravar(Request $r){
    	//Preco::create($r->all());
    	return var_dump($r->all());
    }
}
