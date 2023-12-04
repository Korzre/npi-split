<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Usuario;
use App\Models\ProdutoConsumido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DividasController extends Controller
{
    //
    // public function index(){
    //    return view('dividas.dividas');
    // }

    public int $id_usuario = 3;

    public function index()
    {
        $dados = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
            ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
            ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
            ->where('u_consumidor.id_usuario', '<>', $this->id_usuario)
            ->where('produto_consumido.pago', '=', false)
            ->select(
                'u_comprador.nome as nome_comprador',
                'u_consumidor.nome as nome_consumidor',
                'p.descricao as descricao_produto',
                'p.quantidade as quantidade_original',
                'produto_consumido.quantidade as quantidade_consumida',
                'p.preco as preco_produto',
                'produto_consumido.id_usuario', 
                'produto_consumido.id_produto_cons',
                DB::raw('produto_consumido.quantidade * p.preco as valor_a_pagar')
            )
            ->get();
        #dd($dados);
        return view('dividas.dividas', ['dados' => $dados]);

        //return view('dividas', ['dados' => $dados]);
    }

    public function atualizarPagamento(Request $request)
    {
        $produtosPagos = $request->input('produtosPagos', []);

    foreach ($produtosPagos as $idProdutoCons) {
        $produto = ProdutoConsumido::find($idProdutoCons);

        if ($produto) {
            \Log::info('Checkbox marcado para o ID do produto:', ['id_produto_cons' => $idProdutoCons]);

            // Verificar se já não foi pago
            if (!$produto->pago) {
                // Aqui, adicionamos um log para verificar o valor de 'pago' antes da atualização
                \Log::info('Valor de "pago" antes da atualização:', ['pago' => $produto->pago]);

                $produto->update(['pago' => true]);

                // Adicionamos um log para verificar se a atualização foi bem-sucedida
                \Log::info('Produto atualizado:', $produto->toArray());

                // Outro log para verificar o valor de 'pago' após a atualização
                \Log::info('Valor de "pago" após a atualização:', ['pago' => $produto->pago]);
            } else {
                \Log::warning('Produto já pago para o ID: ' . $idProdutoCons);
            }
        } else {
            \Log::warning('Nenhum registro encontrado para o ID: ' . $idProdutoCons);
        }
    }

    return redirect()->route('dividas.index');
    }


}
