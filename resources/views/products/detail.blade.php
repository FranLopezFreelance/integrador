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
            <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock {{ $product->quantity }} </span>
          </div>
          <hr class="bold__divider">
          <p class="single-product__text">
            {{ $product->description }}
          </p>
          <hr class="bold__divider">
          <!-- Single button -->
          <select class="btn  btn-shop">
            <option>350g</option>
            <option>700g</option>
            <option>1200g</option>
          </select>
          <!-- Quantity buttons -->
          <div class="quantity  js--quantity">
            <input type="button" value="-" class="quantity__button  js--minus-one  js--clickable">
            <input type="text" name="quantity" value="1" class="quantity__input">
            <input type="button" value="+" class="quantity__button  js--plus-one  js--clickable">
          </div>
          <!-- Add to cart button -->
          <a class="btn btn-primary--transition" href="/products/buy/{{ $product->id }}">
            <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-shopping-cart"></span>
            <span class="single-product__btn-text">Add to shopping cart</span>
          </a>
          <!-- Social banners -->
          <div class="row">
            <div class="col-xs-12  col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><span class="zocial-facebook"></span>
                Share on<br>
                <span class="banners--small--text">Facebook</span>
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><span class="zocial-twitter"></span>
                Tweet it<br>
                <span class="banners--small--text">Twitter</span>
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6  col-md-4">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><span class="zocial-pinterest"></span>
                Pin on<br>
                <span class="banners--small--text">Pinterest</span>
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
    <a class="btn btn-warning">Deja un comentario</a>
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

  <!-- Navigation -->
  <div class="push-down-30">
    <div class="products-navigation">
      <div class="products-navigation__title">
        <h3><span class="light">Productos</span> Relacionados</h3>
      </div>
    </div>
  </div>

  <!-- Products -->
  <div class="push-down-30">
    <div class="row">
      
      
        
        
          <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="16.88" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/16.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">High Protein Diet Mango</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $16.88
        </div>
      </div>
    </div>
    <div class="products__category">
      Natural Proteins
    </div>
  </div>
</div>
        
      
        
        
          <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-3" data-price="4.61" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/12.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Murve</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $4.61
        </div>
      </div>
    </div>
    <div class="products__category">
      Bio
    </div>
  </div>
</div>
        
      
         <div class="clearfix visible-xs"></div> 
        
          <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="3.84" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/23.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="out-of-stock">&bull;</span> <span class="in-stock--text">Out of stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Muesli Fruits And Fibre</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $3.84
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
        
      
        
        
          <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-3" data-price="6.18" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/7.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="single-product.html">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="product-overlay__cart" href="#">
          +<span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
        <div class="product-overlay__stock">
          <span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
        </div>
      </div>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Apricot Kernels</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $6.18
        </div>
      </div>
    </div>
    <div class="products__category">
      Bio
    </div>
  </div>
</div>
</div>
</div>
</div>

@endsection