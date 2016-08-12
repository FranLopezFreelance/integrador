@extends('layouts.master')

@section('titulo')
Home
@endsection

@section('content')
<div class="jumbotron  js--add-gradient">
  <div class="container">
    <div class="jumbotron__container">
      <h2 class="jumbotron__subtitle">
        Una gran oportunidad para ahorrar gran cantidad de dinero en
      </h2>
      <h1 class="jumbotron__title">
        Productos Orgánicos
      </h1>
      <a class="btn  btn-warning" href="/products/list">Ver Productos</a>
    </div>
  </div>
</div>
<div class="banners  push-down-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  col-sm-6  col-md-3">
        <div class="banners-box">
          <span class="glyphicon glyphicon-earphone glyphicon--banners"></span>
          <b class="banners__title">LLÁMENOSz</b>
          +54 9 113 838 8907
        </div>
      </div>
      <div class="col-xs-12  col-sm-6  col-md-3">
        <div class="banners-box">
          <span class="glyphicon glyphicon-road glyphicon--banners"></span>
          <b class="banners__title">DELIVERY GRATIS</b>
          En todo CABA
        </div>
      </div>
      <div class="col-xs-12  col-sm-6  col-md-3">
        <div class="banners-box">
          <span class="glyphicon glyphicon-credit-card glyphicon--banners"></span>
          <b class="banners__title">METODOS DE PAGO</b>
          MercadoPago, PayPal, Etc.
        </div>
      </div>
      <div class="col-xs-12  col-sm-6  col-md-3">
        <div class="banners-box">
          <span class="glyphicon glyphicon-leaf glyphicon--banners"></span>
          <b class="banners__title">HECHO CON AMOR</b>
          Para la Madre Naturaleza
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">

  <!-- Navigation for products -->
<div class="products-navigation  push-down-15">
  <div class="row">
    <div class="col-xs-12  col-sm-8">
      <div class="products-navigation__title">
        <h3><span class="light">Últimos</span> Productos Publicados </h3>
      </div>
    </div>
  </div>
</div>

  <!-- CAROUSEL -->
    <div class="row">
     <div class="jcarousel-wrapper">
      <div class="jcarousel">
        <ul>
        @foreach ($productsDestacados as $product)
          <li>
            <div class="col-md-12">
              <div class="products__single">
                <figure class="products__image">
                  <a href="/{{ $product->image }}">
                    <img alt="#" class="product__image" width="263" height="334" src="/images/products/default.jpg">
                  </a>
                  <div class="product-overlay">
                    <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
                      <span class="glyphicon glyphicon-search"></span>
                    </a>
                    <a class="product-overlay__cart" href="#">
                      +<span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                    <div class="product-overlay__stock">
                      <span class="out-of-stock">&bull;</span> <span class="in-stock--text">En stock</span>
                    </div>
                  </div>
                </figure>
                <div class="row">
                  <div class="col-xs-9">
                    <h5 class="products__title">
                      <a class="products__link  js--isotope-title" href="/products/detail/{{ $product->id }}">{{ $product->name }}</a>
                    </h5>
                  </div>
                  <div class="col-xs-3">
                    <div class="products__price">
                      ${{ $product->price }}
                    </div>
                  </div>
                </div>
                <div class="products__category">
                  {{ $product->section->name }}
                </div>
              </div>
            </div>
           </li>
         @endforeach
      </ul>
    </div>

      <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
      <a href="#" class="jcarousel-control-next">&rsaquo;</a>
    </div>

</div>

  <!-- Navigation for products -->
<div class="products-navigation  push-down-15">
  <div class="row">
    <div class="col-xs-12  col-sm-8">
      <div class="products-navigation__title">
        <h3><span class="light">Productos</span> Destacados </h3>
      </div>
    </div>
  </div>
</div>

  <!-- CAROUSEL -->
    <div class="row">
     <div class="jcarousel-wrapper">
      <div class="jcarousel">
        <ul>
        @foreach ($productsDestacados as $product)
          <li>
            <div class="col-md-12">
              <div class="products__single">
                <figure class="products__image">
                  <a href="/{{ $product->image }}">
                    <img alt="#" class="product__image" width="263" height="334" src="/images/products/default.jpg">
                  </a>
                  <div class="product-overlay">
                    <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
                      <span class="glyphicon glyphicon-search"></span>
                    </a>
                    <a class="product-overlay__cart" href="#">
                      +<span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                    <div class="product-overlay__stock">
                      <span class="out-of-stock">&bull;</span> <span class="in-stock--text">En stock</span>
                    </div>
                  </div>
                </figure>
                <div class="row">
                  <div class="col-xs-9">
                    <h5 class="products__title">
                      <a class="products__link  js--isotope-title" href="/products/detail/{{ $product->id }}">{{ $product->name }}</a>
                    </h5>
                  </div>
                  <div class="col-xs-3">
                    <div class="products__price">
                      ${{ $product->price }}
                    </div>
                  </div>
                </div>
                <div class="products__category">
                  {{ $product->section->name }}
                </div>
              </div>
            </div>
           </li>
         @endforeach
      </ul>
    </div>

      <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
      <a href="#" class="jcarousel-control-next">&rsaquo;</a>
    </div>

