@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Mis Productos</h1>
			<hr />
				<a href="" class="btn btn-large btn-primary">Crear un Nuevo Producto</a>
			<hr />
			@forelse($products as $product)
				<div class="col-md-3	">
					<img src="/{{ $product->image }}" />
					<h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
					<p>{{ $product->description }} </p>
					<h4>${{ $product->price }} </h4>
					<hr />
					<h4><a href="">Editar</a></h4>
				</div>
			@empty
				<h3>Aún no tienes productos cargados.</h3>
			@endforelse

		</div>
	</div>
</div>
@endsection