<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Produto;
use Illuminate\Http\Request;

class TEMPLATEController extends Controller{
    public function index(){
    	$list_compras = Compra::all();
    	$list_produtos = Produto::all();
    	return view('testes.index', [
    		'compras' => $list_compras,
    		'produtos' => $list_produtos
    	]);
    }
    
    public function gravar(Request $r){
    	//Preco::create($r->all());
    	return var_dump($r->all());
    }
}
