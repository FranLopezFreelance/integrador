@extends('layouts.master')

@section('content')

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="/">Home</a></li>
            
            <li class="active">Productos</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <!-- Big banner -->
  <div class="row">
    <div class="col-xs-12">
      <div class="push-down-30">
        <div class="banners--big">
          Exposed shop notice, like <strong>free worldwide</strong> shipping on all purchases over $50
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12  col-sm-3">
      <aside class="sidebar  sidebar--shop">
        <h3 class="sidebar__title"><span class="light">Productos</span> Orgánicos</h3>
        <hr class="shop__divider">
        <div class="shop-filter">

          <h5 class="sidebar__subtitle">Categoría</h5>
          <ul class="nav  nav--filter">
          
            <li><a data-target=".js--cat-1" class="js--filter-selectable" href="#">Aceites</a></li>
          
            <li><a data-target=".js--cat-2" class="js--filter-selectable" href="#">Alimentos</a></li>
          
            <li><a data-target=".js--cat-3" class="js--filter-selectable" href="#">Bebidas</a></li>
          
            <li><a data-target=".js--cat-4" class="js--filter-selectable" href="#">Cervezas</a></li>
          
            <li><a data-target=".js--cat-5" class="js--filter-selectable" href="#">Condimentos</a></li>
          
            <li><a data-target=".js--cat-6" class="js--filter-selectable" href="#">Cremas</a></li>
            
            <li><a data-target=".js--cat-17" class="js--filter-selectable" href="#">Cuidado Personal</a></li>

            <li><a data-target=".js--cat-7" class="js--filter-selectable" href="#">Dulces</a></li>

            <li><a data-target=".js--cat-8" class="js--filter-selectable" href="#">Frutos Secos</a></li>

            <li><a data-target=".js--cat-9" class="js--filter-selectable" href="#">Galletitas</a></li>

            <li><a data-target=".js--cat-10" class="js--filter-selectable" href="#">Infusiones</a></li>

            <li><a data-target=".js--cat-11" class="js--filter-selectable" href="#">Jugos</a></li>

            <li><a data-target=".js--cat-12" class="js--filter-selectable" href="#">Legumbres</a></li>

            <li><a data-target=".js--cat-13" class="js--filter-selectable" href="#">Licores</a></li>

            <li><a data-target=".js--cat-14" class="js--filter-selectable" href="#">Semillas</a></li>

            <li><a data-target=".js--cat-15" class="js--filter-selectable" href="#">Suplementos Dietarios</a></li>

            <li><a data-target=".js--cat-16" class="js--filter-selectable" href="#">Vinos</a></li>
          
          </ul>

          <hr class="divider">

          <h5 class="sidebar__subtitle">Precio</h5>
          <div class="shop__filter__slider">
            <div class="js--jqueryui-price-filter"></div>
          </div>

          <hr class="divider">
          <nav>
            <h5 class="sidebar__subtitle">Barrio</h5>
            <ul class="nav  nav--filter">
              @foreach ($cities as $barrios)
              <li><a href="#">{{ $barrios->name }} </a></li>
              @endforeach
            </ul>
          </nav>
          <hr class="divider">
        </div>
      </aside>
    </div>
    <div class="col-xs-12  col-sm-9">
      <div class="grid">
        <ul class="pagination  shop__amount-filter">
          <li>
            <a class="shop__amount-filter__link  hidden-xs" href="shop.html"><span class="glyphicon glyphicon-th"></span></a>
          </li>
          <li>
              <a class="shop__amount-filter__link  hidden-xs" href="shop-list-view.html"><span class="glyphicon glyphicon-th-list"></span></a>
          </li>
        </ul>
        <div class="shop__sort-filter">
          <select class="js--isotope-sorting  btn  btn-shop">
              <option value='{"sortBy":"price", "sortAscending":"true"}'>By Price (Low to High) &uarr;</option>
              <option value='{"sortBy":"price", "sortAscending":"false"}'>By Price (High to Low) &darr;</option>
              <option value='{"sortBy":"name", "sortAscending":"true"}'>By Name (Low to High) &uarr;</option>
              <option value='{"sortBy":"name", "sortAscending":"false"}'>By Name (High to Low) &darr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"true"}'>By Rating (Low to High) &uarr;</option>
              <option value='{"sortBy":"rating", "sortAscending":"false"}'>By Rating (High to Low) &darr;</option>
          </select>
        </div>
        <hr class="shop__divider">
        <div class="row  js--isotope-container">
          
            
            @foreach($products as $product)
              @if(isset($c))
              @foreach($product as $subProduct)
              <!-- <div class="thumbnail">
                      <img src="/{{ $subProduct->image }}">
                      <div class="caption">
                          <h4 class="pull-right">${{ $subProduct->price }}</h4>
                          <h4><a href="/products/detail/{{ $subProduct->id }}">{{ $subProduct->name }}</a>
                          </h4>
                          <p>{{ $subProduct->description }}</p>
                      </div>
                      <div class="ratings">
                        <p style="color:green;">Ventas: {{ $subProduct->sales()->count() }}</p>
                          <p class="pull-right">{{ $subProduct->qualifications()->count() }} calificaciones</p>
                          <p>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                          </p>
                      </div>
                </div> -->
                
              @endforeach
            @else

              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-1" data-price="" data-rating="">
  <div class="products__single">
    <figure class="products__image">
      <a href="/products/detail/{{ $product->id }}">
        <img alt="#" class="product__image" width="263" height="334" src="/{{ $product->image }}">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
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
      {{ $product->brand->name }}
    </div>
  </div>
