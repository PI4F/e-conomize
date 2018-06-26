<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{
    protected $fillable = [
        'produto_id',
        'nome',
        'tipo',
        'variacao',
        'codigo_barra',
        'dono_id',
        'data_criacao',
        'subcategoria_produto_id',
        'marca_produto_id',
        'medida_produto_base1',
        'tipo_medida_produto_base1_id',
        'medida_produto_base2',
        'tipo_medida_produto_base2_id'
    ];

    protected $table = 'produto';

    public function preco(){
        return $this->hasMany(Preco::class, 'produto_id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'dono_id');
    }

    public function subCategoria(){
        return $this->belongsTo(SubcategoriaProduto::class, 'subcategoria_produto_id');
    }

    public function marca(){
        return $this->belongsTo(MarcaProduto::class, 'marca_id');
    }

    public function medida1(){
        return $this->belongsTo(MedidaProduto::class, 'tipo_medida_produto_base1_id');
    }

    public function medida2(){
        return $this->belongsTo(MedidaProduto::class, 'tipo_medida_produto_base2_id');
    }
}
