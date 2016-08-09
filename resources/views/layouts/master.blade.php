<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal de venta de Productos Naturales y Orgánicos">
    <meta name="author" content="Francisco López - Gonzalo Maceira">
    <link rel="icon" type="image/ico" href="/images/favicon.png">

    <title>Natural Market</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/ed5eec95.main.css"/>
    <link rel="stylesheet" href="/css/styles.css"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <!-- SI EL USUARIO ESTÁ LOGUEADO IMPRIMIMOS UN TAG CON SU ID PARA USARLO CON PUSHER -->

      @if(!Auth::guest())
        <input id="userId-pusher" type="hidden" value="{{ Auth::user()->id }}" />
      @endif

    <div class="top  js--fixed-header-offset">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  col-sm-6">
        <div class="top__slogan">
          Hecho con el <small><span class="glyphicon  glyphicon-heart  tertiary-color"></span></small> para un estilo de vida sano
        </div>
      </div>
      <div class="col-xs-12  col-sm-6">
        <div class="top__menu">
          <ul class="nav  nav-pills">
            @if (Auth::guest())

            <li><a href="#registerModal" role="button" data-toggle="modal">Register</a></li>
            <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
            
              
            @endif
            @if (!Auth::guest())
     
            <!-- Dejo el Id de usuario logueado para que lo tome js para PUSHER -->
            <span id="idUserLogedIn" style="visibility:hidden">{{ Auth::user()->id }}</span>

            <li class="dropdown  js--mobile-dropdown">
              <a class="dropdown-toggle" href="#">
                Mi cuenta ({{ Auth::user()->name }}): <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
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
    </div>
  </div>
</div>

