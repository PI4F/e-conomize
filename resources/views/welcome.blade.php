<!doctype html>
<html lang="{{ app()->getLocale() }}" class="img img05" style="background-attachment: fixed;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ url('/img/e-conomize_logo.ico') }}" type="image/ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <title>E-conomize</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

        <!-- Styles -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:900');
            html, body {
                background-color: rgba(0,0,0,0%);
                color: #636b6f;
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .e-conBGcolor{
                background-color: rgb(0, 109, 240);
            }
            .e-conBGcolor li:hover{
                background-color: rgb(23, 131, 255);
            }

            .e-texto {
                padding: 20px;
                align-items: center;
                justify-content: center;
                margin: auto;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .subtitulo {
                font-family: 'Roboto', sans-serif;
                font-weight: 900;
                font-size: 0.35in;
                //font-size: 38px;
            }
            
            .img01 {
                background: url( '{{ url('/img/front_01.jpg') }}' );
            }

            .img02 {
                background: url( '{{ url('/img/front_02.jpg') }}' );
            }

            .img03 {
                background: url( '{{ url('/img/front_03.jpg') }}' );
            }

            .img04 {
                background: url( '{{ url('/img/front_04.jpg') }}' );
            }

            .img05 {
                background: url( '{{ url('/img/front_05.jpg') }}' );
            }

            .img {
                padding: 0px;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .row {
                margin-bottom: 100px;
            }

            .e-card {
                color: white;
                background-color: rgba(0, 109, 240, 40%);
            }

            .right-rounded {
                border-top-right-radius: 30px;
                border-bottom-right-radius: 30px;
            }

            .left-rounded {
                border-top-left-radius: 30px;
                border-bottom-left-radius: 30px;
            }
        </style>
    </head>
    <body>
        <div style="margin: 0 10%;">
            <header style="color: rgb(0, 109, 240); margin-top: 30px">
                <div class="row justify-content-between" style="padding: 20px; border-style: solid; border-width: 1px; border-radius: 10px;">
                    <div class="col-4 align-middle">
                        <img class="align-top" src="{{ url('/img/e-conomize_logo.png') }}" width="38" height="38">
                        <div style="font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 24px; display: inline-block;"> E-conomize</div>
                    </div>
                    <div class="col-4 text-right" style="margin: auto 0px;"><a class="btn btn-primary" href="{{ url('/compras') }}">Entrar</a></div>
                </div>
            </header>

            <div>
                <div class="content">
                    <div class="row e-card left-rounded">
                        <div class="col-sm-6 e-texto">
                            <p class="subtitulo">Comece a ter o controle da sua compra antes de chegar ao caixa</p>
                            <p>Com o E-conomize você vai registrando de maneira prática os itens em seu carrinho durante a compra e não tem surpresa ao passar no caixa.</p>
                        </div>
                        <div class="col-sm-6 img"><img src="{{ url('/img/front_02.jpg') }}" class="img-fluid"></div>
                    </div>
                    <div class="row e-card right-rounded">
                        <div class="col-sm-6 img"><img src="{{ url('/img/front_01.jpg') }}" class="img-fluid"></div>
                        <div class="col-sm-6 e-texto">
                            <p class="subtitulo">Agora é fácil saber onde é o local mais barato realizar suas compras</p>
                            <p>Com a frequência de uso, com o tempo você conseguirá vem com o aplicativo quais os lugares onde determinados produtos estão mais baratos ou mesmo compra toda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
