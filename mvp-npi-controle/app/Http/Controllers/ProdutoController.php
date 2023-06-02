<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function compra(){
        $produtos = Produto::all();
        $total = $this->getTotal();

        return view('compras.compra', ['produtos' => $produtos, 'total' => $total]);
    }
    

    public function index(){
        $produtos = Produto::all();
        $total = $this->getTotal(); // Chama o método getTotal() para obter o valor total

        return view('compras.compra', ['produtos' => $produtos, 'total' => $total]);
    }
    

    

    public function create(){
        return view('compras.create');
    }

    public function store(Request $request){

        $produto = new Produto();
        $produto->descricao=$request->input('descricao');
        $produto->preco=$request->input('preco');
        $produto->quantidade=$request->input('quantidade');
        $produto->id_usuario='1';

        $produto->save();
        return redirect()->route('compras.index')->with('Sucess', 'Compra registrada com sucesso!');

    }

    public function show(string $id){
        $produto = Produto::find($id);

        if($produto){
            return view('compras.show')->with('produto', $produto);
        }else{
            return view('compras.show')->with('msg', 'Produto não encontrado');
        }   
    }

    public function edit(string $id){
        $produto = Produto::find($id);

        if($produto){
            return view('compras.edit')->with('produto', $produto);
        }else{
            $produtos = Produto::all();
            return view('compras.compra')->with('produtos', $produtos)->with('msg', 'Produto não encontrado!');
        }


    }

    public function update(Request $request, string $id){

        $produto = Produto::find($id);
        $produto->descricao= $request->input('descricao');
        $produto->preco= $request->input('preco');
        $produto->quantidade= $request->input('quantidade');

        $produto->save();

        $produtos = Produto::all();
        return redirect('http://127.0.0.1:8000/compras/')->with('msg', 'Atualizado com sucesso');
    }


    public function destroy(string $id){
        $produto = Produto::find($id);

        $produto->delete();

        $produtos = Produto::all();
        return redirect('http://127.0.0.1:8000/compras/')->with('msg', 'Atualizado com sucesso');    }

    public function menu(){
        return view('compras.menu');
    }

    public function getTotal()
    {
        $total = Produto::selectRaw('SUM(quantidade * preco) as total')->value('total');
        return $total;
    }

}
