<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="/css/styles.css">

    <!-- Styles -->
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href='/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/css/modern-business.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    <link href='/css/shop-homepage.css' rel='stylesheet'>
    <link href='/css/shop-item.css' rel='stylesheet'>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Natural Market
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @endif
                    
                    <li><a href="{{ url('/products/list') }}">Productos</a></li>

                    <!-- Si estás logueado podés ver a los vendedores, seguidores y notificaciones -->
                    @if (!Auth::guest())
                    

                    <li><a href="{{ url('/users/sellersList') }}">Vendedores</a></li>

                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Seguidores <span class="caret"></span>
                            </a>
                        <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/users/followingList') }}">Tú sigues ({{ Auth::user()->following->count() }})</a></li>
                                <li><a href="{{ url('/users/followersList') }}">Te siguen ({{ Auth::user()->followers->count() }})</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ url('/notifications/list') }}">Notificaciones</a></li>

                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/users/myProfile"><i class="fa fa-btn fa-user"></i>Mi Perfil</a></li>
                                <li><a href="/orders/purchases"><i class="fa fa-btn fa-shopping-cart"></i>Mis Compras</a></li>

                                <!-- Customer Links -->
                                @if (Auth::user()->type_id == 2)
                                <li><a href="/orders/sales"><i class="fa fa-btn fa-signal"></i>Mis Ventas</a></li>
                                    <li><a href="/products/myList"><i class="fa fa-btn fa-align-justify"></i>Mis Productos</a></li>
                                @endif

                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <footer>
        @yield('footer')
        <script type="text/javascript" src="/js/jquery.js"></script>    
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </footer>
    
    
</body>
</html>
