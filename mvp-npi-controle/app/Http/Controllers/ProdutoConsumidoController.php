<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoConsumido;
use Illuminate\Http\Request;

class ProdutoConsumidoController extends Controller
{
    public int $id_usuario = 2;

    public function index(Request $request)
    {
        $pesquisa = $request->input('pesquisa');

        $produto_consumido = ProdutoConsumido::where('id_usuario', $this->id_usuario);

        if ($pesquisa) {
            $produto_consumido->whereHas('produto', function ($query) use ($pesquisa) {
                $query->where('descricao', 'like', '%' . $pesquisa . '%');
            });
        }

        $produto_consumido = $produto_consumido->get();
        return view('consumo.index', ['produto_consumido' => $produto_consumido]);
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('consumo.create')->with("produtos", $produtos);
    }

    public function store(Request $request, int $id_produto)
    {
        $quantidade = $request->input('quantidade');
        $id_usuario = $this->id_usuario;
        $produto = Produto::find($id_produto);

        // Verifica se o produto consumido já existe para o usuário
        $produtoConsumido = ProdutoConsumido::where('id_usuario', $id_usuario)->where('id_produto', $id_produto)->first();

        if ($produtoConsumido) {
            $novaQuantidade = $produtoConsumido->quantidade + $quantidade;

            if ($novaQuantidade <= $produto->quantidade) {
                // Atualiza a quantidade no produto subtraindo a quantidade consumida
                $novaQuantidadeProduto = $produto->quantidade - $quantidade;

                // Verifica se a nova quantidade do produto não é negativa
                if ($novaQuantidadeProduto < 0) {
                    return redirect()->back()->with('error', 'Quantidade do produto não pode ser negativa');
                }

                $produto->quantidade = $novaQuantidadeProduto;
                $produto->save();

                $produtoConsumido->update(['quantidade' => $novaQuantidade]);
                return redirect('http://127.0.0.1:8000/consumo/');
            } else {
                return redirect()->back()->with('error', 'Quantidade excede o disponível');
            }
        } else {
            if ($quantidade === null || $quantidade < 0 || ($produto && $quantidade > $produto->quantidade)) {
                return redirect()->back()->with('error', 'Quantidade inválida');
            }

            $produtoConsumido = new ProdutoConsumido([
                'quantidade' => $quantidade,
                'id_usuario' => $id_usuario,
                'id_produto' => $id_produto,
                'pago' => false
            ]);

            // Atualiza a quantidade no produto subtraindo a quantidade consumida
            $novaQuantidadeProduto = $produto->quantidade - $quantidade;

            // Verifica se a nova quantidade do produto não é negativa
            if ($novaQuantidadeProduto < 0) {
                return redirect()->back()->with('error', 'Quantidade do produto não pode ser negativa');
            }

            $produto->quantidade = $novaQuantidadeProduto;
            $produto->save();

            $produtoConsumido->save();
            return redirect('http://127.0.0.1:8000/consumo/');
        }
    }

    public function show(string $id)
    {
        $produto = ProdutoConsumido::find($id);
        if ($produto) {
            return view('consumo.show')->with("produto", $produto);
        } else {
            return redirect('consumo.show')->with("msg", "Produto não encontrado!");
        }
    }

    public function edit(string $id)
    {
        $produto = ProdutoConsumido::find($id);

        if ($produto) {
            return view("consumo.edit")->with("produto", $produto);
        } else {
            return redirect("http://127.0.0.1:8000/consumo/");
        }
    }

    public function update(string $id, Request $request)
    {

        $produto = ProdutoConsumido::find($id);
        $produto->quantidade = $request->input("quantidade");
        $produto->save();

        return redirect('http://127.0.0.1:8000/consumo/')->with("msg", "Atualizado com sucesso!");
    }

    public function destroy(string $id)
    {
        $produto = ProdutoConsumido::find($id);
        $produto->destroy();

        return redirect('http://127.0.0.1:8000/consumo/')->with("msg", "Produto exluído com sucesso!");
    }

    public function add(string $id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return view("consumo.add")->with("produto", $produto);
        } else {
            $produtos = Produto::all();
            return view("consumo.create")->with("produtos", $produtos);
        }
    }

}
