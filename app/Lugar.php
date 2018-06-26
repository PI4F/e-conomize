<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model{

    protected $primaryKey = 'lugar_id';

    protected $fillable = [
        'lugar_id',
        'dono_id',
        'data_criacao',
        'nome',
        'endereco',
        'horario_domingo',
        'horario_segunda',
        'horario_terca',
        'horario_quarta',
        'horario_quinta',
        'horario_sexta',
        'horario_sabado',
        'fechado',
        'imagem_url'
    ];

    public $timestamps = false;

    protected $table = 'lugar';

    public function precos(){
        return $this->hasMany(Preco::class, 'lugar_id');
    }

    public function compras(){
        return $this->hasMany(Compra::class, 'lugar_id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'dono_id');
    }
}
