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
    
    <h1 style="font-family:'Lato'; text-align:center;" class="texto-cabecalho">Relatório de Produtos</h1>

<div>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    <td>{{ $produto->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
   

</body>

</html>
