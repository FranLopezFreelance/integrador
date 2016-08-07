<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusNet">
    <link rel="icon" type="image/ico" href="/images/favicon.png">

    <title>@yield ('titulo')</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/ed5eec95.main.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Google fonts -->
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Arvo:700:latin', 'Open+Sans:400,600,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/5/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

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
            <li class="dropdown  js--mobile-dropdown">
              <a class="dropdown-toggle" href="#">
                Mi cuenta <span class="caret"></span>
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
            <li class="dropdown  js--mobile-dropdown">
              <a class="dropdown-toggle" href="#">
                Español <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
              </ul>
            </li>
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
      <div class="col-xs-10  col-md-3">
        <div class="header-logo">
          <a href="/"><img alt="Logo" src="/images/logo.png" width="200" height="90"></a>
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
      <div class="col-xs-12  col-md-7">
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
        <a href="blog.html" class="dropdown-toggle">BLOG</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="blog-right-sidebar.html">Blog (Right sidebar)</a></li>
          <li><a href="blog-left-sidebar.html">Blog (Left sidebar)</a></li>
          <li><a href="blog.html">Blog (Alternative)</a></li>
          <li><a href="single-post.html">Single Blogpost</a></li>
        </ul> -->
      </li>
      <li class="dropdown">
        <a href="about-us.html" class="dropdown-toggle">SOBRE NOSOTROS</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="about-us.html">About us</a></li>
          <li><a href="pricing.html">Pricing Tables</a></li>
          <li><a href="contact.html">Contact 1</a></li>
          <li><a href="contact-2.html">Contact 2</a></li>
          <li><a href="search-results.html">Search Results</a></li>
          <li><a href="404.html">404 page</a></li>
          <li><a href="page-right.html">Page (Right sidebar)</a></li>
          <li><a href="page-left.html">Page (Left sidebar)</a></li>
          <li><a href="page-full-width.html">Page (Full width)</a></li>
        </ul> -->
      </li>
      <li class="dropdown">
        <a href="features.html" class="dropdown-toggle">CONTACTO</a>
        <!-- <ul class="dropdown-menu">
          <li><a href="features.html">Responsive design</a></li>
          <li><a href="features.html">Retina ready</a></li>
          <li><a href="features.html">Lightning fast</a></li>
          <li><a href="features.html">Search engine optimized</a></li>
          <li><a href="features.html">Layered PSDs included</a></li>
          <li><a href="features.html">Unlimited colors and layouts</a></li>
          <li><a href="features.html">290+ Glyphicons and Zocial icons</a></li>
          <li><a href="features.html">Advance shop filters</a></li>


          <li><a href="features.html">Awesome support</a></li>
          <li class="dropdown">
            <a href="blog.html" class="dropdown-toggle">3rd level menu</a>
            <ul class="dropdown-menu">
              <li><a href="blog-right-sidebar.html">Blog (Right sidebar)</a></li>
              <li><a href="blog-left-sidebar.html">Blog (Left sidebar)</a></li>
              <li><a href="blog.html">Blog (Alternative)</a></li>
              <li><a href="single-post.html">Single Blogpost</a></li>
            </ul>
          </li>
        </ul> -->
      </li>
      <!-- <li class="dropdown">
        <a href="elements.html" class="dropdown-toggle">ELEMENTS<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="elements.html#headings">Headings</a></li>
          <li><a href="elements.html#banners">Banners</a></li>
          <li><a href="elements.html#alerts">Alerts</a></li>
          <li><a href="elements.html#tabs">Tabs</a></li>
          <li><a href="elements.html#buttons">Buttons</a></li>
          <li><a href="elements.html#tables">Tables</a></li>
          <li><a href="elements.html#maps">Maps</a></li>
          <li><a href="elements.html#bars">Bars</a></li>
          <li><a href="elements.html#columns">Columns</a></li>
          <li><a href="elements.html#gallerys">Gallerys</a></li>
          <li><a href="elements.html#code">Code</a></li>
          <li><a href="elements.html#toggles">Toggles</a></li>
        </ul>
      </li> -->
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
    <div class="mobile-cart  visible-xs  visible-sm  push-down-15">
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
<div class="header-cart">
  <span class="header-cart__text--price"><span class="header-cart__text">Carrito</span> $49.35</span>
  <a href="#" class="header-cart__items">
    <span class="header-cart__items-num">3</span>
  </a>
  @endif
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
      <span class="header-cart__subtotal">CART SUBTOTAL:</span>
      <span class="header-cart__subtotal-price">$49.35</span>
    </div>
    <a class="btn btn-darker" href="cart.html">Finalizar compra</a>
  </div>
</div>
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
                  <input type="text" id="parameter" name="parameter" class="form-control {{ $errors->has('parameter') ? ' has-error' : '' }}" placeholder="Enter your search keyword" value="{{ old('parameter') }}">
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


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];
a.async=1;
a.src=g;
m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-33538073-8', 'proteusthemes.com');
      ga('send', 'pageview');

    </script>

    <script src="/js/jquery/jquery.js"></script>
    <script src="/js/pusher/pusher.js"></script>
    <script src="/js/handlebars/handlebars.js"></script>
    <script src="/js/app-pusher.js"></script>

  </body>
</html>