<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Lugar;

class ComprasController extends Controller{

    private $lugares_controller;
    private $compra;

    public function __construct(LugaresController $lugares_controller){
        $this->lugares_controller = $lugares_controller;
        $this->compra = new Compra();
    }

    public function index($filtro=null, $id=null){
        $list_compras;

        if (!is_null($filtro)) {
            switch ($filtro) {
                case 'lugar':
                    $list_compras = Compra::where('lugar_id', $id)->orderBy('data_compra', 'DESC')->get();
                    break;
            }
        }else{
            $list_compras = Compra::orderBy('data_compra', 'DESC')->get();
        }
        return view('compras.index', [
            'compras' => $list_compras,
            'filtro' => isset($filtro) ? $filtro : null
            ]);
    }

    public function inserir(){
    	$list_lugares = Lugar::all();
    	return view('compras.inserirEditar', [
    		'lugares' => $list_lugares
    	]);
    }

    public function gravar(Request $r){
        Compra::create($r->all());
    	return redirect('/compras')->with('message', 'Compra criada com sucesso');
    }

    public function editar($id){
        return view('compras.inserirEditar', [
            'compra' => $this->getCompra($id)
        ]);
    }
    
    public function update(Request $r){
        $compra = $this->getLugar($r->compra_id);
        $compra->update($r->all());
        return redirect('/compras');
    }

    public function excluir($id){
        $this->getCompra($id)->delete();
        return redirect('/compras')->with('success', 'Excluido com sucesso!');
    }

    public function detalhes($id){
        return view('compras.detalhes', [
            'compra' => $this->getCompra($id)
        ]);
    }

    public function itens($id){
        return view('compras.itensCompra',
            ['compra' => $this->getCompra($id)]);
    }

    public function getCompra($id){
        return $this->compra->find($id);
    }
}
