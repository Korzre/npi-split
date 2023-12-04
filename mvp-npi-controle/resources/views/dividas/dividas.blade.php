<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="container">
        <div class="painel">

            <div style="margin-top: -235px;" class="container">

                <div class="div1 ">
                    <div style="margin-left:50px" class="container1">
                        <span class="text"><a href="http://127.0.0.1:8000/menu"><label class="letra-m"
                                    for="">M</label>Menu principal</a></span>
                        <span class="icon"><img src="{{ asset('/icons/arrow-down.svg') }}" width="12px"
                                height="12px" alt=""></span>
                    </div>
                </div>
                <div class="div2">

                    <div class="pesquisar">
                        <div class="container1">
                            <span class="icon"><img src="{{ asset('/icons/pesquisar.svg') }}" width="32px"
                                    height="32px" alt=""></span>
                            <span style="margin-left: 10px;margin-top:29px;" class="text"><input class="textboxp"
                                    placeholder="Procurar" type="text" disabled></span>

                        </div>
                    </div>

                    <div class="user container2">
                        <div style="margin-right: 20px;" class="user-text">Danilo Manuel</div>
                        <ul class="ul1">

                            <li class="li1"><img src="{{ asset('/icons/persona.svg') }}" width="40px"
                                    height="40px" alt=""></li>
                            <li class="li1"><img src="{{ asset('/icons/notifications.svg') }}" width="40px"
                                    height="40px" alt=""></li>
                        </ul>
                    </div>

                </div>

            </div>

            <!-- Painel -->
            <div class="container-04">

                <div class="menu">
                    <ul class="ul2">

                        <a href="http://127.0.0.1:8000/compras/compra">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/shop.svg') }}" width="25px"
                                        height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Compras</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/consumo/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/consumo.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Consumo</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/rateio/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/rateio.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Rateio</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/dividas/">
                            <li class="li2" style="opacity:1;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/dividas.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Dívidas</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/relatorios/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/relatorio.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Relatórios</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/sessao/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/logout.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Logout</span>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>

                <!-- O meu canvas é esse aqui!-->

                
                <div class="container-compras">
                    <div class="tab-listar">
                        <div class="status">Dívidas</div>
                        
                        <div class="table-container">

                            {!! Form::open(['route' => 'atualizarPagamento', 'id' => 'formAtualizarPagamento', 'method' => 'POST']) !!}
                            @csrf
                            @if (($dados->count()) == 0)
                        ⚠️ &nbsp;&nbsp;Não tem ninguém te devendo!
                        @else
                            <table>
                                
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
                                    @foreach ($dados as $dado)
                                        <tr>
                                            <td>{{ $dado->nome_consumidor }}</td>
                                            <td>{{ $dado->descricao_produto }}</td>
                                            <td>{{ $dado->preco_produto }}</td>
                                            <td>{{ $dado->quantidade_consumida }}</td>
                                            <td>{{ $dado->valor_a_pagar }}</td>
                                            <td>
                                                {!! Form::checkbox('produtosPagos[]', $dado->id_produto_cons, false, [
                                                    'onchange' => 'atualizarPagamento(this)',
                                                    'value' => $dado->id_produto_cons,
                                                    'name' => 'checkbox_produtos[]',
                                                ]) !!}
                                                {!! Form::hidden('id_usuario', $dado->id_usuario) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                
                <!-- O meu canvas é esse aqui!-->

            </div>

        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function atualizarPagamento(checkbox) {
            console.log('Checkbox marcado:', checkbox.checked);
            var idProdutoCons = checkbox.value;

            // Enviar solicitação Ajax
            $.ajax({
                url: '{{ route('atualizarPagamento') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'produtosPagos': [idProdutoCons],
                    'id_usuario': checkbox.parentElement.querySelector('[name="id_usuario"]').value
                },
                success: function(response) {
                    console.log(response);
                    // Se desejar fazer algo após a conclusão bem-sucedida, adicione aqui
                },
                error: function(error) {
                    console.error(error);
                    // Se desejar tratar erros, adicione aqui
                }
            });
        }
    </script>
</body>

</html>
