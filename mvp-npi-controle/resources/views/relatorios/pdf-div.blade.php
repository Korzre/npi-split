<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>

    <style>
        .cabecalho {
            width: 100%;
            margin-top: 00px;
            height: 60px;
            background-color: #D07F38;
        }

        .texto-cabecalho {
            
        }
    </style>
</head>

<body>

    <div class="cabecalho"></div>
    
    <h1 style="font-family:'Lato'; text-align:center;" class="texto-cabecalho">Relatório de Dívidas</h1>

<div>
    <table class="tabela-table">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade Consumida</th>
                <th>Valor a receber</th>
                <th>Pago?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados_dividas as $dado)
                <tr>
                    <td>{{ $dado->nome_consumidor }}</td>
                    <td>{{ $dado->descricao_produto }}</td>
                    <td>{{ $dado->preco_produto }}</td>
                    <td>{{ $dado->quantidade_consumida }}</td>
                    <td>{{ $dado->valor_a_pagar }}</td>
                    @if ($dado->pago == 1)
                        <td>Sim!</td>
                    @else
                        <td>Não!</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
   

</body>

</html>
