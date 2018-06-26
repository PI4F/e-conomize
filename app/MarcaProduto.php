<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcaProduto extends Model{

    protected $primaryKey = 'nome';

    public $incrementing = false;

    protected $fillable = [
        'nome'
    ];

    protected $table = 'marca_produto';

    public function produtos(){
        return $this->hasMany(Produto::class, 'marca_produto_id');
    }
}
