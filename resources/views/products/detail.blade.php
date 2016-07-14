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
				<h3>${{ $product->price }} </h3>
				<p>Vendedor:
				@if(!Auth::guest())
					@if($product->user->id == Auth::user()->id)
						<p>Vendedor: Tú</p>
					@else
						<a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a> </p>
					@endif
					@if($product->user->id == Auth::user()->id)
						<p><a class="btn btn-primary" href="/products/update/{{ $product->id }}">Editar</a></p>
					@else
						<p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p>
					@endif
				@else
					<a href="/users/profile/{{ $product->user_id }}">{{ $product->user->name }}</a> </p>
					<p><a class="btn btn-success" href="/products/buy/{{ $product->id }}">Comprar</a></p>
				@endif
		</div>

		</div>
	</div>
</div>
@endsection