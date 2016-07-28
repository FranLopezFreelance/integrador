@extends('layouts.master')

@section('content')
<div class="container">
<div class="products-navigation  push-down-15">
  <div class="row">
    <div class="col-xs-12  col-sm-8">
      <div class="products-navigation__title">
        <h3><span class="light">Ultimos</span> Productos publicados </h3>
      </div>
    </div>
    <div class="col-xs-12  col-sm-4">
      <div class="products-navigation__arrows">
        <a href="#js--latest-products-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left  glyphicon-circle  products-navigation__arrow"></span></a>&nbsp;
        <a href="#js--latest-products-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right  glyphicon-circle  products-navigation__arrow"></span></a>
      </div>
    </div>
  </div>
</div>
<!-- Products -->
<div id="js--latest-products-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="row">
        
          
            <?php $products = App\Product::all();
                     ?>

            @foreach($products as $product)
            <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="{{ $product->price }}" data-rating="{{ $product->qualifications()->count() }}">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="images/dummy/w263/15.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
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
      {{ $product->user->name }}
      <p>Ventas: {{ $product->sales()->count() }} | Calificaciones: {{ $product->qualifications()->count() }}</p>
    </div>
  </div>
</div>
@endforeach
                </div>
        </div>
    </div>
</div></div>
@endsection
