<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{

    protected $primaryKey = 'login';

    protected $fillable = [
        'login',
        'pin',
        'nome',
        'sexo',
        'compartilhar'
    ];

    protected $table = 'usuario';

    public function produto(){
        return $this->hasMany(Produto::class, 'dono_id');
    }

    public function preco(){
        return $this->hasMany(Preco::class, 'dono_id');
    }

    public function lugar(){
        return $this->hasMany(Lugar::class, 'dono_id');
    }
}
