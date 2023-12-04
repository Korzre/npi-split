<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoConsumido;
use Illuminate\Support\Facades\DB;

class RateioController extends Controller
{
    public int $id_usuario = 2;

    public function index()
    {

        $dados = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
            ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
            ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
            ->where('u_comprador.id_usuario', '<>', $this->id_usuario)
            ->where('produto_consumido.pago', '=', false)
            ->select(
                'u_comprador.nome as nome_comprador',
                'p.descricao as descricao_produto',
                'produto_consumido.quantidade as quantidade_consumida',
                'p.preco as preco_produto',
                'u_comprador.pix',
                DB::raw('(produto_consumido.quantidade * p.preco) as valor_a_pagar')
            )
            ->get();

        return view('rateio.rateio', ['dados' => $dados]);
    }

}
