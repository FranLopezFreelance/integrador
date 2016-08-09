@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

			<h3>Resultados para "{{ $parameter }}"</h3>

			<hr />

			@forelse($products as $product)
				<div class="col-md-3	">
					<img src="/{{ $product->image }}" />
					<h4><a href="/products/detail/{{ $product->id }}">{{ $product->name }}</a></h4>
					<p>{{ $product->description }} </p>
					<h4>${{ $product->price }} </h4>
					<hr />
				</div>
			@empty

				<h4>Sin resultados.</h4>

			@endforelse
		</div>
	</div>
</div>
@endsection