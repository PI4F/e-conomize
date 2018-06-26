<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model{

    protected $primaryKey = 'preco_id';

    protected $fillable = [
        'preco_id',
        'data_criacao',
        'valor',
        'qnt',
        'com_desconto',
        'fator_desconto',
        'valor_desconto',
        'desconto_id',
        'compra_id',
        'lugar_id',
        'produto_id'
    ];

    protected $table = 'preco';

    public $timestamps = false;

    public function desconto(){
        return $this->belongsTo(Desconto::class, 'desconto_id');
    }

    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function lugar(){
        return $this->belongsTo(Lugar::class, 'lugar_id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function calculoDesconto($qnt){
        if ($qnt < $this->fator_desconto){
            return $this->valor * $qnt;
        }elseif ($qnt == $this->fator){
            return $this->valor_desconto;
        }else{
            return $this->valor_desconto + $this->calculoDesconto($qnt - $this->fator_desconto);
        }
    }

    public function getValorTotalNormal(){
        return $this->valor * $this->qnt;
    }

    public function getValorTotalComDesconto(){
        return $this->calculoDesconto($this->qnt);
    }
}