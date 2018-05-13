<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Produto;


class Venda extends Model
{
    protected $fillable = [
        'data_venda',
        'preco_vendido'

    ];
    public $timestamps = false;

    public function produto():BelongsTo
    {
        return $this->BelongsTo(Produto::class,'produto_id');
    }
}
