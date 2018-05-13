<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Venda;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    protected $fillable = [
        'nome_produto',
        'preco',
        'sobre'

    ];
    public $timestamps = false;

    public function vendas():HasMany
    {
        return $this->HasMany(Venda::class);
    }


}
