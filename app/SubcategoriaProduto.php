<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcategoriaProduto extends Model{

    protected $primaryKey = 'subcategoria_produto_id';

    public $incrementing = false;

    protected $fillable = [
        'subcategoria_produto_id',
        'nome',
        'categoria_produto_id'
    ];

    protected $table = 'subcategoria_produto';

    public function produto(){
        return $this->hasMany(Produto::class, 'subcategoria_produto_id');
    }

    public function categoria(){
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto_id');
    }
}
