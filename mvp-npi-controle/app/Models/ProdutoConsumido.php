<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoConsumido extends Model
{
    use HasFactory;
    protected $table='produto_consumido';
    protected $fillable=[
                        'id_produto_cons', 
                        'quantidade',
                        'id_usuario', 
                        'id_produto'
                        ];


}
