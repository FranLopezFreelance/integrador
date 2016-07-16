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
				<p>Disponibles: {{ $product->quantity }} </p>
				<p>Ventas: {{ $product->sales()->count() }} </p>
				<h3>${{ $product->price }} </h3>
				<p>Vendedor:
				@if(!Auth::guest())
					@if($product->user->id == Auth::user()->id)
						Tú</p>
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

				<hr />

				<h3>Calificaciones:</h3>

				<hr />
				<ul>

				@forelse($product->qualifications as $qualification)
					<div class="row">
						<div class="col-md-1">
							<img width="60" class="img-circle" src="/{{ $qualification->user->avatar }}" />
						</div>
						<div class="col-md-11">
							<h4>{{ $qualification->comment }}</h4>
							<p>Por <b><a href="/users/profile/{{ $qualification->user->id }}">{{ $qualification->user->name }}</a></b> - {{ $qualification->created_at }}</p>
						</div>
					</div>
					<hr />
				@empty
					<h4>Este producto aún no tiene calificaciones.</h4>
				@endforelse
				</ul>
		</div>

		</div>
	</div>
</div>
@endsection