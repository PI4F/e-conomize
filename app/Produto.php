<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $produto_id
 * @property string $dono_id
 * @property string $subcategoria_produto_id
 * @property string $marca_produto_id
 * @property string $tipo_medida_produto_base1_id
 * @property string $tipo_medida_produto_base2_id
 * @property string $nome
 * @property string $tipo
 * @property string $variacao
 * @property integer $codigo_barra
 * @property string $data_criacao
 * @property float $medida_produto_base1
 * @property float $medida_produto_base2
 * @property Usuario $usuario
 * @property MarcaProduto $marcaProduto
 * @property SubcategoriaProduto $subcategoriaProduto
 * @property MedidaProduto $medidaProduto1
 * @property MedidaProduto $medidaProduto2
 * @property ObservacaoProduto[] $observacaoProdutos
 * @property Preco[] $precos
 */
class Produto extends Model{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'produto_id';

    /**
     * @var array
     */
    protected $fillable = ['dono_id', 'subcategoria_produto_id', 'marca_produto_id', 'tipo_medida_produto_base1_id', 'tipo_medida_produto_base2_id', 'nome', 'tipo', 'variacao', 'codigo_barra', 'data_criacao', 'medida_produto_base1', 'medida_produto_base2'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'dono_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(MarcaProduto::class, 'marca_produto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategoria()
    {
        return $this->belongsTo(SubcategoriaProduto::class, 'subcategoria_produto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medida1()
    {
        return $this->belongsTo(MedidaProduto::class, 'tipo_medida_produto_base1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medida2()
    {
        return $this->belongsTo(MedidaProduto::class, 'tipo_medida_produto_base2_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function observacaoProdutos()
    {
        return $this->hasMany(ObservacaoProduto::class, 'produto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precos()
    {
        return $this->hasMany(Preco::class, 'produto_id');
    }
}
