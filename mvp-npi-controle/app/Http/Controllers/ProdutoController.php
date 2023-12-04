<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public $id_usuario = 3;


    public function compra(Request $request)
    {
        $pesquisa = $request->input('pesquisa');

        $produtos = Produto::where('id_usuario', $this->id_usuario);

        if ($pesquisa) {
            $produtos->where('descricao', 'like', '%' . $pesquisa . '%');
        }

        $produtos = $produtos->get();
        $total = $this->getTotal();

        return view('compras.compra', ['produtos' => $produtos, 'total' => $total]);
    }


    public function index()
    {

        $produtos = Produto::where('id_usuario', $this->id_usuario)->get();
        $total = $this->getTotal();

        return view('compras.compra', ['produtos' => $produtos, 'total' => $total]);
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:0',
        ], [
            'descricao.required' => 'O campo descrição é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço deve ser maior ou igual a 0.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.numeric' => 'O campo quantidade deve ser um número.',
            'quantidade.min' => 'O campo quantidade deve ser maior ou igual a 0.',
        ]);

        $produto = new Produto();
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->quantidade = $request->input('quantidade');
        $produto->id_usuario = $this->id_usuario;

        $produto->save();

        return redirect()->route('compras.index')->with('success', 'Compra registrada com sucesso!');
    }

    public function show(string $id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return view('compras.show')->with('produto', $produto);
        } else {
            $msg = 'Produto não encontrado';
            return view('compras.show')->with('msg', $msg);
        }
    }

    public function edit(string $id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return view('compras.edit')->with('produto', $produto);
        } else {
            $produtos = Produto::all();
            return view('compras.compra')->with('produtos', $produtos)->with('msg', 'Produto não encontrado!');
        }


    }

    public function update(Request $request, string $id)
    {

        $produto = Produto::find($id);
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->quantidade = $request->input('quantidade');

        $produto->save();
        return redirect('http://127.0.0.1:8000/compras/')->with('msg', 'Atualizado com sucesso');
    }


    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        $produto->delete();

        $produtos = Produto::all();
        return redirect('http://127.0.0.1:8000/compras/')->with('msg', 'Atualizado com sucesso')->with("produtos", $produtos);
    }

    public function menu()
    {
        return view('compras.menu');
    }

    public function getTotal()
    {
        $total = Produto::where('id_usuario', $this->id_usuario)
            ->selectRaw('SUM(quantidade * preco) as total')
            ->value('total');
        return $total;
    }

}