<!-- Modal register-->
<?php $cities = App\City::all()?>
<div class="modal  fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3><span class="light">Registrate</span> en Natural Market</h3>
        <hr class="divider">
      </div>
      <div class="modal-body">
        <form class="form-group" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
          <input type="hidden" name="type_id" value="1" />

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control  form-control--contact" placeholder="Nombre">
                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control  form-control--contact" placeholder="Apellido">
                @if ($errors->has('lastname'))
                  <span class="help-block">
                      <strong>{{ $errors->first('lastname') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control  form-control--contact" name="email" value="{{ old('email') }}" placeholder="Email" >
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control  form-control--contact" name="password" placeholder="Password" >
                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" class="form-control  form-control--contact" name="password_confirmation" placeholder="Re-ingrese Password" >
                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
              <select class="form-control  form-control--contact" name="city_id">
                  <option value="0">Barrio</option>

                  @foreach($cities as $city)
                      <option  value="{{ $city->id }}"

                          @if($city->id == old('city_id'))
                              selected
                          @endif
                      >
                          {{ $city->name }}
                      </option>
                  @endforeach
              </select>

              @if ($errors->has('city_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('city_id') }}</strong>
                  </span>
              @endif
            </div>

            <input type="hidden" name="avatar" value="images/users/default.png">

            <button type="submit" class="btn  btn-primary">REGISTRARME</button>
        </form>
        <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Ya estas registrado?</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal login-->
<div class="modal  fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3><span class="light">Login</span> en Naural Market</h3>
        <hr class="divider">
      </div>
      <div class="modal-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">{{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" id="email" class="form-control  form-control--contact" placeholder="Email">
            @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" name="password" class="form-control  form-control--contact" placeholder="Password" >
            @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>

          <button type="submit" class="btn  btn-primary">ENTRAR</button>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Recodarme
                    </label>
                </div>
                <a data-toggle="modal" role="button" href="{{ url('/password/reset') }}" data-dismiss="modal">Olvidaste tu contraseña?</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-xs-10  col-md-2">
        <div class="header-logo">
          <a href="/"><img alt="Logo" src="/images/logo.png" width="180" height="80"></a>
        </div>
      </div>
      <div class="col-xs-2  visible-sm  visible-xs">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#collapsible-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
      <div class="col-xs-12  col-md-8">
        <nav class="navbar  navbar-default" role="navigation">
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse  navbar-collapse" id="collapsible-navbar">
    <ul class="nav  navbar-nav">
      <li class="dropdown">
        <a href="/" class="dropdown-toggle">HOME</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="index.html">Home (Shop)</a></li>
          <li><a href="home-business.html">Home (Business)</a></li>
          <li><a href="home-slider.html">Home (Slider)</a></li>
          <li><a href="home-slider-sticky-navbar.html">Home with Sticky Navbar</a></li>
        </ul> -->
      </li>
      <li class="dropdown">
        <a href="/products/list" class="dropdown-toggle">PRODUCTOS</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="/products/list">Productos Orgánicos</a></li>
          <li><a href="shop-list-view.html">Tienda de Ropa?</a></li>
        </ul> -->
      </li>

      <li class="dropdown">
        <a href="/users/sellersList" class="dropdown-toggle">VENDEDORES</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="/products/list">Productos Orgánicos</a></li>
          <li><a href="shop-list-view.html">Tienda de Ropa?</a></li>
        </ul> -->
      </li>

      @if(!Auth::guest())
        <li class="dropdown">
        @if(Auth::user()->notifications()->where('status_id', 0)->count() > 0)

          <a href="/notifications/list" class="dropdown-toggle">NOTIFICACIONES
              <span id="barNotifications" class="badge">
                {{ Auth::user()->notifications()->where('status_id', 0)->count() }}
              </span>
          </a>

          <ul class="dropdown-menu">
            @foreach(Auth::user()->notifications as $notification)
              <li class="notification_{{ $notification->status_id }}">
                <a href="{{ $notification->url }}/{{ $notification->id }}">
                  {{ $notification->userEvent->name }} {{ $notification->event->name }}
                </a>
              </li>
            @endforeach
          </ul>

          @else

            <a href="/notifications/list" class="dropdown-toggle">NOTIFICACIONES
              <span id="barNotifications" class="badge" style="display:none"></span>
            </a>

          @endif

        </li>

        <li class="dropdown">
          <a href="features.html" class="dropdown-toggle">SEGUIDORES</a>
          <ul class="dropdown-menu">
            <li><a href="/users/followingList">Usuarios que sigues</a></li>

              @if(!Auth::guest() && Auth::user()->type_id==2)
                <li><a href="/users/followersList">Usuarios que te siguen</a></li>
              @endif

          </ul>
        </li>
      @endif

      <li class="hidden-xs  hidden-sm">
        <a href="#" class="js--toggle-search-mode"><span class="glyphicon  glyphicon-search  glyphicon-search--nav"></span></a>
      </li>
    </ul>
    <!-- search for mobile devices -->
    <form action="{{ url('/products/list/search') }}" method="POST" class="visible-xs  visible-sm  mobile-navbar-form" role="form">{{ csrf_field() }}
      <div class="form-group {{ $errors->has('parameter') ? ' has-error' : '' }}">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="parameter" value="{{ old('parameter') }}">
        <div class="form-group">
        @if ($errors->has('parameter'))
            <span class="help-block">
                <strong>{{ $errors->first('parameter') }}</strong>
            </span>
        @endif
        <span class="input-group-addon">
          <button type="submit" class="mobile-navbar-form__appended-btn"><span class="glyphicon  glyphicon-search  glyphicon-search--nav"></span></button>
        </span>
      </div>
    </form>
    @if (!Auth::guest())
    <!--<div class="mobile-cart  visible-xs  visible-sm  push-down-15">
        <span class="header-cart__text--price"><span class="header-cart__text">Carrito</span> $49.35</span>
      <a href="cart.html" class="header-cart__items">
        <span class="header-cart__items-num">3</span>
      </a>
    </div>
    @endif
  </div><!-- /.navbar-collapse -->
</nav>
      </div>
      <div class="col-xs-12  col-md-2  hidden-sm  hidden-xs">
        <!-- Cart in header -->
@if (!Auth::guest())
  @if(session('cart'))
    <div class="header-cart">
      <span class="header-cart__text--price"><span class="header-cart__text">Carrito</span> $49.35</span>
      <a href="#" class="header-cart__items">
        <span class="header-cart__items-num">3</span>
      </a>
      <!-- Open cart panel -->
      <div class="header-cart__open-cart">

        <div class="header-cart__product  clearfix  js--cart-remove-target">
          <div class="header-cart__product-image">
            <img alt="Product in the cart" src="/images/dummy/product-cart.jpg" width="40" height="50">
          </div>
          <div class="header-cart__product-image--hover">
            <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
          </div>
          <div class="header-cart__product-title">
            <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
            <span class="header-cart__qty">Qty: 1</span>
          </div>
          <div class="header-cart__price">
            $16.45
          </div>
        </div>

        <div class="header-cart__product  clearfix  js--cart-remove-target">
          <div class="header-cart__product-image">
            <img alt="Product in the cart" src="/images/dummy/product-cart.jpg" width="40" height="50">
          </div>
          <div class="header-cart__product-image--hover">
            <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
          </div>
          <div class="header-cart__product-title">
            <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
            <span class="header-cart__qty">Qty: 1</span>
          </div>
          <div class="header-cart__price">
            $16.45
          </div>
        </div>

        <div class="header-cart__product  clearfix  js--cart-remove-target">
          <div class="header-cart__product-image">
            <img alt="Product in the cart" src="/images/dummy/product-cart.jpg" width="40" height="50">
          </div>
          <div class="header-cart__product-image--hover">
            <a href="#" class="js--remove-item" data-target=".js--cart-remove-target"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
          </div>
          <div class="header-cart__product-title">
            <a class="header-cart__link" href="single-product.html">Eatable Hemp</a>
            <span class="header-cart__qty">Qty: 1</span>
          </div>
          <div class="header-cart__price">
            $16.45
          </div>
        </div>

        <hr class="header-cart__divider">
        <div class="header-cart__subtotal-box">
          <span class="header-cart__subtotal">SUBTOTAL:</span>
          <span class="header-cart__subtotal-price">$49.35</span>
        </div>
        <a class="btn btn-darker" href="cart.html">Finalizar compra</a>
      </div>
    </div>

    @else
      <div class="header-cart">
        <a href="#" class="btn btn-success">Iniciar Orden</a>
      </div>
    @endif
  @endif

    </div>
    </div>
  </div>

  <!--Search open pannel-->
  <div class="search-panel">
    <div class="container">
      <div class="row">
        <div class="col-sm-11">
          <form class="search-panel__form" method="POST" role="form" action="{{ url('/products/list/search') }}">{{ csrf_field() }}
            <button type="submit"><span class="glyphicon  glyphicon-search"></span></button>
                  <input type="text" id="parameter" name="parameter" class="form-control {{ $errors->has('parameter') ? ' has-error' : '' }}" placeholder="Ingresá tu criterio de búsqueda" value="{{ old('parameter') }}">
                  @if ($errors->has('parameter'))
                      <span class="help-block">
                          <strong>{{ $errors->first('parameter') }}</strong>
                      </span>
                  @endif
          </form>
        </div>
        <div class="col-sm-1">
          <div class="search-panel__close  pull-right">
            <a href="#" class="js--toggle-search-mode"><span class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

@yield('content')


  <footer class="js--page-footer">
    <div class="footer-widgets">
      <div class="container">
        <div class="row">
          <div class="col-xs-12  col-sm-3">
            <div class="footer-widgets__social">
              <img class="push-down-10" alt="Footer Logo" src="/images/logo-footer.png" width="139" height="35">
              <p class="push-down-15">Adipiscing elit. Ut ullamcorper consectetur, non lacinia turpis suscipit non. Estibulum nu nc lacus, tincidunt non odio eu, scelerisque tristique quam.</p>
              <a class="social-container" href="https://www.facebook.com/ProteusNet"><span class="zocial-facebook"></span></a>
              <a class="social-container" href="https://twitter.com/ProteusNetCom"><span class="zocial-twitter"></span></a>
              <a class="social-container" href="#"><span class="zocial-email"></span></a>
              <a class="social-container" href="http://www.youtube.com/user/ProteusNetCompany"><span class="zocial-youtube"></span></a>
            </div>
          </div>
          <div class="col-xs-12  col-sm-3">
            <nav class="footer-widgets__navigation">
              <div class="footer-wdgets__heading--line">
                <h4 class="footer-widgets__heading">Mapa del Sitio</h4>
              </div>
              <ul class="nav nav-footer">
                <li><a href="/">Home</a></li>
                <li><a href="/products/list">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about-us.html">Acerca de Nosotros</a></li>
                <li><a href="features.html">Contactenos</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-xs-12  col-sm-3">
            <div class="footer-widgets__navigation">
              <div class="footer-wdgets__heading--line">
                <h4 class="footer-widgets__heading">Etiquetas Populares</h4>
              </div>
              <a class="tag" href="shop.html">Bebidas</a> <a class="tag" href="shop.html">Legumbres</a> <a class="tag" href="shop.html">Infusiones</a> <a class="tag" href="shop.html">Aceites</a> <a class="tag" href="shop.html">Cremas</a> <a class="tag" href="shop.html">Café</a> <a class="tag" href="shop.html">Fruit</a> <a class="tag" href="shop.html">Frutos secos</a> <a class="tag" href="shop.html">Dulces</a> <a class="tag" href="shop.html">Suplementos Dietarios</a>
            </div>
          </div>
          <div class="col-xs-12  col-sm-3">
            <div class="footer-widgets__navigation">
                <div class="footer-wdgets__heading--line">
                  <h4 class="footer-widgets__heading">Contáctenos</h4>
                </div>
                <a class="footer__link" href="#">Natural Market S.A.</a><br>
                Calle de las Magnolias,<br>
                2745 Los Brotes, Rio Turbio.<br>
                <a class="footer__link--small" href="contact-2.html">View Google map <span class="glyphicon glyphicon-chevron-right glyphicon--footer-small"></span></a><br><br>
                <a class="footer__link" href="#"><span class="glyphicon glyphicon-earphone glyphicon--footer"></span> +54 9 113 838 8907</a><br>
                <a class="footer__link" href="#"><span class="glyphicon glyphicon-envelope glyphicon--footer"></span> info@naturalmarket.com</a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12  col-sm-6">
            <div class="footer__text--link">
              <a class="footer__link" href="#">Natural Market</a> © All rights reserved 2016.
            </div>
          </div>
          <div class="col-xs-12  col-sm-6">
            <div class="footer__text">
              Made with <span class="glyphicon glyphicon-thumbs-up"></span> by <b>Gonza</b> y <b>Fran.</b>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="search-mode__overlay"></div>


    <script type="text/javascript">
      function downloadJSAtOnload() {
        var element = document.createElement("script");
        element.src = "/js/main.js";
        document.body.appendChild(element);
      }
      if (window.addEventListener)
        window.addEventListener("load", downloadJSAtOnload, false);
      else if (window.attachEvent)
        window.attachEvent("onload", downloadJSAtOnload);
      else window.onload = downloadJSAtOnload;
    </script>

    <!-- ALERT PARA LAS NOTIFICACIONES -->

    <div id="divNotifications">
    </div>

    <script>
      var snd = new Audio("/audio/notification.mp3");
    </script>

    <script src="/js/jquery/jquery.js"></script>
    <script src="/js/pusher/pusher.js"></script>
    <script src="/js/app-pusher.js"></script>
    <script src="/js/scripts.js"></script>

  </body>
</html>