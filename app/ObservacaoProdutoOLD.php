<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObservacaoProduto extends Model{

    protected $primaryKey = 'produto_id';

    protected $fillable = [
        'dono_id',
        'produto_id',
        'observacao'
    ];

    protected $table = 'observacao_produto';

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'dono_id');
    }
}
