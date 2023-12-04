<?php

namespace App\Models;
use App\Models\ProdutoConsumido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'id_produto',
        'descricao',
        'preco',
        'quantidade',
        'id_usuario'
    ];

    public function produtoConsumido()
    {
        return $this->hasMany(ProdutoConsumido::class, 'id_produto');
    }
}
