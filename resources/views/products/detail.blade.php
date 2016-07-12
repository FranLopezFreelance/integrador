@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        	@if (Session::get('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif

			<h2>{{ $product->name }}</h2>

				<img src="/{{ $product->image }}" />
				<hr />
				<h4>{{ $product->description }} </h4>
				<hr />
				<p>Sección: {{ $product->section->name }} </p>
				<p>Marca: {{ $product->brand->name }} </p>
				<p>Cantidad: {{ $product->quantity }} </p>
				<p>Vendedor: <a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a> </p>
				<h3>${{ $product->price }} </h3>
		</div>

		</div>
	</div>
</div>
@endsection