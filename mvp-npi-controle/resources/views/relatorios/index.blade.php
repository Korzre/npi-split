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
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/dividas.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Dívidas</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/relatorios/">
                            <li class="li2" style="opacity:1;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/relatorio.svg') }}"
                                        width="25px" height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Relatórios</span>
                                </div>
                            </li>
                        </a>

                        <a href="http://127.0.0.1:8000/login/">
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
                        <div class="status">Relatórios</div>

                        <div class="menu-rel">

                            <div class="menu-rel1">
                                <ul>
                                    <li>
                                        <div class="button-rel" onclick="relprod()" id="idprodutos">
                                            <span class="texto-rel">Produtos</span>
                                            <img src={{ asset('/icons/relatorio_icon.svg') }} width="40px"
                                                height="40px" alt="">
                                        </div>
                                    </li>

                                    <li>
                                        <div class="button-rel" onclick="relusuario()">
                                            <span class="texto-rel">Usuário</span>
                                            <img src={{ asset('/icons/relatorio_icon.svg') }} width="40px"
                                                height="40px" alt="">
                                        </div>
                                    </li>



                                    <li>
                                        <div class="button-rel" onclick="reldivida()">
                                            <span class="texto-rel">Dívida</span>
                                            <img src={{ asset('/icons/relatorio_icon.svg') }} width="40px"
                                                height="40px" alt="">
                                        </div>
                                    </li>

                                    <li>
                                        <div class="button-rel" onclick="relrateio()">
                                            <span class="texto-rel">Rateio</span>
                                            <img src={{ asset('/icons/relatorio_icon.svg') }} width="40px"
                                                height="40px" alt="">
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- relatórios: usuário -->

                            <div class="painel-rel-usu" id="painel-rel-usu">
                                <span class="titulo3">Relatório de usuários</span>

                                <div class="selecc">
                                    <label class="usuarios-rel" for="nomes">Usuários</label>
                                    <select id="nomes" name="nomes">
                                        @foreach ($usuarios->pluck('nome') as $nome)
                                            <option value={{ $nome }}>{{ $nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <span class="lab-comprado">Comprado</span>
                                    <span class="lab-comprado1">Consumido</span>
                                    <div class="tabela-rel-usu">
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

                                    </div>
                                </div>

                                <div class="fecharusu" onclick="fecharusu()">
                                    X
                                </div>

                                <div class="button-rel-usu" onclick="gerarRelatorioPDF()">
                                    <img class="img-imprimir" src={{ asset('/icons/imprimir.svg') }} width="40px"
                                        height="40px" alt="">
                                    <span class="texto-rel-usu">Imprimir</span>
                                </div>

                            </div> <!-- relatório de dívidas -->

                            <div class="painel-rel-dividas" id="painel-rel-dividas">
                                <span class="titulo3">Relatório de dívidas</span>

                                <div class="selecc">
                                    <label class="usuarios-rel" for="nomes">Usuários</label>
                                    <select id="nomes" name="nomes">

                                        @foreach ($usuarios->pluck('nome') as $nome)
                                            <option value={{ $nome }}>{{ $nome }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="tabelal">
                                    <span class="lab-comprado"></span>
                                    <div class="tabela-rel-prod">
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
                                </div>

                                <div class="fecharprod" onclick="fechardiv()">
                                    X
                                </div>

                                <div class="button-rel-prod" onclick="gerarRelatorioPDF_div()">
                                    <img class="img-imprimir" src={{ asset('/icons/imprimir.svg') }} width="40px"
                                        height="40px" alt="">
                                    <span class="texto-rel-usu">Imprimir</span>
                                </div>



                            </div> <!-- relatórios -->

                            <!-- relatório de produtos -->

                            <div class="painel-rel-produtos" id="painel-rel-produtos">
                                <span class="titulo3">Relatório de produtos</span>

                                <div class="tabelal">
                                    <span class="lab-comprado"></span>
                                    <div class="tabela-rel-prod">
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
                                                @foreach ($produtos as $p)
                                                    <tr>
                                                        <td>{{ $p->descricao }}</td>
                                                        <td>{{ $p->quantidade }}</td>
                                                        <td style="text-transform: uppercase">R${{ $p->preco }}
                                                        </td>
                                                        <td>
                                                            <article
                                                                style="margin-left:80px;width: 300px;text-align:center;"
                                                                class="data-cr">{{ $p->created_at }}</article>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>



                                    </div>
                                </div>

                                <div class="fecharprod" onclick="fecharprod()">
                                    X
                                </div>


                                <a class="button-rel-prod button-rel-prod-click" href="http://127.0.0.1:8000/relatorio/pdf-prod">
                                    <img class="img-imprimir" src={{ asset('/icons/imprimir.svg') }} width="40px"
                                        height="40px" alt="">
                                    <span class="texto-rel-usu">Imprimir</span>
                                </a>



                            </div> <!-- relatórios -->


                            <!-- relatório de rateio -->

                            <div class="painel-rel-rateio" id="painel-rel-rateio">
                                <span class="titulo3">Relatório de rateio</span>

                                <div class="selecc">
                                    <label class="usuarios-rel" for="nomes">Usuários</label>
                                    <select id="nomes" name="nomes">
                                        @foreach ($usuarios->pluck('nome') as $nome)
                                            <option value={{ $nome }}>{{ $nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="tabelal">
                                    <span class="lab-comprado"></span>
                                    <div class="tabela-rel-prod">
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
                                </div>

                                <div class="fecharprod" onclick="fecharateio()">
                                    X
                                </div>

                                <div class="button-rel-prod" onclick="gerarRelatorioPDF_rat()">
                                    <img class="img-imprimir" src={{ asset('/icons/imprimir.svg') }} width="40px"
                                        height="40px" alt="">
                                    <span class="texto-rel-usu">Imprimir</span>
                                </div>

                            </div> <!-- relatórios -->
                            <!-- -->
                        </div>
                    </div>



                </div>

            </div>



            <!-- O meu canvas é esse aqui!-->

        </div>

    </div>


    </div>

    <script>
        function relprod() {
            document.getElementById('painel-rel-produtos').style.display = 'block';
        }

        function relusuario() {
            document.getElementById('painel-rel-usu').style.display = 'block';

        }

        function reldivida() {
            document.getElementById('painel-rel-dividas').style.display = 'block';
        }

        function relrateio() {
            document.getElementById('painel-rel-rateio').style.display = 'block';
        }

        function fecharprod() {
            document.getElementById('painel-rel-produtos').style.display = 'none';
            document.getElementById('painel-rel-usu').style.display = 'none';

        }

        function fecharusu() {
            document.getElementById('painel-rel-usu').style.display = 'none';
        }


        function fechardiv() {
            document.getElementById('painel-rel-dividas').style.display = 'none';

        }

        function fecharateio() {
            document.getElementById('painel-rel-rateio').style.display = 'none';
        } //.button-rel-prod-click

        function gerarRelatorioPDF() {
            var selectedUser = document.getElementById('nomes').value;
            var url = '/relatorio/pdf-usu/' + encodeURIComponent(selectedUser);
            window.location.href = url;
        }

        function gerarRelatorioPDF_rat() {
            var selectedUser = document.getElementById('nomes').value;
            var url = '/relatorio/pdf-rat/' + encodeURIComponent(selectedUser);
            window.location.href = url;
        }

        function gerarRelatorioPDF_div() {
            var selectedUser = document.getElementById('nomes').value;
            var url = '/relatorio/pdf-div/' + encodeURIComponent(selectedUser);
            window.location.href = url;
        }

    </script>
</body>

</html>
