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
    
    <h1 style="font-family:'Lato'; text-align:center;" class="texto-cabecalho">Relatório de Rateio</h1>

<div>
    <table>
        <thead>
            <tr>
                <th>Comprador</th>
                <th>Descrição</th>
                <th>Quantidade Consumida</th>
                <th>Preço</th>
                <th>Valor a Pagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados_rateio as $dado)
                <tr>
                    <td>{{ $dado->nome_comprador }}</td>
                    <td>{{ $dado->descricao_produto }}</td>
                    <td>{{ $dado->quantidade_consumida }}</td>
                    <td>{{ $dado->preco_produto }}</td>
                    <td>{{ $dado->valor_a_pagar }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>

</div>
   

</body>

</html>
