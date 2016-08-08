@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">

            <li><a href="/">Home</a></li>

            <li><a href="/products/list">Productos</a></li>

            <li class="active">{{ $product->name }}</li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
@if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif
<div class="container">
  <div class="push-down-30">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="product-preview">
          <div class="push-down-20">
            <img class="js--product-preview" alt="Single product image" src="/images/dummy/w360/13.jpg" width="360" height="458">
          </div>
          <div class="product-preview__thumbs  clearfix">
            <div class="product-preview__thumb  active  js--preview-thumbs">
              <a href=".js--product-preview" data-src="/images/dummy/w360/13.jpg">
                <img src="/images/dummy/w66/13.jpg" alt="Single product thumbnail image" width="66" height="82" />
              </a>
            </div>
            <div class="product-preview__thumb  js--preview-thumbs">
              <a href=".js--product-preview" data-src="/images/dummy/w360/9.jpg">
                <img src="/images/dummy/w66/9.jpg" alt="Single product thumbnail image" width="66" height="82" />
              </a>
            </div>
            <div class="product-preview__thumb  js--preview-thumbs">
              <a href=".js--product-preview" data-src="/images/dummy/w360/10.jpg">
                <img src="/images/dummy/w66/10.jpg" alt="Single product thumbnail image" width="66" height="82" />
              </a>
            </div>
            <div class="product-preview__thumb  js--preview-thumbs">
              <a href=".js--product-preview" data-src="/images/dummy/w360/14.jpg">
                <img src="/images/dummy/w66/14.jpg" alt="Single product thumbnail image" width="66" height="82" />
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8">
        <div class="products__content">
          <div class="push-down-30"></div>
          	<nav>
          		<ol class="breadcrumb">
           		 <li><a href="shop.html"><span class="products__category">{{ $product->brand->name }}</span></a></li>
           		 <li class="active"><a href="shop.html"><span class="products__category">{{ $product->section->name }}</span></a></li>
         	 	</ol>
        	</nav>
          <h1 class="single-product__title"><span class="light">{{ $product->name }}</span></h1>

          <span class="single-product__price">${{ $product->price }}</span>
          <div class="single-product__rating">
            <span class="glyphicon  glyphicon-star  star-on"></span>
            <span class="glyphicon  glyphicon-star  star-on"></span>
            <span class="glyphicon  glyphicon-star  star-on"></span>
            <span class="glyphicon  glyphicon-star  star-on"></span>
            <span class="glyphicon  glyphicon-star  star-off"></span>
          </div>
          <div class="in-stock--single-product">
            <span class="in-stock">&bull;</span> <span class="in-stock--text">Stock: {{ $product->quantity }} </span>
          </div>
          <hr class="bold__divider">
          <p class="single-product__text">
            {{ $product->description }}
          </p>
          <hr class="bold__divider">


          <!-- Add to cart button -->
          <a class="btn btn-primary--transition" href="/products/buy/{{ $product->id }}">
            <!--<span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-shopping-cart"></span>-->
            <span class="single-product__btn-text">Comprar</span>
          </a>

          <!-- Add to cart button -->
          <a class="btn btn-primary--transition" href="/products/buy/{{ $product->id }}">
            <!--<span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-shopping-cart"></span>-->
            <span class="single-product__btn-text">Iniciar Orden</span>
          </a>

          <!-- Social banners -->
          <div class="row">
            <div class="col-xs-12  col-sm-6  col-md-3">
              <div class="banners--small  banners--small--social back-facebook">
                <a href="#" class="social">
                Compartir en <br>
                <span class="banners--small--text">Facebook</span>
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6  col-md-3">
              <div class="banners--small  banners--small--social back-twitter">
                <a href="#" class="social">
                Compartir en<br>
                <span class="banners--small--text">Twitter</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabs -->
  <div class="push-down-30">
    <div class="row">
      <div class="col-xs-12">
        <!-- Nav tabs -->
<ul class="nav  nav-tabs">
  <li class="active"><a href="#tabDesc" data-toggle="tab">Descripción Detallada</a></li>
    <li><a href="#tabReviewsProduct" data-toggle="tab">Calificaciones del Producto (0)</a></li>
  <li><a href="#tabManufacturer" data-toggle="tab">Vendedor</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane  fade  in  active" id="tabDesc">
    <div class="row">
      <div class="col-xs-12  col-sm-6">
        <h5>Descripcion</h5>
        <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est purus, fringilla sit amet arcu quis, feugiat ultrices metus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst.</p>
      </div>
      <div class="col-xs-12  col-sm-6">
        <h5>Sobre la Marca</h5>
        <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est purus, fringilla sit amet arcu quis, feugiat ultrices metus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst.</p>
      </div>
    </div>
  </div>
  <div class="tab-pane  fade" id="tabReviewsProduct">
  <div class="row">
   <div class="col-xs-12">
    <h5>Calificaciones</h5>
    <p class="tab-text">
    @forelse($product->qualifications as $qualification)
    <img width="60" class="img-circle" src="/{{ $qualification->user->avatar }}" />
  </div>
      <div class="col-xs-12">
        <h4>{{ $qualification->comment }}</h4>
        <p>Por <b><a href="/users/profile/{{ $qualification->user->id }}">{{ $qualification->user->name }}</a></b> - {{ $qualification->created_at }}</p>
      </div>
  </div>

  @empty
    <h5>Este producto aún no tiene calificaciones.</h5>
 @endforelse
  </p>
      </div>
    </div>
  </div>
  <div class="tab-pane  fade" id="tabManufacturer">
  <div class="row">
      <div class="col-xs-12  col-sm-6">
    <h5>Nombre</h5>
    <p class="tab-text">@if(!Auth::guest())
          @if($product->user->id == Auth::user()->id)
            Tú</p>
          @else
            <a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }} {{ $product->user->lastname }}</a> </p>
          @endif
          @if($product->user->id == Auth::user()->id)
            <p><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></p>
          @else
            <!-- <p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p> -->
          @endif
        @else
          <a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a> </p>
          <!-- <p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p> -->
        @endif</p>
        Ventas: {{ $product->sales()->count() }}
      </div>
      <div class="col-xs-12  col-sm-6">
        <h5>Calificaciones como Vendedor</h5>
        <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce est purus, fringilla sit amet arcu quis, feugiat ultrices metus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. Vestibulum lorem dolor, pharetra sit amet urna nec, hendrerit scelerisque risus. In hac habitasse platea dictumst.</p>
      </div>
    </div>
  </div>
</div>
</div>

      </div>
    </div>
  </div>


@endsection