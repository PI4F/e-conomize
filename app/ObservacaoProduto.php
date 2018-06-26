<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dono_id
 * @property int $produto_id
 * @property string $observacao
 * @property Usuario $usuario
 * @property Produto $produto
 */
class ObservacaoProduto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'observacao_produto';

    /**
     * @var array
     */
    protected $fillable = ['observacao'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'dono_id', 'login');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto()
    {
        return $this->belongsTo('App\Produto', null, 'produto_id');
    }
}
