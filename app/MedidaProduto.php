<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedidaProduto extends Model{

    protected $primaryKey = 'sigla';

    public $incrementing = false;

    protected $fillable = [
        'sigla',
        'descricao'
    ];

    protected $table = 'medida_produto';

    public function produto(){
        return $this
            ->hasMany(Produto::class, 'tipo_medida_produto_base1_id')
            ->orWhere('tipo_medida_produto_base2_id','=',$this->sigla);
    }
}
