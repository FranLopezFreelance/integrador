@extends('users.myProfile')

@section('view-profile')
<div class="col-xs-12  col-sm-9">
  <h3 id="headings"><span class="light">Productos</span></h3>

  <hr class="title__divider">

  <div class="panel-heading"> </div>
      <div class="row">

		@forelse($products as $product)
		  <div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
		  <div class="products__single">
		    <figure class="products__image">
		      <a href="/{{ $product->image }}">
		        <img alt="#" class="product__image" width="263" height="334" src="/{{ $product->images()->first()->path }}">
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
		    <div class="data-product">
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
		</div>
		@empty
			<h4>Aún no tienes cargado ningún Producto. <a href="/products/create">Carga el Primero!</a></h4>
		@endforelse
		      </div>
		    </div>
		  </div>
		</div>
    </div>
  </div>
</div>
@endsection