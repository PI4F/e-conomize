<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Lugar;

class LugaresController extends Controller{

	private $lugar;

	public function __construct(){
		$this->lugar = new Lugar();
	}
    
    public function index(){
        $list_lugares = Lugar::all();
        return view('lugares.index',
            ['lugares' => $list_lugares]);
    }

    public function inserir(){
    	return view('lugares.inserirEditar',
    	['lugar' => null]);
    }

    public function gravar(Request $r){
    	Lugar::create($r->all());
    	return redirect('/lugares')->with('message', 'Lugar criado com sucesso');
    }

    public function editar($id){
    	return view('lugares.inserirEditar', [
    		'lugar' => $this->getLugar($id)
    	]);
    }
    
    public function update(Request $r){
    	$lugar = $this->getLugar($r->lugar_id);
    	$lugar->update($r->all());
    	return redirect('/lugares');
    }

    public function excluir($id){
    	$this->getLugar($id)->delete();
    	return redirect('/lugares')->with('success', 'Excluido com sucesso!');
    	//return view('lugares.index');
    }

    protected function getLugar($id){
    	return $this->lugar->find($id);
    }
}
