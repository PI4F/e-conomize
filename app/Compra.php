<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model{

    protected $primaryKey = 'compra_id';

    protected $fillable = [
        'compra_id',
        'dono_id',
        'data_criacao',
        'data_compra',
        'nome',
        'lugar_id'
    ];

    public $timestamps = false;

    protected $table = 'compra';

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'dono_id');
    }

    public function lugar(){
        return $this->belongsTo(Lugar::class, 'lugar_id');
    }

    public function precos(){
        return $this->hasMany(Preco::class, 'compra_id');
    }

    public function valorTotal(){
        $total = 0;
        $precos = $this->precos;
        foreach($precos as $preco){
            $total += $preco->getValorTotalNormal();
        }
        return $total;
    }
}
