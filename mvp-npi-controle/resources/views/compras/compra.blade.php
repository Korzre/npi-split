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
                        <span class="text"><a href="http://127.0.0.1:8000/compras/menu"><label
                                    class="letra-m" for="">M</label>Menu principal</a></span>
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
                                    placeholder="Procurar" type="text"></span>

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
                            <li class="li2" style="opacity:1;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/shop.svg') }}" width="25px"
                                        height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Compras</span>
                                </div>
                            </li>
                        </a>

                        <li class="li2" style="opacity:0.6;">
                            <div class="container1">
                                <img style="margin-left: 40px;" src="{{asset('/icons/consumo.svg')}}" width="25px" height="30px"
                                    alt="Erro">
                                <span style="margin-left: 15px;margin-top:15px">Consumo</span>
                            </div>
                        </li>

                        <li class="li2" style="opacity:0.6;">
                            <div class="container1">
                                <img style="margin-left: 40px;" src="{{asset('/icons/rateio.svg')}}" width="25px" height="30px"
                                    alt="Erro">
                                <span style="margin-left: 15px;margin-top:15px">Rateio</span>
                            </div>
                        </li>

                        <li class="li2" style="opacity:0.6;">
                            <div class="container1">
                                <img style="margin-left: 40px;" src="{{asset('/icons/dividas.svg')}}" width="25px" height="30px"
                                    alt="Erro">
                                <span style="margin-left: 15px;margin-top:15px">Dívidas</span>
                            </div>
                        </li>

                        <li class="li2" style="opacity:0.6;">
                            <div class="container1">
                                <img style="margin-left: 40px;" src="{{asset('/icons/perfil.svg')}}" width="25px" height="30px"
                                    alt="Erro">
                                <span style="margin-left: 15px;margin-top:15px">Perfil</span>
                            </div>
                        </li>

                        <a href="http://127.0.0.1:8000/sessao/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{asset('/icons/logout.svg')}}" width="25px"
                                        height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Logout</span>
                                </div>
                            </li>
                        </a>

                    </ul>
                </div>

                <!-- O meu canvas é esse aqui!-->
                
                
                <div class="container-compras">
                    <div class="tab-listar">
                        <div class="status">Compras</div>

                        <div class="table-container">
                            @if (($produtos->count()) == 0)
                                ⚠️ &nbsp;&nbsp;Não tem nenhuma compra registrada!
                            @else
                            <table>
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Data de criação</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produtos as $p)
                                    <tr>
                                        <td>{{$p->descricao}}</td>
                                        <td>{{$p->quantidade}}</td>
                                        <td>{{$p->preco}}</td>
                                        <td>
                                           {{$p->created_at}}
                                          
                                        </td>

                                        <td title="Exibir"><a class="btn-v" href="{{ route('compras.show', $p->id) }}"><img src="/icons/view.svg"
                                                    width=30px" height="30px" alt=""></a></td>
                                        <td title="Editar"><a class="btn-v" href="{{ route('compras.edit', $p->id) }}"><img src="/icons/edit.svg"
                                                    width=30px" height="30px" alt=""></a></td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            @endif
                        </div>
                        
                        <a class="btn-produto" href="http://127.0.0.1:8000/compras/create">
                            <img class="img-add" style="margin-left:10px;" src="{{asset('/icons/add.svg')}}" width="10px"
                                height="10px" alt="">
                            <article class="add">Adicionar produto</article>
                        </a>
                    </div>

                    <div class="tab-gastos">
                        <article class="text1"> Gastos</article> 

                        <article style="font-size: 28px;" class="text2"><R$>{{$total}}</R$></article>
                        
                        <img class="img-g" src="/icons/gastos.svg" width="80px" height="80px" alt="">
                        
                        <article class="text4">Produtos comprados</article>

                        <article style="font-size:28px;" class="text5">{{$produtos->count()}}</article>

                        <img class="img-g1" src="/icons/nprosutos.svg" width="80px" height="80px" alt="">
                    </div>




                </div>

            </div>
            


            <!-- O meu canvas é esse aqui!-->

        </div>

    </div>


    </div>


</body>

</html>
