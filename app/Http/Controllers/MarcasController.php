<?php

namespace App\Http\Controllers;

use App\MarcaProduto;
use Illuminate\Http\Request;

class MarcasController extends Controller{
    
    private $marca;
    private $marca1;
    private $marca2;

    public function __construct(){
    	$this->marca = new MarcaProduto();
    }

    public function index(){
		$list_marcas = MarcaProduto::all();

    	return view('marcas.index', [
    		'marcas' => $list_marcas,
    	]);
    }
}
