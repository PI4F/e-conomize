<?php

namespace App\Http\Controllers;

use App\Preco;
use App\Compra;
use App\Produto;
use Illuminate\Http\Request;

class PrecosController extends Controller{

    private $preco;
    private $filtro;
    private $id;

    public function __construct(){
        $this->preco = new Preco();
    }

    public function index($filtro=null, $id=null){
        $list_precos;

        if (!is_null($filtro)) {
            switch ($filtro) {
                case 'lugar':
                    $list_precos = Preco::where('lugar_id', $id)->orderBy('data_criacao', 'DESC')->get();
                    break;
                default:
                    $list_precos = Preco::orderBy('data_criacao', 'DESC')->get();
                    break;        
            }
        }else{
            $list_precos = Preco::orderBy('data_criacao', 'DESC')->get();
        }

        return view('precos.index', [
            'precos' => $list_precos,
            'filtro' => isset($filtro) ? $filtro : null
        ]);
    }

    public function inserir(){
    	$list_compras = Compra::all();
    	$list_produtos = Produto::all();
    	return view('precos.inserirEditar', [
    		'compras' => $list_compras,
    		'produtos' => $list_produtos
    	]);
    }

    public function editar(){
    	$list_compras = Compra::all();
    	$list_produtos = Produto::all();
    	return view('precos.inserirEditar', [
    		'compras' => $list_compras,
    		'produtos' => $list_produtos
    	]);
    }

    public function gravar(Request $r){
    	Preco::create($r->all());
        return redirect('/precos')->with('message', 'Preço criado com sucesso');
    }

    public function excluir($id){
        $this->getPreco($id)->delete();
        return redirect('/precos')->with('success', 'Excluido com sucesso!');
    }

    protected function getPreco($id){
        return $this->preco->find($id);
    }
}
