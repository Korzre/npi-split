<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Produto;
use App\Models\ProdutoConsumido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public int $id_usuario = 3;

    public function index()
    {

        $produto_cons = ProdutoConsumido::where('id_usuario', $this->id_usuario)->get();
        #return view('relatorios.index', ['produto_consumido' => $produto_cons]);

        $produto_cons = ProdutoConsumido::all();
        $produtos = Produto::all();

        #dd($usuarios);
        #dd($produtos);

        $dados_dividas = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
            ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
            ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
            ->where('u_consumidor.id_usuario', '<>', $this->id_usuario)
            ->select(
                'u_comprador.nome as nome_comprador',
                'u_consumidor.nome as nome_consumidor',
                'p.descricao as descricao_produto',
                'p.quantidade as quantidade_original',
                'produto_consumido.quantidade as quantidade_consumida',
                'p.preco as preco_produto',
                'produto_consumido.id_usuario',
                'produto_consumido.id_produto_cons',
                'produto_consumido.pago',
                DB::raw('produto_consumido.quantidade * p.preco as valor_a_pagar')
            )
            ->get();


            $dados_rateio = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
            ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
            ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
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


        $usuarios = Usuario::all(); // ou qualquer outra consulta Eloquent


        return view('relatorios.index')->with("produtos", $produtos)
            ->with("produto_consumido", $produto_cons)
            ->with("dados_dividas", $dados_dividas)
            ->with("dados_rateio", $dados_rateio)
            ->with("usuarios", $usuarios);
    }

    public function gerarRelatorioPDF_produtos()
    {
        $produtos = Produto::all();
        $pdf = PDF::loadView('relatorios.pdf-prod', ['produtos' => $produtos])->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
        if ($pdf) {
            return $pdf->download('relatorio_produtos.pdf', ['Content-Type' => 'application/pdf']);
        } else {
            return "Erro ao gerar o relatório em PDF.";
        }
    }

    public function gerarRelatorioPDF_rateio($usuario){
        $usuarioObj = Usuario::where('nome', $usuario)->first();

        
        $id_usuario = $usuarioObj->id_usuario;
        $id_usuario;
        
        $dados_rateio = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
            ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
            ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
            ->select(
                'u_comprador.nome as nome_comprador',
                'p.descricao as descricao_produto',
                'produto_consumido.quantidade as quantidade_consumida',
                'p.preco as preco_produto',
                'u_comprador.pix',
                DB::raw('(produto_consumido.quantidade * p.preco) as valor_a_pagar')
            )
            ->get();


        $pdf = PDF::loadView('relatorios.pdf-rat', [
            'dados_rateio' => $dados_rateio,
        ]);

        if ($pdf) {
            return $pdf->download('relatorio_rateio.pdf', ['Content-Type' => 'application/pdf']);
        } else {
            return "Erro ao gerar o relatório em PDF.";
        }
    }

    public function gerarRelatorioPDF_dividas($usuario){
        $usuarioObj = Usuario::where('nome', $usuario)->first();

       

        $id_usuario = $usuarioObj->id_usuario;
        $id_usuario;
        
        $dados_dividas = ProdutoConsumido::join('produtos as p', 'produto_consumido.id_produto', '=', 'p.id')
        ->join('usuarios as u_comprador', 'p.id_usuario', '=', 'u_comprador.id_usuario')
        ->join('usuarios as u_consumidor', 'produto_consumido.id_usuario', '=', 'u_consumidor.id_usuario')
        ->where('u_consumidor.id_usuario', '<>', $this->id_usuario)
        ->select(
            'u_comprador.nome as nome_comprador',
            'u_consumidor.nome as nome_consumidor',
            'p.descricao as descricao_produto',
            'p.quantidade as quantidade_original',
            'produto_consumido.quantidade as quantidade_consumida',
            'p.preco as preco_produto',
            'produto_consumido.id_usuario',
            'produto_consumido.id_produto_cons',
            'produto_consumido.pago',
            DB::raw('produto_consumido.quantidade * p.preco as valor_a_pagar')
        )
        ->get();

        $pdf = PDF::loadView('relatorios.pdf-div', [
            'dados_dividas' => $dados_dividas,
        ]);

        if ($pdf) {
            return $pdf->download('relatorio_dividas.pdf', ['Content-Type' => 'application/pdf']);
        } else {
            return "Erro ao gerar o relatório em PDF.";
        }
    }

    public function gerarRelatorioPDF_usuario($usuario)
    {
        $usuarioObj = Usuario::where('nome', $usuario)->first();

        $id_usuario = $usuarioObj->id_usuario;
        $id_usuario;
        
        $produtos = Produto::where('id_usuario', $id_usuario)->get();

        $produto_consumido = ProdutoConsumido::where('id_usuario', $id_usuario)->get();

        $pdf = PDF::loadView('relatorios.pdf-usu', [
            'produtos' => $produtos,
            'produto_consumido' => $produto_consumido,
        ]);

        if ($pdf) {
            return $pdf->download('relatorio_usuario.pdf', ['Content-Type' => 'application/pdf']);
        } else {
            return "Erro ao gerar o relatório em PDF.";
        }
    }
}

