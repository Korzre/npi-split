<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>
        function limpar(){
            document.getElementById('quantidade').value = ''
        }
    </script>
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

                        <a href="http://127.0.0.1:8000/compras/">
                            <li class="li2" style="opacity:0.6;">
                                <div class="container1">
                                    <img style="margin-left: 40px;" src="{{ asset('/icons/shop.svg') }}" width="25px"
                                        height="30px" alt="Erro">
                                    <span style="margin-left: 15px;margin-top:15px">Compras</span>
                                </div>
                            </li>
                        </a>

                        <li class="li2" style="opacity:1;">
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

                        <a href="http://127.0.0.1:5500/pages/">
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
                
                
                <form class="form1" id="save-produto" method="POST" action="{{ route('consumo.store', $produto->id ) }}">
                    <div class="status">Adicionar produto</div>
                    @csrf
                    <div class="spacex">
                        <div class="box">
                            <label for="textbox">Descrição</label>
                            <div>
                                <input style="border: 1px solid #F08223;background: #E9E9E9;color:rgb(0, 0, 0,.4)" class="caixa" type="text" id="descricao" name="descricao" disabled required value="{{$produto->descricao}}">
                            </div>
                        </div>

                        <div class="box">
                            <label for="textbox">Preço</label>
                            <div>
                                <input style="border: 1px solid #F08223;background: #E9E9E9;color:rgb(0, 0, 0,.4)" class="caixa1" type="number" id="preco" name="preco" disabled required value="{{$produto->preco}}">
                            </div>
                        </div>

                    </div>

                    <div class="spacex">
                        <div class="box">
                            <label for="textbox">Quantidade</label>
                            <div>
                                <input class="caixa" type="number" id="quantidade" name="quantidade">
                            </div>
                        </div>

                        <div style="margin-left: 0px;" class="box">
                            <div class="input-group">
                                <button title="Salvar produto" form="save-produto" type="submit" class="btn-op">
                                    <img style="margin-left: 25px;margin-top:0px;" src="/icons/save.svg" width="22px" height="22px" alt="">
                                    <label class="save-text">Salvar</label> 
                                </button>

                                <button title="Limpar" class="btn-op" type="button" onclick="limpar()">
                                    <img  style="cursor: pointer;margin-left: 10px;margin-top:0px;" src="{{asset('/icons/clear.svg')}}" width="30px" height="30px" alt="">
                                    <label class="save-text" >Limpar</label> 
                                </button>
                                
                            </div>
                        </div>

                    </div>
                </form>
            

            <!-- O meu canvas é esse aqui!-->

        </div>

    </div>


    </div>


</body>

</html>
