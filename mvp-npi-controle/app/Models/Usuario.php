<?php


namespace App\Models;
use App\Models\ProdutoConsumido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'senha',
        'email',
        'matricula',
        'pix',
        'id_acesso'
    ];

    public function produtoConsumido()
    {
        return $this->hasMany(ProdutoConsumido::class, 'id_usuario');
    }
}
