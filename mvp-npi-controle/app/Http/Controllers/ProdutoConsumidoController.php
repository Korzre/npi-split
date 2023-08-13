<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\ProdutoConsumido;
use Illuminate\Http\Request;

class ProdutoConsumidoController extends Controller
{
    public int $id_usuario=1;

    public function consumido(){

        $produtos = ProdutoConsumido::select(
            "produtos.descricao", 
            "produto_consumido.quantidade",
            "produtos.preco",
            "produto_consumido.id_usuario"

        )->join("produtos","produto_consumido.id_produto","=","produtos.id")
        ->join("usuarios","produto_consumido.id_usuario","=","usuarios.id_usuario")
        ->where("produto_consumido.id_usuario", $this->id_usuario)->get();
        
        return view('consumo.index', ['produtos' => $produtos]);

    }


    public function index(){

        $produtos = ProdutoConsumido::select(
            "produto_consumido.id_produto_cons",
            "produtos.descricao", 
            "produto_consumido.quantidade",
            "produtos.preco",
            "produto_consumido.id_usuario",
            "produto_consumido.created_at"

        )->join("produtos","produto_consumido.id","=","produtos.id")
        ->join("usuarios","produto_consumido.id_usuario","=","usuarios.id_usuario")
        ->where("produto_consumido.id_usuario", $this->id_usuario)->get();
        
        #dd($produtos);
        return view('consumo.index')->with('produtos',$produtos);
    }


    public function create(){
        $produtos = Produto::all();
        return view('consumo.create')->with("produtos", $produtos);
    }

    public function store(Request $request, int $id_produto){

        $produto = new ProdutoConsumido();

        $produto->quantidade=$request->input('quantidade');
        $produto->id_usuario=$this->id_usuario;
        $produto->id=$id_produto;
        $produto->save();

        return redirect('http://127.0.0.1:8000/consumo/');

      }
    
    public function show(string $id){
        $produto = ProdutoConsumido::find($id);
        if($produto){
            return view('consumo.show')->with("produto", $produto);
        }else{
            return redirect('consumo.show')->with("msg", "Produto não encontrado!");
        }
    }

    public function edit(string $id){
        $produto = ProdutoConsumido::find($id);

        if($produto){
            return view("consumo.edit")->with("produto", $produto);
        }else{
            return redirect("http://127.0.0.1:8000/consumo/");
        }
    }


    public function update(string $id, Request $request){

        $produto = ProdutoConsumido::find($id);
        $produto -> quantidade = $request->input("quantidade");
        $produto->save();

        return redirect('http://127.0.0.1:8000/consumo/')->with("msg", "Atualizado com sucesso!");
    }

    public function destroy(string $id){
        $produto = ProdutoConsumido::find($id);
        $produto -> destroy();

        return redirect('http://127.0.0.1:8000/consumo/')->with("msg", "Produto exluído com sucesso!");
    }

    public function add(string $id){
        $produto = Produto::find($id);

        if($produto){
            return view("consumo.add")->with("produto", $produto);
        }else{
            $produtos = Produto::all();
            return view("consumo.create")->with("produtos", $produtos);
        }
    }

}