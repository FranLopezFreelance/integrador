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
            <img class="js--product-preview" alt="Single product image"


            @if($principalImage == 'images/products/default.jpg')
                src="/{{ $principalImage }}" width="150"
            @else
                src="{{ route('product.image', ['name' => $principalImage]) }}"

            @endif

            width="150" />
          </div>
          <div class="product-preview__thumbs  clearfix">

            @foreach($product->images()->where('active', 1)->get() as $image)
                  <div class="product-preview__thumb  active  js--preview-thumbs">
                    <a href=".js--product-preview" data-src="/{{ $image->path }}">
                      @if($image->path == 'images/products/default.jpg')
                          <img class="image-drag-drop" src="/{{ $image->path }}" width="150" >
                      @else
                          <img class="image-drag-drop"
                          src="{{ route('product.image', ['name' => $image->path]) }}"
                          width="150" >
                      @endif
                    </a>
                  </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8">
        <div class="products__content">
          <div class="push-down-30"></div>
          	<nav>
          		<ol class="breadcrumb">
           		 <li><a href="/products/list"><span class="products__category">{{ $product->brand->name }}</span></a></li>
           		 <li class="active"><a href="/products/list"><span class="products__category">{{ $product->section->name }}</span></a></li>
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

          @if(!Auth::guest())
            @if(Auth::user()->id != $product->user_id)
              <!-- Add to cart button -->
              <a href="/products/buy/{{ $product->id }}">
                <!-- <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-shopping-cart"></span> -->
                <button type="button" class="btn btn-primary--transition">Comprar</button>
              </a>

              <!-- Add to cart button -->
              <a href="/orders/start{{ $product->id }}">
              <button type="button" class="btn btn-primary--reverse-transition">Iniciar Orden de Compra</button>
              </a>
            @else
              <!-- Add to cart button -->
              <a href="/products/update/{{ $product->id }}">
                <button type="button" class="btn btn-primary--transition">Editar</button>
              </a>
            @endif
          @else
            <h4><a href="/login">Loguate</a> para poder comprar este producto.</h4>
          @endif

          <br><br><br>
          <!-- Social banners -->
          <div class="row">
            <div class="col-xs-12  col-sm-6  col-md-5">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><span class="zocial-facebook"></span>
                Share on<br>
                <span class="banners--small--text">Facebook</span>
                </a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6  col-md-5">
              <div class="banners--small  banners--small--social">
                <a href="#" class="social"><span class="zocial-twitter"></span>
                Tweet it<br>
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
    <p class="tab-text">
      @if(!Auth::guest())
          @if($product->user->id == Auth::user()->id)
            Tú</p>
          @else
            <br />

            @if($product->user->avatar == 'images/users/default.png')

                <img class="img-circle" width="100" src="/{{ $product->user->avatar }}" />

            @else

                <img class="img-circle" width="100"
                            src="{{ route('user.image', ['name' => $product->user->avatar]) }}" />

             @endif

            <h4><a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }} {{ $product->user->lastname }}</a> </p></h4>
          @endif
          @if($product->user->id == Auth::user()->id)
            <p><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></p>
          @else
            <!-- <p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p> -->
          @endif
        @else
          <h4><a href="/users/profile/{{ $product->user_id }}">
            {{ $product->user->name }} {{ $product->user->lastname }}
          </a></h4>
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