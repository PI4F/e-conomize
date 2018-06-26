<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desconto extends Model{

    protected $primaryKey = 'desconto_id';

    protected $fillable = [
        'desconto_id',
        'nome',
        'descricao'
    ];

    protected $table = 'desconto';

    public function produto(){
        return $this->hasMany(Produto::class, 'desconto_id');
    }
}
