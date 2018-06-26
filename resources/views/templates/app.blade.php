<!DOCTYPE html>
<html>
<head>
    <title>E-conomize -- @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url('/img/e-conomize_logo.ico') }}" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="{{ url('/open-iconic/font/css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ url('/js/scripts.js') }}"></script>
    <script src="{{ url('/js/validacao.js') }}"></script>
    <script src="{{ url('/dist/inputmask/inputmask.js') }}"></script>
    <script src="{{ url('/dist/inputmask/inputmask.extensions.js') }}"></script>
    <script src="{{ url('/dist/inputmask/inputmask.numeric.extensions.js') }}"></script>
    <script src="{{ url('/dist/inputmask/jquery.inputmask.js') }}"></script>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top e-conBGcolor">
    <!--<div class="container">-->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/img/e-conomize_logo.png') }}" width="32" height="32" class="d-inline-block align-top" alt="E-conomize logo">
            <span style="font-family: 'Roboto Medium', sans-serif;">E-conomize</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="#" id="navbarDropdownMenuCompras" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="oi oi-list"></span> Compras
                    </a>
                    <ul class="dropdown-menu e-conBGcolor" aria-labelledby="navbarDropdownMenuCompras">
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/compras') }}">Mostrar últimas</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/compras/inserir') }}">Criar nova</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="#" id="navbarDropdownMenuPrecos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="oi oi-dollar"></span> Preços
                    </a>
                    <ul class="dropdown-menu e-conBGcolor" aria-labelledby="navbarDropdownMenuPrecos">
                        <li class="dropdown-item"><a class="nav-link" href="#">Ver preços sem compras</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/precos/inserir') }}">Adicionar novo</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="#" id="navbarDropdownMenuProdutos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="oi oi-basket"></span> Produtos
                    </a>
                    <ul class="dropdown-menu e-conBGcolor" aria-labelledby="navbarDropdownMenuProdutos">
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/produtos') }}">Ver produtos</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/marcas') }}">Ver marcas</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/categorias') }}">Ver categorias</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/produtos/inserir') }}">Adicionar Produto</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/marcas/inserir') }}">Adicionar marca</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/categorias/inserir') }}">Adicionar categoria</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" href="#" id="navbarDropdownMenuLugares" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="oi oi-map-marker"></span> Lugares
                    </a>
                    <ul class="dropdown-menu e-conBGcolor" aria-labelledby="navbarDropdownMenuLugares">
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/lugares') }}">Lugares disponíveis</a></li>
                        <li class="dropdown-item"><a class="nav-link" href="{{ url('/lugares/inserir') }}">Cadastrar novo local</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ url('/TEMPLATE') }}>TEMPLATE</a>
                </li>
            </ul>
        </div>
    <!--</div>-->
</nav>
<div style="margin: 30px 10%;">
    @yield('content')
</div>
<link href="{{ url('/css/economize.css') }}" rel="stylesheet">
</body>
</html>