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
                        <span class="text"><a href="http://127.0.0.1:8000/login">CONTROLE DE PAGAMENTO</a></span>
                        
                    </div>
                </div>
                <div class="div2">

                <img style="margin-left: 660px;" src={{asset('/icons/unifil.svg')}} width="200px" height="50px" alt="">
                    
                </div>

            </div>

            <!-- Painel -->
            <div class="rosto-img">
                <img class="imgrosto" src={{asset('/icons/iconeuser.svg' )}}
                width="160px"
                height="160px"
                alt="">

                <div class="button-sessao">
                    <span class="texto-rosto">ENTRAR</span>

                    <div class="google-icon">
                        <img class="img-google" src={{asset('/icons/icongoogle.svg')}}
                        width="30px"
                        height="30px"
                        alt="">
                    </div>
                </div>
            </div>
           
            <!-- O meu canvas é esse aqui!-->
            </div>

        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttonSessao = document.querySelector('.button-sessao');
    
            buttonSessao.addEventListener('click', function () {
                window.location.href = '{{ route('google-redirect') }}';
            });
        });
    </script>
</body>

</html>