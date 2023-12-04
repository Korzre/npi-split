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
                            <li class="li2" style="opacity:1;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/rateio.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Rateio</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/dividas/">
                            <li class="li2" style="opacity:0.6;">
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
                                    <img style="margin-left: 40px;" src="{{asset('/icons/relatorio.svg')}}" width="25px" height="30px"
                                        alt="Erro">
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
                        <div class="status">Rateio</div>
                  

                    <div class="table-container">
                        @if (($dados->count()) == 0)
                        ⚠️ &nbsp;&nbsp;Não tem ninguém para pagar
                        @else
                        <table>
                            <thead>
                                <tr>
                                    <th>Comprador</th>
                                    <th>Descrição</th>
                                    <th>Quantidade Consumida</th>
                                    <th>Preço</th>
                                    <th>Valor a Pagar</th>
                                    <th>Pix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr>
                                        <td>{{ $dado->nome_comprador }}</td>
                                        <td>{{ $dado->descricao_produto }}</td>
                                        <td>{{ $dado->quantidade_consumida }}</td>
                                        <td>{{ $dado->preco_produto }}</td>
                                        <td>{{ $dado->valor_a_pagar }}</td>
                                        <td style="color: #cfad05;">{{ $dado->pix }}</td>
                                    </tr>
                                @endforeach
                                @endif


                            </tbody>
                        </table>

                    </div>


                </div>



            </div>

        </div>



        <!-- O meu canvas é esse aqui!-->

    </div>

    </div>


    </div>


</body>

</html>
