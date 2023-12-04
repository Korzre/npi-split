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
                        <span class="text"><a href="http://127.0.0.1:8000/login" >CONTROLE DE PAGAMENTO</a></span>
                        
                    </div>
                </div>
                <div class="div2">

                <img style="margin-left: 660px;" src={{asset('/icons/unifil.svg')}} width="200px" height="50px" alt="">
                    
                </div>

            </div>

            <!-- Painel -->
           
            <div class="formulario-log">

                <div class="menu-formulario">
                    <ul>
                        <li>
                            <div class="clash1">
                                <span class="text-cadastro">Email</span><br>
                                <input placeholder="EMAIL" class="caixa-texto" type="email" name="" id="">
                            </div>
                        </li>
                        <li>
                            <div class="clash1">
                                <span class="text-cadastro">Matrícula</span><br>
                                <input placeholder="MATRÍCULA" class="caixa-texto" type="number" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Novo bloco menu-formulario replicado -->
                <div class="menu-formulario" style="margin-top: -200px;">
                    <ul>
                        <li>
                            <div class="clash1">
                                <span class="text-cadastro">CÓDIGO PIX</span><br>
                                <input class="caixa-texto" type="text" name="" id=""
                                placeholder="TIPO-CÓDIGO">
                            </div>
                        </li>
                        <li>
                            <div class="clash1">
                                <span class="text-cadastro">NOME</span><br>
                                <input placeholder="NOME" class="caixa-texto" type="text" name="" id="">
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="button-cadastrar">
                        Cadastrar
                </div>
            </div>
           
            <!-- O meu canvas é esse aqui!-->
            </div>

        </div>


    </div>


</body>

</html>