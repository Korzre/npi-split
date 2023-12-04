<?php

namespace App\Models;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoConsumido extends Model
{
    protected $primaryKey = 'id_produto_cons';

    protected $table = 'produto_consumido';
    protected $fillable = [
        'id_produto_cons',
        'quantidade',
        'id_usuario',
        'id_produto',
        'pago'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
