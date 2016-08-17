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
  <!-- <div class="row">
    <div class="col-xs-12">
      <div class="push-down-30">
        <div class="banners--big">
          Exposed shop notice, like <strong>free worldwide</strong> shipping on all purchases over $50
        </div>
      </div>
    </div>
  </div> -->
  <div class="row">
    <div class="col-xs-12  col-sm-3">
      <aside class="sidebar  sidebar--shop">
      <h3 class="sidebar__title"><span class="light">Productos</span> Orgánicos</h3>
          <hr class="shop__divider">
            <div class="shop-filter">
              <h5 class="sidebar__subtitle open">Categoría</h5>
                <div id="categorias" style="display:none;">
                  <ul class="nav  nav--filter">
            @foreach($sections as $section)
                      <li><a data-target=".section_{{ $section->id }}" class="js--filter-selectable" href="#">{{ $section->name }}</a></li>
            @endforeach
                      </ul>
                </div>

              <hr class="divider">

              <h5 class="sidebar__subtitle">Precio</h5>
                <div class="shop__filter__slider">
                  <div class="js--jqueryui-price-filter"></div>
                </div>

              <hr class="divider">

              <nav>
              <h5 class="sidebar__subtitle open">Barrio</h5>
                <div id="barrios" style="display:none;">
                  <ul class="nav  nav--filter">
              @foreach ($cities as $barrios)
                    <li><a data-target=".city_{{ $barrios->id }}" class="js--filter-selectable" href="#">{{ $barrios->name }}</a></li>
              @endforeach
                  </ul>
                </div>
              </nav>
              <hr class="divider">
             </div>
      </aside>
    </div>

    <div class="col-xs-12  col-sm-9">
      <div class="grid">
        <ul class="pagination  shop__amount-filter">
          <!--<li>
            <a class="shop__amount-filter__link  hidden-xs" href="shop.html"><span class="glyphicon glyphicon-th"></span></a>
          </li>
          <li>
              <a class="shop__amount-filter__link  hidden-xs" href="shop-list-view.html"><span class="glyphicon glyphicon-th-list"></span></a>
          </li>-->
        </ul>
        <div class="shop__sort-filter">
          <select class="js--isotope-sorting  btn  btn-shop">
              <option>Ordenar...</option>
              <option value='{"sortBy":"price", "sortAscending":"true"}'>Menor precio</option>
              <option value='{"sortBy":"price", "sortAscending":"false"}'>Mayor Precio</option>
              <option value='{"sortBy":"name", "sortAscending":"true"}'>Nombre - Ascendente</option>
              <option value='{"sortBy":"name", "sortAscending":"false"}'>Nombre - Descendente</option>
              <option value='{"sortBy":"rating", "sortAscending":"false"}'>Por Mayor Rating</option>
          </select>
        </div>

        <hr class="shop__divider">

        <div class="row  js--isotope-container">
            @foreach($products as $product)
              <div class="col-xs-6 col-sm-4  js--isotope-target  section_{{ $product->section_id }}
              city_{{ $product->user->city_id }}" data-price="{{ $product->price }}" data-rating="">
              <div class="products__single">
                <figure class="products__image">
                  <a href="/{{ $product->image }}">
                    <img alt="#" class="product__image" width="263" height="334"

                      @if($product->images()->where('active', 1)->first()->path == 'images/products/default.jpg')
                          src="/{{ $product->images()->where('active', 1)->first()->path }}" />
                      @else
                          src="{{ route('product.image', ['name' => $product->images()->where('active', 1)->first()->path]) }}" />
                      @endif

                  </a>
                  <div class="product-overlay">
                    <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
                      <span class="glyphicon glyphicon-search"></span>
                    </a>
                    <!--<a class="product-overlay__cart" href="#">
                      +<span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>-->
                    <div class="product-overlay__stock">
                      <span class="in-stock">&bull;</span> <span class="in-stock--text">En Stock</span>
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
          @endforeach

          <div class="clearfix  hidden-xs"></div>
        </div>

        <hr class="shop__divider">

        {{ $products->links() }}


      </div>
    </div>
  </div>
</div>
@endsection