</div>
            @endif
      @endforeach
          
            
            
            
              <!-- <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="14.36" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/2.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Moringa Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $14.36
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="8.99" data-rating="2">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/3.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Gynostemma Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $8.99
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="13.23" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/4.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Barley Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $13.23
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
             <div class="clearfix  hidden-xs"></div> 
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="11.63" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/5.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Alfalfa Leaf Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $11.63
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-3" data-price="8.22" data-rating="3">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/6.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Ashwagandha Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $8.22
        </div>
      </div>
    </div>
    <div class="products__category">
      Bio
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
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
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-2" data-price="13.71" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/8.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Acai Powder</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $13.71
        </div>
      </div>
    </div>
    <div class="products__category">
      Powders
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
             <div class="clearfix  hidden-xs"></div> 
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-4" data-price="7.47" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/9.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Chia Seed</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $7.47
        </div>
      </div>
    </div>
    <div class="products__category">
      Seed
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-4" data-price="5.17" data-rating="2">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/10.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Cacao Grain</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $5.17
        </div>
      </div>
    </div>
    <div class="products__category">
      Seed
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-4" data-price="3.12" data-rating="1">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/11.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Coconut Chips</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $3.12
        </div>
      </div>
    </div>
    <div class="products__category">
      Seed
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
            
          
             <div class="clearfix  visible-xs"></div> 
             <div class="clearfix  hidden-xs"></div> 
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="4.77" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/13.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Superfruit</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $4.77
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-7" data-price="6.9" data-rating="3">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/14.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Eatable Hemp</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $6.9
        </div>
      </div>
    </div>
    <div class="products__category">
      Other
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/15.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Ovseni Kosmici</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $2.73
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
            
          
            
            
            
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
            
          
             <div class="clearfix  visible-xs"></div> 
             <div class="clearfix  hidden-xs"></div> 
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="16.89" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/17.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">High Protein Diet Apricot</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $16.89
        </div>
      </div>
    </div>
    <div class="products__category">
      Natural Proteins
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="16.91" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/18.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">High Protein Diet Asparagus</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $16.91
        </div>
      </div>
    </div>
    <div class="products__category">
      Natural Proteins
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="19.59" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/19.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">High Protein Diet Muesli</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $19.59
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-3" data-price="3.94" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/20.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Crispy Flakes</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $3.94
        </div>
      </div>
    </div>
    <div class="products__category">
      Bio
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
             <div class="clearfix  hidden-xs"></div> 
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="3.51" data-rating="2">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/21.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Muesli Active</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $3.51
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
            
          
            
            
            
              <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.98" data-rating="3">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/22.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Bio Muesli Traditional</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $2.98
        </div>
      </div>
    </div>
    <div class="products__category">
      Muesli
    </div>
  </div>
</div>
            
          
             <div class="clearfix  visible-xs"></div> 
            
            
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
</div> -->
            
          
            
            
            
              <!-- <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-7" data-price="14.95" data-rating="4">
  <div class="products__single">
    <figure class="products__image">
      <a href="single-product.html">
        <img alt="#" class="product__image" width="263" height="334" src="/images/dummy/w263/24.jpg">
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
          <a class="products__link  js--isotope-title" href="single-product.html">Polnozrnati Svedri</a>
        </h5>
      </div>
      <div class="col-xs-3">
        <div class="products__price">
          $14.95
        </div>
      </div>
    </div>
    <div class="products__category">
      Other
    </div>
  </div>
</div> -->
            
          
          <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
        <div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection