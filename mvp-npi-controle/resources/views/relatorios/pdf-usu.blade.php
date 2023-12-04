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
    
<h1 style="font-family:'Lato'; text-align:center;" class="texto-cabecalho">Relatório de produtos comprados</h1>
<table>
    <thead>
        <tr>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $p1)
            <tr>
                <td>{{ $p1->descricao }}</td>
                <td>{{ $p1->quantidade }}</td>
                <td>{{ $p1->preco }}</td>

            </tr>
        @endforeach

    </tbody>
</table>


    <h1 style="font-family:'Lato'; text-align:center;" class="texto-cabecalho">Relatório de produtos consumidos</h1>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data de criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produto_consumido as $p2)
                <tr>
                    <td>{{ $p2->produto->descricao }}</td>
                    <td>{{ $p2->quantidade }}</td>
                    <td>{{ $p2->produto->preco }}</td>
                    <td>
                        <div class="border_data">{{ $p2->created_at }}</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>

</html>
