<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model{

    protected $primaryKey = 'categoria_produto_id';

    public $incrementing = false;

    protected $fillable = [
        'categoria_produto_id',
        'nome'
    ];

    public $timestamps = false;

    protected $table = 'categoria_produto';

    public function subcategorias(){
        return $this->hasMany(SubcategoriaProduto::class, 'categoria_produto_id');
    }
}