</div>

  <!-- Banners big -->
<div class="banners--big  banners--big-left">
  <div class="row">
    <div class="col-xs-12  col-md-7">
      <div class="banners--big__text">
        Suscribete a nuestro Newsletter para recibir más información sobre nuevos <strong>Productos</strong>
      </div>
    </div>
    <div class="col-xs-12  col-md-5">
      <div class="banners--big__form">
        <form action="//proteusthemes.us4.list-manage.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" name="mc-embedded-subscribe-form" role="form" target="_blank">
          <div class="form-group  form-group--form">
            <input type="email" name="EMAIL" class="form-control  form-control--form" placeholder="Enter your E-mail address" required>
            <button class="btn  btn-primary" type="submit">Suscribirme</button>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;"><input type="text" name="b_ea0786485977f5ec8c9283d5c_5dad3f35e9" value=""></div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Products Mejor Puntuados -->
  <div class="row">
  <div class="col-xs-12 col-sm-4">
    <div class="widgets__navigation">
      <div class="widgets__heading--line">
        <h4 class="widgets__heading">Mejor Puntuados</h4>
      </div>
      @foreach ($productsMejorPuntuados as $products)
  <div class="push-down-20  clearfix">
    <a href="/products/detail/{{ $product->id }}">
      <img alt="" class="widgets__products" width="78" height="78" src="/images/products/default.jpg">
    </a>
    <h5 class="products__title">
      <a class="products__link" href="/products/detail/{{ $product->id }}">{{ $product->name }}</a>
    </h5>
    <span class="line-through">$11.25</span> <span class="products__price--widgets">${{ $product->price }}</span>
    <br><br>


    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

    <span class="glyphicon glyphicon-star  star-on"></span>

  </div>
  @endforeach

<!-- Products Mas Vendidos -->
    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <div class="widgets__navigation">
      <div class="widgets__heading--line">
        <h4 class="widgets__heading">Más Vendidos</h4>
      </div>
      @foreach ($productsMejorVendidos as $products)
  <div class="clearfix  push-down-15">
    <a href="/products/detail/{{ $product->id }}">
      <img alt="" class="widgets__products" width="78" height="78" src="/images/products/default.jpg">
    </a>
    <div class="products__title">
      <a class="products__link" href="/products/detail/{{ $product->id }}">{{ $product->name }}</a>
    </div>
    <span class="line-through">$16.71</span> <span class="products__price--widgets">${{ $product->price }}</span>
    <br><br>
    <div class="products__category">
      {{ $products->section->name }}
    </div>
  </div>
  @endforeach
    </div>
  </div>

  <div class="col-xs-12 col-sm-4">
    <div class="widgets__navigation">
      <div class="widgets__heading--line">
        <h4 class="widgets__heading">Receta Semanal</h4>
      </div>
      <img alt="#" class="product__image" src="images/dummy-licensed/recipe.jpg" width="353" height="186">
      <div class="products__title">
      <div class="push-down-10"></div>
        Delicioso Sandwich Bio-ecológio
      </div>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est purus, fringilla sit amet arcu quis, feugiat ultrices metus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus.
    </div>
  </div>
</div>
</div>
<div class="testimonials  light-paper-pattern">
  <div class="container">
    <div class="row">
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
      <div class="col-xs-12  col-sm-6">
        <a href="#js--testimonails-carousel" data-slide="prev"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-left"></span></a>
        <h4 class="testimonials__title"><span class="light">Comentarios de</span> Usuarios</h4>
        <a href="#js--testimonails-carousel" data-slide="next"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span></a>
        <hr class="divider-dark">
        <div id="js--testimonails-carousel" class="carousel  slide" data-ride="carousel" data-interval="5000">
          <div class="carousel-inner">
            <div class="item  active">
              <q class="testimonials__text">Compré un producto de calidad superior. La entrega super rápida! Gracias por tanto Natural Market! Sin duda estaré comprando nuevamente a través de ustedes!</q><br><br><cite><b>Daniel,</b></cite> Belgrano.
            </div>
            <div class="item">
              <q class="testimonials__text">¡GRACIAS! Realmente aprecio el rápido servicio de Natural Market! Realmente muy feliz con la compra y la información obtenida! Gracias de nuevo.</q><br><br>
              <cite><b>Guillermo,</b></cite> Almagro
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes--rotate">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

