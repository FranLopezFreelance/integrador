@extends('layouts.master')

@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">

            <li><a href="/">Home</a></li>
            <li><a href="/users/myProfile">Mi Perfil</a></li>
            <li class="active">Mis Productos</li>

          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<div class="products-navigation  push-down-15">
        		<div class="products-navigation__title">
        			<h3><span class="light">Mis</span> Productos</h3>

				</div><a href="/products/create" class="btn btn-large btn-primary pull-right">Crear un Nuevo Producto</a>
			</div>

@forelse($products as $product)
  <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
  <div class="products__single">
    <figure class="products__image">
      <a href="/{{ $product->images()->first()->path }}">
        <img alt="#" class="product__image" width="263" height="334" src="/images/products/default.jpg">
      </a>
      <div class="product-overlay">
        <a class="product-overlay__more" href="/products/detail/{{ $product->id }}">
          <span class="glyphicon glyphicon-search"></span>
        </a>


        <div class="product-overlay__stock" style="right: 0px;">
          <span class="out-of-stock"></span> <span class="in-stock--text"><a href="/products/update/{{ $product->id }}">Editar</a></span>
        </div>
      </div>

    </figure>
    <p>Ventas: {{ $product->sales()->count() }} | Calificaiones: {{ $product->qualifications()->count() }} </p>
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
@empty
				<h3>Aún no tienes productos cargados.</h3>
			@endforelse
      </div>
    </div>
  </div>
</div>


			<!-- @forelse($products as $product)
				<div class="col-md-3	">
					<img src="/{{ $product->image }}" />
					<h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
					<p>{{ $product->description }} </p>
					<h4>${{ $product->price }} </h4>
					<p>Ventas: {{ $product->sales()->count() }} | Calificaiones: {{ $product->qualifications()->count() }} </p>
					<h4><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></h4>
					<hr />
				</div>
			@empty
				<h3>Aún no tienes productos cargados.</h3>
			@endforelse
		</div>
	</div>
</div> -->
@endsection