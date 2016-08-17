@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

			<h3>Resultados para "{{ $parameter }}"</h3>

			<hr >

			@forelse($products as $product)
				<div class="col-xs-6 col-sm-3  js--isotope-target  {{ $product->section->name }} {{ $product->user->city_id }}" data-price="{{ $product->price }}" data-rating="">
              <div class="products__single">
                <figure class="products__image">
                  <a href="/products/detail/{{ $product->id }}">
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
			@empty

				<h4>Sin resultados.</h4>

			@endforelse
		</div>
	</div>
</div>
@endsection